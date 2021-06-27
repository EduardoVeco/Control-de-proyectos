<?php

if (isset($_POST['asunto']) && !empty($_POST['asunto']) && isset($_POST['mensaje']) && !empty($_POST['mensaje'])) {
	$destino = "ajimeneze@toluca.tecnm.mx";
	$desde = "From:" . "Control de proyectos";
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	mail($destino, $asunto, $mensaje, $desde);
	echo "Correo enviado...";
} else {
	echo "Problemas al enviar";
}
