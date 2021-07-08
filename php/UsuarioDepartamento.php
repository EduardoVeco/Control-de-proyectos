<?php

class UsuarioDepartamento 
{
   

    public function consultarProyectos(){

    }

    public static function autoriza($folio,$aprobacion,$conclusion,$correo){
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
        $consulta=mysqli_query($con,"UPDATE proyectos SET aprobacion='APROBADO' where noFolio='$folio'");
        $consulta1=mysqli_query($con,"SELECT correo from proyectos where noFolio='$folio'");
        $mostrar=mysqli_fetch_array($consulta1);
        $correoenvio=$mostrar['correo'];
        print_r($correoenvio);
        $desde = "From:" . "Control de proyectos";
        $asunto = 'Cambio de contraseña';
        $mensaje = 'Para cambiar  la contraseña siga el link: ';
        mail($correoenvio, $asunto, $mensaje, $desde);
        echo "Correo enviado...";
       header('location: dptoinvestigacion.php?correo=' . $correo);
    }

}

?>