<?php

$sql = "SELECT directorio 
      FROM proyectos
      WHERE noFolio='$folio'";

$result = mysqli_query($con, $sql);

$mostrar = mysqli_fetch_array($result);

$str = '../documentos/folioVergon';
if (!mkdir($mostrar['directorio'], 0777, false)) {

    die('Fallo al crear las carpetas...');
} else {

}
