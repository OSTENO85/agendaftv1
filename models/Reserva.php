<?php

namespace Model;

class Reserva extends ActiveRecord{
        protected static $tabla = 'reservas';
        protected static $columnasDB = ['id', 'descripcion', 'fecha', 'hora', 'estado', 'tipo', 'url', 'usuarioId'];

        public $id;
        public $descripcion;
        public $fecha;
        public $hora;
        public $estado;
        public $tipo;
        public $url;
        public $usuarioId;

     

        public function __construct($args = []) 
        {
            $this->id = $args['id'] ?? null;
            $this->descripcion = $args['descripcion'] ?? '';
            $this->fecha = $args['fecha'] ?? '';
            $this->hora = $args['hora'] ?? '';
            $this->estado = $args['estado'] ?? 0;
            $this->tipo = $args['tipo'] ?? 0;
            $this->url = $args['url'] ?? '';
            $this->usuarioId = $args['usuarioId'] ?? '';

         


        }

        public function validarReserva(){
            if(!$this->descripcion){
                self::$alertas['error'] [] = 'la descripcion es obligatoria';
            }

            if(!$this->fecha){
                self::$alertas['error'] [] = 'la fecha es obligatoria';
            }

            if(!$this->hora){
                self::$alertas['error'] [] = 'la hora es obligatoria';
            }

            return self::$alertas;
        }

    }