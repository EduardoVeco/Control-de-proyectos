<?php
include "../vistas/conexion.php";
class Usuario{

    private $nombre;
    private $primerApellido;
    private $segundoApellido;
    private $noControl;
    private $correo;
    private $contraseña;
    private $carrera;
    private $tipoUsuario;
    private $tiempoInactividad;


    public function registroUsuario($nombre,$primerApellido,$segundoApellido,$noControl,$correo,$contrasena,$carrera,$tipoUsuario){
        print_r('por aca');
        //$con=conectarBase();
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
        $correo = $_REQUEST['correo'];
        $nombre = $_REQUEST['nombre'];
        $primerApellido = $_REQUEST['paterno'];
        $segundoApellido = $_REQUEST['materno'];
        $noControl = $_REQUEST['noControl'];
        $contrasena = $_REQUEST['contrasena'];
        $contrasena2 = $_REQUEST['contrasena2'];
        $carrera = $_REQUEST['carrera'];
        $tipoUsuario = 'Asesor';
     if($contrasena==$contrasena2){
        $sql = "INSERT INTO usuarios(correo,nombre,primerApellido,segundoApellido,noControl,contrasenia,carrera,tipoUsuario) VALUES ('$correo','$nombre','$primerApellido','$segundoApellido','$noControl','$contrasena','$carrera','$tipoUsuario')";
        mysqli_query($con, $sql);
        mysqli_close($con);
        header('location: registrousuario.html');
     }
     else{
     
        echo "<p> esta mal la contraseña</p>";
     }
    }

    public static function inicioSesion($username,$password){
        $conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
           
       //     $conexion=conectarBase();
            $sql = "SELECT * from usuarios where correo='$username' AND contrasenia='$password'";
            $result = mysqli_query($conexion, $sql);
            print_r($result);
      
            if (mysqli_num_rows($result) == 1) {
               $mostrar = mysqli_fetch_array($result);
               session_start();
               $_SESSION['correo'] = $mostrar['correo'];
               $_SESSION['time'] = time();
      
               if ($mostrar['tipoUsuario'] == 'Asesor') {
                  header('location: asesor.php?correo=' . $username);
               } else {
                  header('location: dptoinvestigacion.php?correo=' . $username);
               }
               //echo "<script>window.location='proyecto.php'</script>";
            } else {
               header('location: index1.php?correo=' . $username . '&contrasena=' . $password . '&error=' . true);
               //   echo "<script>window.location='index1.php'</script>";
            }
         
    }

    public function cambiarContraseña($antiguaContraseña,$nuevaContraseña){
        if ($antiguaContraseña != null){

        } else {

        }
    }

    public function cerrarSesion(){

    }



    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    /**
     * @param mixed $primerApellido
     */
    public function setPrimerApellido($primerApellido): void
    {
        $this->primerApellido = $primerApellido;
    }

    /**
     * @return mixed
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * @param mixed $segundoApellido
     */
    public function setSegundoApellido($segundoApellido): void
    {
        $this->segundoApellido = $segundoApellido;
    }

    /**
     * @return mixed
     */
    public function getNoControl()
    {
        return $this->noControl;
    }

    /**
     * @param mixed $noControl
     */
    public function setNoControl($noControl): void
    {
        $this->noControl = $noControl;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * @param mixed $contraseña
     */
    public function setContraseña($contraseña): void
    {
        $this->contraseña = $contraseña;
    }

    /**
     * @return mixed
     */
    public function getCarrera()
    {
        return $this->carrera;
    }

    /**
     * @param mixed $carrera
     */
    public function setCarrera($carrera): void
    {
        $this->carrera = $carrera;
    }

    /**
     * @return mixed
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    /**
     * @param mixed $tipoUsuario
     */
    public function setTipoUsuario($tipoUsuario): void
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    /**
     * @return mixed
     */
    public function getTiempoInactividad()
    {
        return $this->tiempoInactividad;
    }

    /**
     * @param mixed $tiempoInactividad
     */
    public function setTiempoInactividad($tiempoInactividad): void
    {
        $this->tiempoInactividad = $tiempoInactividad;
    }


}

?>
