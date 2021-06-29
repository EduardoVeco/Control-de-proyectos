<?php

$con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));



prueba();
//conecta($con);
//conecta($con);
function prueba(){
print_r('hola');

}
function cambioContrasena($conexion){
   $correo = $_REQUEST['correo'];
$contra1=$_REQUEST['contrasenaA'];
$contra2=$_REQUEST['contrasenaN'];
$contra3=$_REQUEST['contrasenaNN'];
print_r($correo);
$sql = "SELECT * from usuarios where correo='$correo' AND contrasenia='$contra1'";
   $result = mysqli_query($conexion, $sql);
   if ($result && mysqli_num_rows($result) == 1) {
      if($contra2==$contra3){
         print_r('ando aca'); 
         $sqll = "UPDATE usuarios SET contrasenia = '$contra2' WHERE correo = '$correo'";
         mysqli_query($conexion, $sqll);
      }
   }
   else{
   }
}

function olvidoContrasena($conexion){
   $correo = $_REQUEST['correo'];
$contra2=$_REQUEST['contrasenaN'];
$contra3=$_REQUEST['contrasenaNN'];
print_r($correo);
$sql = "SELECT * from usuarios where correo='$correo'";
   $result = mysqli_query($conexion, $sql);
   if ($result && mysqli_num_rows($result) == 1) {
      if($contra2==$contra3){
         print_r('ando aca'); 
         $sqll = "UPDATE usuarios SET contrasenia = '$contra2' WHERE correo = '$correo'";
         mysqli_query($conexion, $sqll);
      }
   }
   else{
   }

}



function conecta($conexion)
{
   $correo = $_REQUEST['correo'];
   $contrasena = $_REQUEST['contrasena'];

   $sql = "SELECT * from usuarios where correo='$correo' AND contrasenia='$contrasena'";
   $result = mysqli_query($conexion, $sql);

   if ($result && mysqli_num_rows($result) == 1) {
      $mostrar = mysqli_fetch_array($result);
      if ($mostrar['tipoUsuario'] == 'Asesor') {
         header('location: asesor.php?correo=' . $correo);
      } else {
         header('location: dptoinvestigacion.php?correo=' . $correo);
      }
   } else {
      $query = array(
         'error' => true,
         'correo' => $_POST['correo'],
         'contrasena' => $_POST['contrasena']
      );

      $query = http_build_query($query);
      header("Location: index1.php?$query");
   }  
}
function registraUsuario($conexion)
{
   print_r('por aca');

   $correo = $_REQUEST['correo'];
   $nombre = $_REQUEST['nombre'];
   $primerApellido = $_REQUEST['paterno'];
   $segundoApellido = $_REQUEST['materno'];
   $noControl = $_REQUEST['noControl'];
   $contrasena = $_REQUEST['contrasena'];
   $carrera = $_REQUEST['carrera'];
   $tipoUsuario = 'Asesor';

   $sql = "INSERT INTO usuarios(correo,nombre,primerApellido,segundoApellido,noControl,contrasenia,carrera,tipoUsuario) VALUES ('$correo','$nombre','$primerApellido','$segundoApellido','$noControl','$contrasena','$carrera','$tipoUsuario')";

   mysqli_query($conexion, $sql);
   mysqli_close($conexion);
   header('location: registrousuario.html');
}

function registraDueno($conexion)
{
    //print_r('por aca');

    $noFolio="";
    $correo = $_REQUEST['correo'];
    $nombre = $_REQUEST['nombre'];
    $primerApellido = $_REQUEST['paterno'];
    $segundoApellido = $_REQUEST['materno'];
    $primjust = $_REQUEST['primjust'];
    $primtit = $_REQUEST['primtit'];
    $primalc = $_REQUEST['primalc'];
    $primres = $_REQUEST['primres'];
    $duenio = $nombre-' '.$primerApellido.' '.$segundoApellido;
    $aprobado = $_REQUEST['aprobado'];
    $directorio = "/documentos/$noFolio/";
    $titulo = $_REQUEST['titulo'];
    $justificacion = $_REQUEST['justificacion'];
    $alcances = $_REQUEST['alcances'];
    $resumen = $_REQUEST['resumen'];

    $sql = "INSERT INTO proyectos(noFolio,correo,duenio,coasesor,titulo,justificacion,alcances,resumen,estatus,aprobacion,avance,fecha_registro,directorio) VALUES ('$noFolio','$correo','$duenio','null','$titulo','$justificacion','$alcances','$resumen','Inactivo','$aprobado',0.0,sysdate,'$directorio'";

    mysqli_query($conexion, $sql);

    $sql ="INSERT INTO primitivas(noFolio,tituloPRimitivas,justificacionPRimitivas,alcancesPRimitivas,resumenPRimitivas) VALUES ('$noFolio','$primtit','$primjust','$primalc')";

    mysqli_query($conexion,$sql);
    mysqli_close($conexion);
    header('location: registroequipo.php');
}

function registraEquipo($conexion)
{
    //print_r('por aca');

    $noEquipo = $_REQUEST['noEquipo'];
    $proposito = $_REQUEST['proposito'];
    $noControl = $_REQUEST['noControl'];

    $sql = "INSERT INTO equipos(noEquipo,proposito,noControl) VALUES ('$noEquipo','$proposito','$noControl')";

    mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    header('location: registroequipo.html');
}

function registraAsesor($conexion)
{
    //print_r('por aca');

    $nombre = $_REQUEST['nombre'];
    $primerApellido = $_REQUEST['paterno'];
    $segundoApellido = $_REQUEST['materno'];
    $noControl = $_REQUEST['noControl'];

    $sql = "INSERT INTO usuarios(nombre,primerApellido,segundoApellido,noControl) VALUES ('$nombre','$primerApellido','$segundoApellido','$noControl')";

    mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    header('location: registroequipo.html');
}
