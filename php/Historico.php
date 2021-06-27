<?php

class Historico
{

    private $folioPRoyecto;
    private $noEquipo;
    private $proposito;
    private $fechaInicial;
    private $fechaFinal;

    /**
     * Historico constructor.
     * @param $folioPRoyecto
     * @param $noEquipo
     * @param $proposito
     * @param $fechaInicial
     * @param $fechaFinal
     */
    public function __construct($folioPRoyecto, $noEquipo, $proposito, $fechaInicial, $fechaFinal)
    {
        $this->folioPRoyecto = $folioPRoyecto;
        $this->noEquipo = $noEquipo;
        $this->proposito = $proposito;
        $this->fechaInicial = $fechaInicial;
        $this->fechaFinal = $fechaFinal;
    }


}

?>