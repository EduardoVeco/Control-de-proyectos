<?php

class Asesor
{
    public function __construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad)
    {
    }

    public static function registrarProyecto($titulo, $justificacion, $alcance, $resumen, $priTitulo, $priJustificacion, $priAlcance, $priResumen, $correo, $dueno, $coasesor, $fecha_registro, $directorio, $aprobacion, $tempFolio, $variable)
    {
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
        if ($variable == 'terminar')
        {
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

            if (mysqli_num_rows($consulta) != 0)
            {
                while ($i > 0)
                {
                    $consult = mysqli_query($con, "SELECT * from proyectos where noFolio='$str'");

                    if (mysqli_num_rows($consult) != 0)
                    {
                        $num = $num + 1;
                        $str = '';
                        $str = $str . $aprobacion . $dia . $mes . $año . $num;
                    } else
                    {
                        $i = 0;
                    }
                }
                if ($aprobacion == 'A')
                {
                    $aprobacion = 'APROBADO';
                } else if ($aprobacion == 'R')
                {
                    $consulta = mysqli_query($con, "SELECT carrera from usuarios where correo='$correo'");
                    $mostrar = mysqli_fetch_array($consulta);
                    $carreraAux = $mostrar['carrera'];
                    $consulta = mysqli_query($con, "SELECT correo from usuarios where carrera='$carreraAux' AND noControl='XXX00XXX'");
                    $mostrar = mysqli_fetch_array($consulta);
                    $correoDepto = $mostrar['correo'];

                    $aprobacion = 'REVISION';
                    $destino = $correo;
                    $desde = "From:" . "Control de proyectos";
                    $asunto = 'Proyecto similar';
                    $mensaje = 'El folio de su proyecto es el siguiente ' . $str . ' se parece al siguiente folio ' . $tempFolio;
                    mail($destino, $asunto, $mensaje, $desde);
                    echo "Correo enviado...";

                    $aprobacion = 'REVISION';
                    $destino = $correoDepto;
                    $desde = "From:" . "Control de proyectos";
                    $asunto = 'Proyecto similar';
                    $mensaje = 'Se registro un proyecto con el folio' . $str . 'que tiene similitud con el proyecto' . $tempFolio;
                    mail($destino, $asunto, $mensaje, $desde);
                    echo "Correo enviado...";
                }
                print_r($correo);
                $fecha = $fecha . date("Y") . '-' . date("d") . '-' . date("m");
                $ruta = '';
                $ruta = $ruta . '../documentos/' . $str . '/';
                $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','INACTIVO','$aprobacion',0,now(),'$ruta')");
                if (!mkdir($ruta, 0777, false))
                {
                    die('Fallo al crear las carpetas...');
                } else
                {

                }
            } else
            {
                if ($aprobacion == 'A')
                {
                    $aprobacion = 'APROBADO';
                } else if ($aprobacion == 'R')
                {
                    $consulta = mysqli_query($con, "SELECT carrera from usuarios where correo='$correo'");
                    $mostrar = mysqli_fetch_array($consulta);
                    $carreraAux = $mostrar['carrera'];
                    $consulta = mysqli_query($con, "SELECT correo from usuarios where carrera='$carreraAux' AND noControl='XXX00XXX'");
                    $mostrar = mysqli_fetch_array($consulta);
                    $correoDepto = $mostrar['correo'];

                    $aprobacion = 'REVISION';
                    $destino = $correo;
                    $desde = "From:" . "Control de proyectos";
                    $asunto = 'Proyecto similar';
                    $mensaje = 'El folio de su proyecto es el siguiente ' . $str . ' se parece al siguiente folio ' . $tempFolio;
                    mail($destino, $asunto, $mensaje, $desde);
                    echo "Correo enviado...";

                    $aprobacion = 'REVISION';
                    $destino = $correoDepto;
                    $desde = "From:" . "Control de proyectos";
                    $asunto = 'Proyecto similar';
                    $mensaje = 'Se registro un proyecto con el folio' . $str . 'que tiene similitud con el proyecto' . $tempFolio;
                    mail($destino, $asunto, $mensaje, $desde);
                    echo "Correo enviado...";
                }
                $fecha = $fecha . date("Y") . '-' . date("d") . '-' . date("m");
                $ruta = '';
                $ruta = $ruta . '../documentos/' . $str . '/';
                $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','INACTIVO','$aprobacion',0,now(),'$ruta')");
                if (!mkdir($ruta, 0777, false))
                {
                    die('Fallo al crear las carpetas...');
                } else
                {

                }
            }
            $consulta = mysqli_query($con, "INSERT INTO primitivas (id,noFolio,tituloPrimitivas,justificacionPrimitivas,alcancesPrimitivas,resumenPrimitivas) VALUES  (null ,'$str','$priTitulo','$priJustificacion','$priAlcance','$priResumen')");
            header('location: asesor.php?correo=' . $correo);
        } else if ($variable == 'continuar')
        {

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

            if (mysqli_num_rows($consulta) != 0)
            {
                while ($i > 0)
                {

                    $consult = mysqli_query($con, "SELECT * from proyectos where noFolio='$str'");

                    if (mysqli_num_rows($consult) != 0)
                    {
                        $num = $num + 1;
                        $str = '';
                        $str = $str . $aprobacion . $dia . $mes . $año . $num;
                    } else
                    {
                        $i = 0;
                    }
                }
                if ($aprobacion == 'A')
                {
                    $aprobacion = 'APROBADO';
                }
                $fecha = $fecha . date("Y") . '-' . date("d") . '-' . date("m");
                $ruta = '';
                $ruta = $ruta . '../documentos/' . $str . '/';
                print_r($correo);
                print_r($str);
                print_r($dueno);
                print_r($coasesor);
                print_r($titulo);
                print_r($justificacion);
                print_r($alcance);
                print_r($resumen);
                print_r($aprobacion);
                print_r($ruta);

                $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES 
                ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','INACTIVO','$aprobacion',0,now(),'$ruta')");
            } else
            {
                if ($aprobacion == 'A')
                {
                    $aprobacion = 'APROBADO';
                }
                $fecha = $fecha . date("Y") . '-' . date("d") . '-' . date("m");
                $ruta = '';
                $ruta = $ruta . '../documentos/' . $str . '/';
                $consulta = mysqli_query($con, "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$str','$correo','$dueno','$coasesor','$titulo','$justificacion','$alcance','$resumen','INACTIVO','$aprobacion',0,now(),'$ruta')");
            }
            $consulta = mysqli_query($con, "INSERT INTO primitivas (id,noFolio,tituloPrimitivas,justificacionPrimitivas,alcancesPrimitivas,resumenPrimitivas) VALUES  (null ,'$str','$priTitulo','$priJustificacion','$priAlcance','$priResumen')");
            if (!mkdir($ruta, 0777, false))
            {
                die('Fallo al crear las carpetas...');
            } else
            {

            }
            header('location: registroequipo.php?folio=' . $str);
        }
    }


    public static function retomarProyecto($noFolio, $equipo, $coAsesor, $noControl, $nombre, $primerApellido, $segundoApellido, $proposito)
    {
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
        $folio = trim($noFolio, "\"\"");
        $noControl = ltrim($noControl, ",");
        $nombre = ltrim($nombre, ",");
        $primerApellido = ltrim($primerApellido, ",");
        $segundoApellido = ltrim($segundoApellido, ",");
        if ($coAsesor == null && $equipo == null)
        {
            //Numero de control
            $token2 = strtok($noControl, ",");
            $aNC = array();
            while ($token2 !== false)
            {
                array_push($aNC, $token2);
                $token2 = strtok(",");
            }
            //nombre
            $token3 = strtok($nombre, ",");
            $aNom = array();
            while ($token3 !== false)
            {
                array_push($aNom, $token3);
                $token3 = strtok(",");
            }
            //primer apellido
            $token4 = strtok($primerApellido, ",");
            $aPA = array();
            while ($token4 !== false)
            {
                array_push($aPA, $token4);
                $token4 = strtok(",");
            }
            //segundo apellido
            $token5 = strtok($segundoApellido, ",");
            $aSA = array();
            while ($token5 !== false)
            {
                array_push($aSA, $token5);
                $token5 = strtok(",");
            }

            $consulta = mysqli_query($con, "INSERT INTO equipos (noEquipo,proposito,fecha_inicial,fecha_final)VALUES(null,'$proposito',now(),null)");
            $contador = 0;
            foreach ($aNC as $perro)
            {
                $contador = $contador + 1;
            }
            for ($i = 0; $i <= $contador - 1; $i++) {
                $str = '';
                $str = $str . $aNC[$i] . '';
                $str2 = '';
                $str2 = $str2 . $aNom[$i] . '';
                $str3 = '';
                $str3 = $str3 . $aPA[$i] . '';
                $str4 = '';
                $str4 = $str4 . $aSA[$i] . '';
                $consulta = mysqli_query($con, "SELECT * FROM integrantes where noControl=$str");
                if (mysqli_num_rows($consulta) != 0)
                {
                    //no hace nada 
                } else
                {
                    $consulta = mysqli_query($con, "INSERT INTO integrantes (noControl ,nombre,primerApellido,segundoApellido) VALUES ('$str','$str2','$str3','$str4')");
                }
            }
            $consulta = mysqli_query($con, "SELECT max(noEquipo) as valorMax from equipos");
            $mostrar = mysqli_fetch_array($consulta);
            $resultado = $mostrar['valorMax'];
            $token2 = '';
            $token2 = strtok($noControl, ",");
            $aNC = array();
            while ($token2 !== false)
            {
                array_push($aNC, $token2);
                $token2 = strtok(",");
            }
            $contador = 0;
            foreach ($aNC as $perro)
            {
                $contador = $contador + 1;
            }
            for ($j = 0; $j <= $contador; $j++)
            {
                $str = '';
                $str = $str . $aNC[$j] . '';
                $consulta = mysqli_query($con, "INSERT INTO historicos (id,noFolio,noEquipo,noControl) VALUES (null,'$folio','$resultado','$str')");
            }
            $consulta = mysqli_query($con, "UPDATE proyectos SET estatus='ACTIVO' where noFolio='$folio'");
            header('location: registrocoasesor.php?folio=' . $folio);
        } else if ($coAsesor != null && $equipo == null)
        {
            $consulta = mysqli_query($con, "UPDATE proyectos SET coasesor='$coAsesor' where noFolio='$folio'");
        }
    }

    public static function actualizarProyecto($folio, $porcentaje)
    {
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));

        $consulta1 = mysqli_query($con, "SELECT avance from proyectos where noFolio='$folio'");
        $mostrar2 = mysqli_fetch_array($consulta1);
        $resultado = $mostrar2['avance'];
        if ($porcentaje < $resultado)
        {
            $consulta = mysqli_query($con, "SELECT correo from proyectos where noFolio='$folio'");
            $mostrar2 = mysqli_fetch_array($consulta);
            $correo = $mostrar2['correo'];
            header('location: proyecto.php?folio=' . $folio . '&correo=' . $correo);
        } else
        {
            if ($porcentaje == 100)
            {
                $consulta = mysqli_query($con, "UPDATE proyectos SET estatus='COMPLETADO' WHERE noFolio='$folio'");
            }
            $consulta = mysqli_query($con, "SELECT correo from proyectos where noFolio='$folio'");
            $mostrar2 = mysqli_fetch_array($consulta);
            $consulta = mysqli_query($con, "UPDATE proyectos SET avance='$porcentaje' WHERE noFolio='$folio'");
            $correo = $mostrar2['correo'];
            header('location: proyecto.php?folio=' . $folio . '&correo=' . $correo);
        }
    }
}
