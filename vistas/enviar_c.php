<?php


if (isset($_POST['enviar'])) {
	$destino = $_POST['correo'];
	$desde = "From:" . "Control de proyectos";
	$asunto = 'Cambio de contraseña';
	$mensaje = 'Para cambiar  la contraseña siga el link:  https://localhost/Control-de-proyectos/vistas/contrasenaolvidada.php?correo=' . $destino;
    $asunto=utf8_decode($asunto);
    $mensaje=utf8_decode($mensaje);
    mail($destino, $asunto, $mensaje, $desde);
	echo "Correo enviado...";
	header("Location: index.html");
} else {
	echo "Problemas al enviar";
}
