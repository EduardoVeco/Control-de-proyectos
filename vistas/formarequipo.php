<?php
include "../php/Asesor.php";
$noControlA = $_REQUEST['noControlA'];
$nombre = $_REQUEST['nombre'];
$paterno = $_REQUEST['paterno'];
$materno = $_REQUEST['materno'];
$folio = $_REQUEST['folio'];
$proposito = $_REQUEST['proposito'];

conectar($folio,$noControlA,$nombre,$paterno, $materno,$proposito);
function conectar($folio,$noControlA,$nombre,$paterno, $materno,$proposito)
{
    Asesor::retomarProyecto($folio, null, null, $noControlA, $nombre, $paterno, $materno,$proposito);
}
