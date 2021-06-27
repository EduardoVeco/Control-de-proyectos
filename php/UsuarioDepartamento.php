<?php

class UsuarioDepartamento extends Usuario
{
    public function __construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad)
    {
        parent::__construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad);
    }


    public function consultarProyectos(){

    }

    public function autoriza($folio,$aprobacion,$conclusion){

    }

}

?>