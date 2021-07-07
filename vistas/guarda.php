<?php

//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
	//Validamos que el archivo exista
	if ($_FILES["archivo"]["name"][$key]) {
		$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
		$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
		$correo = '';
		$folio = $_REQUEST['folio'];
		print_r($folio);
		$conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');
		$sql = "SELECT correo,directorio
                FROM proyectos
                WHERE nofolio='$folio'";
		$result = mysqli_query($conexion, $sql);

		while ($mostrar = mysqli_fetch_array($result)) {
			$directorio = $mostrar['directorio']; //Declaramos un variable con la ruta donde guardaremos los archivos
			$correo = $mostrar['correo']; 

		}


		//Validamos si la ruta de destino existe, en caso de no existir la creamos
		if (!file_exists($directorio)) {
			mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
		}

		$dir = opendir($directorio); //Abrimos el directorio de destino
		$target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo

		//Movemos y validamos que el archivo se haya cargado correctamente
		//El primer campo es el origen y el segundo el destino
		if (move_uploaded_file($source, $target_path)) {
		} else {
		}
		header('location: proyecto.php?correo=' . $correo . '&folio=' . $folio);

		closedir($dir); //Cerramos el directorio de destino
	}
}
