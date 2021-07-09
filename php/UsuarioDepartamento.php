<?php

class UsuarioDepartamento
{


    public function consultarProyectos()
    {
    }

    public static function autoriza($folio, $aprobacion, $conclusion, $correo,$folio2,$cantidad)
    {
        
        if($conclusion==''){
            header('location: comparacion1.php?folio1=' . $folio.'&folio2='.$folio2.'&correo='.$correo.'&estado=Hay perros.'.'cantidad='.$cantidad);
        }
        else{
        if ($aprobacion == 'NO APROBADO') {
            $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
            $consulta = mysqli_query($con, "SELECT aprobacion from proyectos where noFolio='$folio'");
            $mostrar1 = mysqli_fetch_array($consulta);
            $estado = $mostrar1['aprobacion'];
            if ($estado == 'APROBADO') {
                print_r('Aqui modifica yayo mensaje');
            } else {
                $consulta = mysqli_query($con, "UPDATE proyectos SET aprobacion='NO APROBADO' where noFolio='$folio'");
                $consulta2 = mysqli_query($con, "SELECT correo from proyectos where noFolio='$folio'");
                $mostrar2 = mysqli_fetch_array($consulta2);
                $correoenvio = $mostrar2['correo'];
                print_r($correoenvio);
                
                $desde = "From:" . "Control de proyectos";
                $asunto = 'PROYECTO NO APROBADO';
                $mensaje = 'El departamento concluyo que ' . $conclusion . ' Por lo que ' . 'su proyecto con folio=' . $folio . ' NO fue aprobado con éxito';
                $mensaje=utf8_decode($mensaje);
                mail($correoenvio, $asunto, $mensaje, $desde);
                echo "Correo enviado...";
                header('location: dptoinvestigacion.php?correo=' . $correo);
            }
        } else if ($aprobacion == 'APROBADO') {
            $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
            $consulta = mysqli_query($con, "UPDATE proyectos SET aprobacion='APROBADO' where noFolio='$folio'");
            $consulta1 = mysqli_query($con, "SELECT correo from proyectos where noFolio='$folio'");
            $mostrar = mysqli_fetch_array($consulta1);
            $correoenvio = $mostrar['correo'];
            print_r($correoenvio);
            $desde = "From:" . "Control de proyectos";
            $asunto = 'PROYECTO APROBADO';
            $mensaje = 'El departamento concluyo que ' . $conclusion . ' Por lo que ' . 'su proyecto con folio=' . $folio . ' fue aprobado con éxito';
            $mensaje=utf8_decode($mensaje);
            mail($correoenvio, $asunto, $mensaje, $desde);
            echo "Correo enviado...";
            header('location: dptoinvestigacion.php?correo=' . $correo);
        }
    }}
}
