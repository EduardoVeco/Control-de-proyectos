<?php

class Asesor
{
    public function __construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad)
    {
    }

    public function consultarProyectos($noControl)
    {
    }

    public static function registrarProyecto($titulo, $justificacion, $alcance, $resumen, $priTitulo, $priJustificacion, $priAlcance, $priResumen, $correo, $dueno, $coasesor, $fecha_registro, $directorio, $aprobacion)
    {
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));

        $dia = date("d") - 1;
        $mes = date("m");
        $año = date("Y");
        $num = 1;
        $str = '';
        $fecha = '';
        $fecha = $fecha . $año . '-' . $dia . '-' . $mes;
        $str = $str . $aprobacion . $dia . $mes . $año . $num;
        $i = 1;
        $consulta = mysqli_query($con, "SELECT * from proyectos where noFolio='$str'");



        if (mysqli_num_rows($consulta) != 0) {
            while ($i > 0) {

                $consult = mysqli_query($con, "SELECT * from proyectos where noFolio='$str'");

                if (mysqli_num_rows($consult) != 0) {
                    $num = $num + 1;
                    $str = '';
                    $str = $str . $aprobacion . $dia . $mes . $año . $num;
                } else {
                    print_r($num);
                    $i = 0;
                }
            }
            if ($aprobacion == 'A') {
                $aprobacion = 'APROBADO';
            }
            $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','ACTIVO','$aprobacion',$num,'$fecha','perrito')");
        } else {
            if ($aprobacion == 'A') {
                $aprobacion = 'APROBADO';
            }
            $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','ACTIVO','$aprobacion',$num,'$fecha','perrito')");
        }
        $consulta = mysqli_query($con, "INSERT INTO primitivas (id,noFolio,tituloPrimitivas,justificacionPrimitivas,alcancesPrimitivas,resumenPrimitivas) VALUES  (null ,'$str','$priTitulo','$priJustificacion','$priAlcance','$priResumen')");

        $dia = date("d") - 1;
        $mes = date("m");
        $año = date("Y");
        $num = 1;
        $str = '';
        $fecha = '';
        $fecha = $fecha . $año . '-' . $dia . '-' . $mes;
        $str = $str . $aprobacion . $dia . $mes . $año . $num;
        $i = 1;
        $consulta = mysqli_query($con, "SELECT * from proyectos where noFolio='$str'");



        if (mysqli_num_rows($consulta) != 0) {
            while ($i > 0) {

                $consulta = mysqli_query($con, "SELECT * from proyectos where noFolio='$str'");

                if (mysqli_num_rows($consulta) != 0) {
                    $num = $num + 1;
                    $str = $str . $aprobacion . $dia . $mes . $año . $num;
                } else {
                    print_r($num);
                    $i = 0;
                }
            }
            if ($aprobacion == 'A') {
                $aprobacion = 'APROBADO';
            }
            $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','ACTIVO','$aprobacion',$num,'$fecha','perrito')");
        } else {
            if ($aprobacion == 'A') {
                $aprobacion = 'APROBADO';
            }
            $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','ACTIVO','$aprobacion',$num,'$fecha','perrito')");
        }
    }

    public function retomarProyecto($noFolio, $equipo, $coAsesor)
    {
    }

    public function actualizarProyecto($evidencia, $porcentaje)
    {
    }
}
