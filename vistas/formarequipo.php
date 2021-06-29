<?php
include "../php/Asesor.php";
$noControlA = $_REQUEST['noControlA'];
$nombre = $_REQUEST['nombre'];
$paterno = $_REQUEST['paterno'];
$materno = $_REQUEST['materno'];
$folio = $_REQUEST['folio'];
$proposito = $_REQUEST['proposito'];
print_r($proposito);

//conectar();
function conectar()
{
    $noControlA = $_REQUEST['noControlA'];
    $nombre = $_REQUEST['nombre'];
    $paterno = $_REQUEST['paterno'];
    $materno = $_REQUEST['materno'];
    $folio = $_REQUEST['folio'];
    Asesor::retomarProyecto($folio, null, null, $noControlA, $nombre, $paterno, $materno);
}
