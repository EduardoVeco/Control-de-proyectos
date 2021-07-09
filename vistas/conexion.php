<?php

$con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));




//prueba();
//login($con);

conexionAClases($con);
//conecta($con);
function conexionAClases($con)
{
   if (isset($_POST['registrar'])) {
      registraUsuario($con);
      //header('location: registrousuario.html');
   } else if (isset($_POST['login'])) {
      login($con);
   } else if (isset($_POST['olvidada'])) {
      olvidoContrasena($con);
   } else if (isset($_POST['cambio'])) {
      cambioContrasena($con);
   }
}

function login($conexion)
{
   if (!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
      $username = $_POST['correo'];
      $password = $_POST['contrasena'];

      $sql = "SELECT * from usuarios where correo='$username'";
      $result = mysqli_query($conexion, $sql);

      if (mysqli_num_rows($result) == 1) {

         $sql = "SELECT * from usuarios where correo='$username' AND contrasenia='$password'";
         $result = mysqli_query($conexion, $sql);
         $mostrar = mysqli_fetch_array($result);
         if (mysqli_num_rows($result) == 1) {

            session_start();
            $_SESSION['correo'] = $mostrar['correo'];
            $_SESSION['time'] = time();

            if ($mostrar['tipoUsuario'] == 'Asesor') {
               header('location: asesor.php?correo=' . $username);
            } else {
               header('location: dptoinvestigacion.php?correo=' . $username);
            }
         } else {
            header('location: index1.php?correo=' . $username . '&contrasena=' . $password . '&estado=Contraseña o correo incorrectos');
         }
      } else {
         header('location: index1.php?correo=' . $username . '&contrasena=' . $password . '&estado=El usuario no esta registrado');
      }
   }
}
//conecta($con);
//function prueba(){

//}

function cambioContrasena($conexion)
{
   $correo = $_REQUEST['correo'];
   $contra1 = $_REQUEST['contrasenaA'];
   $contra2 = $_REQUEST['contrasenaN'];
   $contra3 = $_REQUEST['contrasenaNN'];
   $sql = "SELECT * from usuarios where correo='$correo' AND contrasenia='$contra1'";
   $result = mysqli_query($conexion, $sql);
   if ($result && mysqli_num_rows($result) == 1) {
      if ($contra1 != $contra2) {
         if ($contra2 == $contra3) {
            $sqll = "UPDATE usuarios SET contrasenia = '$contra2' WHERE correo = '$correo'";
            header('location: cambiarcontrasena.php?correo=' . $correo . '&estado=Contraseña cambiada con exito');
            mysqli_query($conexion, $sqll);
         } else {
            header('location: cambiarcontrasena.php?correo=' . $correo . '&estado=Las contraseñas no coinciden');
         }
      } else {
         header('location: cambiarcontrasena.php?correo=' . $correo . '&estado=La contraseña nueva no puede ser igual a la antigua');
      }
   } else {
      header('location: cambiarcontrasena.php?correo=' . $correo . '&estado=La contraseña actual es incorrecta');
   }
}

function olvidoContrasena($conexion)
{
   $correo = $_REQUEST['correo'];
   $contra2 = $_REQUEST['contrasenaN'];
   $contra3 = $_REQUEST['contrasenaNN'];
   $sql = "SELECT * from usuarios where correo='$correo'";
   $result = mysqli_query($conexion, $sql);
   if ($result && mysqli_num_rows($result) == 1) {
      if ($contra2 == $contra3) {
         $sqll = "UPDATE usuarios SET contrasenia = '$contra2' WHERE correo = '$correo'";
         header('location: asesor.php?correo=' . $correo);
         mysqli_query($conexion, $sqll);
      }
   } else {
   }
}



function conecta($conexion)
{
   $correo = $_REQUEST['correo'];
   $contrasena = $_REQUEST['contrasena'];

   $sql = "SELECT * from usuarios where correo='$correo' AND contrasenia='$contrasena'";
   $result = mysqli_query($conexion, $sql);

   if (mysqli_num_rows($result) == 1) {
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
   $correo = $_REQUEST['correo'];
   $nombre = $_REQUEST['nombre'];
   $primerApellido = $_REQUEST['paterno'];
   $segundoApellido = $_REQUEST['materno'];
   $noControl = $_REQUEST['noControl'];
   $contrasena = $_REQUEST['contrasena'];
   $contrasena2 = $_REQUEST['contrasena2'];
   $carrera = $_REQUEST['carrera'];
   if ($contrasena == $contrasena2) {
      if ($noControl == 'XXX00XXX') {
         $sql = "INSERT INTO usuarios(correo,nombre,primerApellido,segundoApellido,noControl,contrasenia,carrera,tipoUsuario) VALUES ('$correo','$nombre','$primerApellido','$segundoApellido','$noControl','$contrasena','$carrera','Departamento')";
         mysqli_query($conexion, $sql);
         mysqli_close($conexion);
         header('location: index.html');
      } else {
         $sql = "INSERT INTO usuarios(correo,nombre,primerApellido,segundoApellido,noControl,contrasenia,carrera,tipoUsuario) VALUES ('$correo','$nombre','$primerApellido','$segundoApellido','$noControl','$contrasena','$carrera','Asesor')";
         mysqli_query($conexion, $sql);
         mysqli_close($conexion);
         header('location: index.html');
      }
   } else {
      header('location: registrousuario.php?estado= Las contraseñas no coindiden');
   }
}
