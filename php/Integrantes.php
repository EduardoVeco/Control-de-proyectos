<?php

class Integrantes
{

    private $noControl;
    private $nombre;
    private $primerApellido;
    private $segundoApellido;
    private $noEquipo;

    /**
     * Integrantes constructor.
     * @param $noControl
     * @param $nombre
     * @param $primerApellido
     * @param $segundoApellido
     * @param $noEquipo
     */
    public function __construct($noControl, $nombre, $primerApellido, $segundoApellido, $noEquipo)
    {
        $this->noControl = $noControl;
        $this->nombre = $nombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->noEquipo = $noEquipo;
    }

    public function ingresarIntegrantes($noControl, $nombre, $primerApellido, $segundoApellido, $noEquipo)
    {
        $this->noControl = $noControl;
        $this->nombre = $nombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->noEquipo = $noEquipo;
    }

}

?>