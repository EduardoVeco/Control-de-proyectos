<?php

$folio = $_REQUEST['folio'];
$folio = $_REQUEST['folio2'];
$correo = $_REQUEST['correo'];
$cantidad = $_REQUEST['cantidad'];
print_r($folio);
print_r($correo);
$con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
cambio($folio, $correo, $con);
function cambio($folio, $correo, $con)
{
    if (isset($_POST['btnCorreo'])) {
        header('location: cederproyecto1.php?correo=' . $correo . '&folio=' . $folio);
    } else  if (isset($_POST['btnCeder'])) {
        $consulta = mysqli_query($con, "SELECT correo from proyectos where noFolio='$folio'");
        $mostrar = mysqli_fetch_array($consulta);
        $resultado = $mostrar['correo'];
        $consulta1 = mysqli_query($con, "SELECT tipoUsuario FROM usuarios where correo='$correo'");
        if (mysqli_num_rows($consulta1) == 1) {
            $consulta = mysqli_query($con, "UPDATE proyectos SET correo='$correo' where noFolio='$folio'");
            print_r('aqui llegue');
            header('location: asesor.php?correo=' . $resultado);

            $destino = $correo;
            $desde = "From:" . "Control de proyectos";
            $asunto = 'Cesión de proyecto';
            $mensaje = 'El asesor ' . $resultado . ' le cede el proyecto con folio ' . $folio;
            $asunto = utf8_decode($asunto);
            mail($destino, $asunto, $mensaje, $desde);
            echo "Correo enviado...";
        }
    } else {
    }
}
