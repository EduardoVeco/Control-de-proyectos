<?php
include "../php/Asesor.php";
$folio = $_REQUEST['folio'];
$nom = $_REQUEST['nombre'];
$app = $_REQUEST['paterno'];
$apm = $_REQUEST['materno'];
ingresar($folio, $nom, $app, $apm);
function ingresar($folio, $nom, $app, $apm)
{
   $nombre = '';
   $nombre = $nombre . $nom . ' ' . $app . ' ' . $apm;
   if (isset($_POST['terminar2'])) {
      $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
      if ($nom != '' && $app != '' && $apm != '') {
         Asesor::retomarProyecto($folio, null, $nombre, null, null, null, null, null);
        
         $consulta = mysqli_query($con, "SELECT correo FROM proyectos WHERE noFolio='$folio'");
         $mostrar = mysqli_fetch_array($consulta);
         $correo = $mostrar['correo'];
         header('location: asesor.php?correo=' . $correo);
      }
      else{
         $consulta = mysqli_query($con, "SELECT correo FROM proyectos WHERE noFolio='$folio'");
         $mostrar = mysqli_fetch_array($consulta);
         $correo = $mostrar['correo'];
         header('location: asesor.php?correo=' . $correo);
      }
   }
}
