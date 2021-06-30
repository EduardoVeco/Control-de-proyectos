<?php
include "../php/Asesor.php";
$noControlA = $_REQUEST['noControlA'];
$nombre = $_REQUEST['nombre'];
$paterno = $_REQUEST['paterno'];
$materno = $_REQUEST['materno'];
$folio = $_REQUEST['folio'];
$proposito = $_REQUEST['proposito'];
//print_r($proposito);

conectar($folio,$noControlA,$nombre,$paterno, $materno,$proposito);
function conectar($folio,$noControlA,$nombre,$paterno, $materno,$proposito)
{
    print_r($nombre);
    Asesor::retomarProyecto($folio, null, null, $noControlA, $nombre, $paterno, $materno,$proposito);
}
