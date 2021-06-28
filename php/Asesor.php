<?php

class Asesor extends Usuario
{
    public function __construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad)
    {
        parent::__construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad);
    }

    public function consultarProyectos($noControl){

    }

    public function registrarProyecto($titulo,$justificacion,$alcance,$resumen,$priTitulo,$priJustificacion,$priAlcance,$priResumen){

        //return $folio;   se debe generar el folio primero
    }

    public function terminoRegistroProyecto($aprobacion,$equipo,$asesor,$coAsesor,$dueño,$noControlDueño,$tipoDueño){

    }

    public function retomarProyecto($equipo,$asesor,$coAsesor){

    }

    public function actualizarProyecto($evidencia,$porcentaje){

    }

}
