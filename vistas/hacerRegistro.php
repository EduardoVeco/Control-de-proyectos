<?php
include "../php/Asesor.php";
$primjust = $_REQUEST['primjust'];
$primtit = $_REQUEST['primtit'];
$primalc = $_REQUEST['primalc'];
$primres = $_REQUEST['primres'];
$correo = $_REQUEST['correo'];
$justificacion = $_REQUEST['justificacion'];
$titulo = $_REQUEST['titulo'];
$alcances = $_REQUEST['alcances'];
$resumen = $_REQUEST['resumen'];
$folio = $_REQUEST['folio'];
$tempFolio = $_REQUEST['tempFolio'];

hacer();
function hacer()
{
    $primjust = $_REQUEST['primjust'];
    $primtit = $_REQUEST['primtit'];
    $primalc = $_REQUEST['primalc'];
    $primres = $_REQUEST['primres'];
    $correo = $_REQUEST['correo'];
    $justificacion = $_REQUEST['justificacion'];
    $titulo = $_REQUEST['titulo'];
    $alcances = $_REQUEST['alcances'];
    $resumen = $_REQUEST['resumen'];
    $folio = $_REQUEST['folio'];
    $tempFolio = $_REQUEST['tempFolio'];
    $nom = $_REQUEST['nombre'];
    $app = $_REQUEST['paterno'];
    $apm = $_REQUEST['materno'];
    $nombre = '';
    $nombre = $nombre . $nom . ' ' . $app . ' ' . $apm;
    if (isset($_POST['terminar'])) {
        Asesor::registrarProyecto($titulo, $justificacion, $alcances, $resumen, $primtit, $primjust, $primalc, $primres, $correo, $nombre, null, ' ', ' ', $folio, $tempFolio, 'terminar');
    } else if (isset($_POST['siguiente'])) {
        Asesor::registrarProyecto($titulo, $justificacion, $alcances, $resumen, $primtit, $primjust, $primalc, $primres, $correo, $nombre, null, ' ', ' ', $folio, $tempFolio, 'continuar');
    }
}
