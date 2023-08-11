<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController {
    //LOGIN///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function login(Router $router){
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario = new Usuario($_POST);//se asigna el modelo de usuario
            $alertas = $usuario->validarLogin();
            if(empty($alertas)){
                //verificar que el usuario exista
                $usuario = Usuario::where('email', $usuario->email);//colunmna de la DB/campo del objeto

                if(!$usuario){
                    Usuario::setAlerta('error', 'el usuario no existe o password incorrecto');
                }else{
                    //el usuario existe
                    if(password_verify($_POST['password'], $usuario->password)){
                        //inicia la session
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;
                        $_SESSION['perfil'] = $usuario->perfil;

                        //redireccionar
                        if ($usuario->perfil === "1"){
                            $_SESSION['admin'] = $usuario->perfil ?? null;
                            header('Location: /dashboard');
                        }else{
                            header('Location: /dashboard');
                        }
                       
                    }else{
                        Usuario::setAlerta('error', 'el usuario no existe o password incorrecto');
                    }
                }
            }
    }

        $alertas = Usuario::getAlertas();
        //render a la vista
        $router->render('auth/login',[//abre la carperta de auth el archivo Login
          'titulo' => 'Iniciar Sesión',//titulo dinamico
          'alertas' => $alertas
        ]);
    }

    //LOGOUT//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public static function logout(){
        session_start();
        $_SESSION = [];
        header('Location: /');

    }

    //CREAR///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public static function crear($router){
        session_start();
        $alertas = [];
        $usuario = new Usuario; //nos crea un objeto vacio
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST); //sincroniza lo que hay al enviar el POST
            $alertas = $usuario->validarNuevaCuenta();

            if(empty($alertas)){
                $existeUsuario = Usuario::where('email', $usuario->email);
                if($existeUsuario){
                 Usuario::setAlerta('error', 'el usuario ya está registrado');
                 $alertas = Usuario::getAlertas();
                }else{

                    //hasshear 
                    $usuario->hashPassword();
                    //eliminar pass2
                    unset($usuario->password2);
                    //crear nuevo usuario
                    $resultado=$usuario->guardar();

                    if($resultado){
                        Usuario::setAlerta('exito', 'usuario creado correctamente');
                        $alertas = Usuario::getAlertas();
                        
                    }

                }
            }

        
        }

       //render a la vista
       $router->render('auth/crear',[//abre la carperta de auth el archivo Login
        'titulo' => 'Crear Cuenta',//titulo dinamico
        'usuario' => $usuario,//pasarlo a la vista
        'alertas' => $alertas

      ]);
  }

  

}