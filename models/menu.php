<?php

namespace Model;

class Menu extends ActiveRecord {
    protected static $tabla = 'menu';
        protected static $columnasDB = ['id', 'nombre_comida', 'receta', 'tipo_comida'];

        public $id;
        public $nombre_comida;
        public $receta;
        public $tipo_comida;

        public function __construct($args = []) 
        {
            $this->id = $args['id'] ?? null;
            $this->nombre_comida = $args['nombre_comida'] ?? '';
            $this->receta = $args['receta'] ?? '';
            $this->tipo_comida = $args['tipo_comida'] ?? '';

        }

        //API para el menu y estados y tipos
        
}