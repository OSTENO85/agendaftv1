<?php

namespace Model;

class Usuario extends ActiveRecord{
        protected static $tabla = 'usuarios';
        protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'perfil'];

        public $id;
        public $nombre;
        public $email;
        public $password;
        public $password2;
        public $perfil;


        public function __construct($args = []) 
        {
            $this->id = $args['id'] ?? null;
            $this->nombre = $args['nombre'] ?? '';
            $this->email = $args['email'] ?? '';
            $this->password = $args['password'] ?? '';
            $this->password2 = $args['password2'] ?? '';
            $this->perfil = $args['perfil'] ?? 0;

        }

        //validar LOGIN de usuarios/////////////////////////////////////////////////////////////////////////////////////////
        public function validarLogin(){
            if(!$this->email){
                self::$alertas['error'] [] = 'el email es obligatorio';
            }

            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                self::$alertas['error'] [] = 'email no valido';
            }

            if(!$this->password){
                self::$alertas['error'] [] = 'el password no puede ir vacio';
            }
            return self::$alertas;
        }

        //validar cuentas nuevas/////////////////////////////////////////////////////////////////////////////////////////////////
        public function validarNuevaCuenta()
        {
            if(!$this->nombre){
                self::$alertas['error'] [] = 'el nombre es obligatorio';
            }

            if(!$this->email){
                self::$alertas['error'] [] = 'el email es obligatorio';
            }

            if(!$this->password){
                self::$alertas['error'] [] = 'el password no puede ir vacio';
            }

            if(strlen($this->password) < 6) {
                self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
            }
            if($this->password !== $this->password2) {
                self::$alertas['error'][] = 'Los password son diferentes';
            }

            



            return self::$alertas;
        }

        
  //Hass Password////////////////////////////////////////////////////////////////////////////////////////////////////////

  public function hashPassword(){
    $this->password = password_hash($this->password, PASSWORD_BCRYPT);
  }


  
}