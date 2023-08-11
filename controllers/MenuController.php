<?php

namespace Controllers;

use Model\menu;


class MenuController{
    public static function index(){
        session_start();
        $menu = menu::all();
        echo json_encode([ 'menu' => $menu ]);
    }

    public static function crear(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
         session_start();
            $menu = new menu($_POST);
            $resultado = $menu->guardar();
            $respuesta = [
                'tipo' => 'exito',
                'id' =>$resultado['id'],
                'mensaje' => 'tarea creada correctamente'
            ];


            echo json_encode($respuesta);
        }
    }

    public static function actualizar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

         
        
            $menu = new menu($_POST);
            $resultado = $menu->eliminar();

            $resultado = [
                'resultado' => $resultado,
                'mensaje' => 'eliminado correctamente',
                'tipo' =>'exito'
            ];

            echo json_encode($resultado);
        }
    }
}