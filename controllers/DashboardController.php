<?php

namespace Controllers;

use MVC\Router;
use Model\Reserva;
use Model\Reserva1;


class DashboardController{

    //AGREGAR NUEVA FECHA//////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function agregarFecha(Router $router){
        session_start();
        isAuth();
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $reserva = new Reserva($_POST);

            //validacion 
            $alertas = $reserva->validarReserva();

            if(empty($alertas)){
                //genera url
                $hash = md5(uniqid());
                $reserva->url = $hash;
                //almacenar el creador de la reserva
                $reserva->usuarioId = $_SESSION['id'];

                //guarda
                $reserva->guardar();

                //redireccionar
                header('Location: /reserva?id=' . $reserva->url);
            }
        }

        $router->render('dashboard/agregar-fecha', [
            'alertas'=>$alertas,
            'titulo' => 'Agregar Fecha'

        ]);
    }
    //modificar//////////////////////////////////////////////////////////////////////////////////
    public static function modificar(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $reservas = new Reserva($_POST);
             //validacion 
             $alertas = $reservas->validarReserva();

             if(empty($alertas)){
          
                $reservas->guardar();
                header('Location: /reserva?id=' . $reservas->url);
            }

          
            }

        session_start();
        isAuth();
        $token = $_GET['id'];

        $reservas = Reserva::where('url', $token);


 

        $router->render('dashboard/modificar', [
            'alertas'=>$alertas,
            'titulo' => 'modificar',
            'reservas' => $reservas
        ]);

        
    }

    //VER MIS FECHAS////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function ver_misfechas(Router $router){
        session_start();
        isAuth();
        $id = $_SESSION['id'];
       
            //Buscar por 2 columnas  
        $reservas = Reserva1::belongsto4('usuarioId',$id, 'tipo','0');
   
        $router->render('dashboard/ver-misfechas', [
            'titulo' => 'Ver mis fechas',
            'reservas' => $reservas
          
        ]);
    }

    //VER TODAS LAS fechas//////////////////////////////////////////////////////////////////////////////////////////
        public static function ver_todasfechas(Router $router){
            session_start();
            isAuth();
             $id = $_SESSION['id'];
                 //Buscar por 2 columnas  
        $reservas = Reserva1::belongsto('tipo','0');
            session_start();
            $router->render('dashboard/ver-todasfechas', [
                'titulo' => 'Ver todas las fechas grupales',
            'reservas' => $reservas
            ]);
        }

    //fechas de hoy////////////////////////////////////////////////////////////////////////////////////
    
    public static function index(Router $router){
        session_start();
        isAuth();
        isAdmin();
        $id = $_SESSION['id'];
        date_default_timezone_set('America/Costa_Rica');
    $fecha_actual = date('Y-m-d');
    
        $reservas = Reserva1::belongsto3('fecha',$fecha_actual,'usuarioId',$id);
        $router->render('dashboard/index', [
         
            'titulo' => 'Bienvenido',
            'reservas' => $reservas
        ]);
    }



    //RESERVA INDIVIDUAL////////////////////////////////////////////////////////////////////////////////////////////////////
    public static function reserva(Router $router){
        session_start();
        isAuth();

        $token = $_GET['id'];
   
        if(!$token) header('Location: /dashboard');
        $reservas = Reserva::where('url', $token);

      
        if($reservas->usuarioId !== $_SESSION['id']){
            header('Location: /dashboard');
        }
        //revisar que la persona que visita el proyecto sea quien lo creo
        $router->render('dashboard/reserva', [
            'titulo' => 'Resumen',
            'reservas' => $reservas
        ]);
    }

    //Menu//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function menu(Router $router){
        session_start();
        $router->render('dashboard/menu', [
            'titulo' => 'Menú'
        ]);
    }

   
}