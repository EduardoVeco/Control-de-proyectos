<?php

class Equipo
{

    private $noEquipo;
    private $proposito;

    /**
     * Equipo constructor.
     * @param $noEquipo
     * @param $proposito
     */
    public function __construct($noEquipo, $proposito)
    {
        $this->noEquipo = $noEquipo;
        $this->proposito = $proposito;
    }


}

?>