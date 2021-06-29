<?php

class Asesor
{
    public function __construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad)
    {
    }

    public function consultarProyectos($noControl)
    {
    }

    public static function registrarProyecto($titulo, $justificacion, $alcance, $resumen, $priTitulo, $priJustificacion, $priAlcance, $priResumen, $correo, $dueno, $coasesor, $fecha_registro, $directorio, $aprobacion, $variable)
    {
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
        if ($variable == 'terminar') {
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
                $fecha = $fecha . date("Y") . '-' . date("d") . '-' . date("m");
                $ruta = '';
                $ruta = $ruta . '../documentos/' . $str . '/';
                $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','INACTIVO','$aprobacion',$num,now(),'$ruta')");
                if (!mkdir($ruta, 0777, false)) {
                    die('Fallo al crear las carpetas...');
                } else {
                    print_r('');
                }
                header('location: asesor.php?correo=' . $correo);
            } else {
                if ($aprobacion == 'A') {
                    $aprobacion = 'APROBADO';
                }
                $fecha = $fecha . date("Y") . '-' . date("d") . '-' . date("m");
                $ruta = '';
                $ruta = $ruta . '../documentos/' . $str . '/';
                $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','INACTIVO','$aprobacion',$num,now(),'$ruta')");
                if (!mkdir($ruta, 0777, false)) {
                    die('Fallo al crear las carpetas...');
                } else {
                    print_r('');
                }
            }
            $consulta = mysqli_query($con, "INSERT INTO primitivas (id,noFolio,tituloPrimitivas,justificacionPrimitivas,alcancesPrimitivas,resumenPrimitivas) VALUES  (null ,'$str','$priTitulo','$priJustificacion','$priAlcance','$priResumen')");
                       header('location: asesor.php?correo=' . $correo);
        } else if ($variable == 'continuar') {

            $dia = date("d") - 1;
            $mes = date("m");
            $año = date("Y");
            $num = 1;
            $str = '';
            $fecha = '';
            $fecha = $fecha . date("Y") . '-' . date("d") . '-' . date("m");
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
                $fecha = $fecha . date("Y") . '-' . date("d") . '-' . date("m");
                $ruta = '';
                $ruta = $ruta . '../documentos/' . $str . '/';
                $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','ACTIVO','$aprobacion',$num,now(),'$ruta')");
            } else {
                if ($aprobacion == 'A') {
                    $aprobacion = 'APROBADO';
                }
                $fecha = $fecha . date("Y") . '-' . date("d") . '-' . date("m");
                $ruta = '';
                $ruta = $ruta . '../documentos/' . $str . '/';
                $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','ACTIVO','$aprobacion',$num,now(),'$ruta')");
            }
            $consulta = mysqli_query($con, "INSERT INTO primitivas (id,noFolio,tituloPrimitivas,justificacionPrimitivas,alcancesPrimitivas,resumenPrimitivas) VALUES  (null ,'$str','$priTitulo','$priJustificacion','$priAlcance','$priResumen')");
            if (!mkdir($ruta, 0777, false)) {
                die('Fallo al crear las carpetas...');
            } else {
                print_r('');
            }
            header('location: registroequipo.php?folio=' . $str);
        }
    }


    public static function retomarProyecto($noFolio, $equipo, $coAsesor,$noControl,$nombre,$primerApellido,$segundoApellido)
    {
        //Numero de control
        $token2 = strtok($noControl, " ");
        $aNC = array();
        while ($token2 !== false) {
            array_push($aNC, $token2);
            $token2 = strtok(" ");
        }
        //nombre
        $token3 = strtok($nombre, " ");
        $aNom = array();
        while ($token3 !== false) {
            array_push($aNom, $token3);
            $token3 = strtok(" ");
        }
        //primer apellido
        $token4 = strtok($primerApellido, " ");
        $aPA = array();
        while ($token4 !== false) {
            array_push($aPA, $token4);
            $token4 = strtok(" ");
        }
        //segundo apellido
        $token5= strtok($segundoApellido, " ");
        $aSA = array();
        while ($token5 !== false) {
            array_push($aSA, $token5);
            $token5= strtok(" ");
        }
        $consulta =mysqli_query($con,"INSERT INTO equipos (noEquipo,proposito,fecha_inicial,fecha_final)VALUES(null,)");
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
foreach($aNC as $contador){
$contador=$contador+1;
}
for($i=0;$i<$contador;$i++){
$consulta =mysqli_query($con,"SELECT * FROM integrantes where noControl=$aNC[$i]");
if(mysqli_num_rows($consulta) != 0){

}
}

    }

    public function actualizarProyecto($evidencia, $porcentaje)
    {
    }
}
