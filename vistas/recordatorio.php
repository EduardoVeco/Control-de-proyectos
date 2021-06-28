<?php
$conexion = new mysqli('localhost', 'root', '', 'controlproyectos');

$sql = "SELECT now()  ";
$result = mysqli_query($conexion, $sql);
$mostrar = mysqli_fetch_array($result);

print_r($mostrar['now()']);

$destino = 'ajimeneze@toluca.tecnm.mx';
    $desde = "From:" . "Control de proyectos";
    $asunto = 'Mensaje programado';

    $mensaje = 'Para cambiar  la contraseña siga el link:  https://localhost/Control-de-proyectos/vistas/contrasenaolvidada.php?correo=' . $destino . 'esto esta programado else if';
    mail($destino, $asunto, $mensaje, $desde);
    echo "Correo enviado...";


if ($mostrar['now()'] == '2021-06-28 2:25') {
    $destino = 'kioya_@hotmail.com';
    $desde = "From:" . "Control de proyectos";
    $asunto = 'Cambio de ocntraseña';

    $mensaje = 'Para cambiar  la contraseña siga el link:  https://localhost/Control-de-proyectos/vistas/contrasenaolvidada.php?correo=' . $destino . 'esto esta programado';
    mail($destino, $asunto, $mensaje, $desde);
    echo "Correo enviado...";
} else if($mostrar['now()'] == '2021-06-28 2:25:00') {
    $destino = 'kioya_@hotmail.com';
    $desde = "From:" . "Control de proyectos";
    $asunto = 'Cambio de ocntraseña';

    $mensaje = 'Para cambiar  la contraseña siga el link:  https://localhost/Control-de-proyectos/vistas/contrasenaolvidada.php?correo=' . $destino . 'esto esta programado else if';
    mail($destino, $asunto, $mensaje, $desde);
    echo "Correo enviado...";
}

?>