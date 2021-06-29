<?php

class Asesor extends Usuario
{
    public function __construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad)
    {
        parent::__construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad);
    }

    public function consultarProyectos($noControl)
    {
    }

    public function registrarProyecto($titulo, $justificacion, $alcance, $resumen, $priTitulo, $priJustificacion, $priAlcance, $priResumen, $asesor, $dueno, $fecha_registro, $directorio, $aprobacion)
    {

        //return $folio;   se debe generar el folio primero
    }

    public function retomarProyecto($noFolio, $equipo, $coAsesor)
    {
    }

    public function actualizarProyecto($evidencia, $porcentaje)
    {
    }
}
