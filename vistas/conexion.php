<?php

$con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
conecta($con);
print_r('sdfsdfs');

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
