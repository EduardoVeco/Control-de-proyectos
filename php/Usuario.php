<?php

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

    /**
     * Usuario constructor.
     * @param $nombre
     * @param $primerApellido
     * @param $segundoApellido
     * @param $noControl
     * @param $correo
     * @param $contraseña
     * @param $carrera
     * @param $tipoUsuario
     * @param $tiempoInactividad
     */
    public function __construct($nombre, $primerApellido, $segundoApellido, $noControl, $correo, $contraseña, $carrera, $tipoUsuario, $tiempoInactividad)
    {
        $this->nombre = $nombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->noControl = $noControl;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
        $this->carrera = $carrera;
        $this->tipoUsuario = $tipoUsuario;
        $this->tiempoInactividad = $tiempoInactividad;
    }


    public function registroUsuario($nombre,$primerApellido,$segundoApellido,$noControl,$correo,$contraseña,$carrera,$tipoUsuario,$tiempoInactividad){
        $this->nombre = $nombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->noControl = $noControl;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
        $this->carrera =  $carrera;
        $this->tipoUsuario = $tipoUsuario;
        $this->tiempoInactividad = $tiempoInactividad;
    }

    public function inicioSesion($correo,$contraseña){

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
