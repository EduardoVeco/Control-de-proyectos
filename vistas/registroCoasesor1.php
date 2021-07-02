<?php
include "../php/Asesor.php";
$folio = $_REQUEST['folio'];
$nom = $_REQUEST['nombre'];
$app = $_REQUEST['paterno'];
$apm = $_REQUEST['materno'];
$noControl = $_REQUEST['noControl'];
ingresar($folio, $nom, $app, $apm,noControl:);
function ingresar($folio, $nom, $app, $apm,$noControl)
{
   $nombre = '';
   $nombre = $nombre . $nom . ' ' . $app . ' ' . $apm;
   if (isset($_POST['terminar2'])) {
      $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
      
      $consulta = mysqli_query($con, "SELECT noControl FROM integrantes WHERE noFolio='$noControl'");
      $mostrar = mysqli_fetch_array($consulta);
      $resultado = $mostrar['noControl'];
      if(mysqli_num_rows($consulta)==0){
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
   else{
      header('location: regustrocoasesor.php?correo=' . $correo);
   }
   }
}
