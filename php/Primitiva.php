<?php

class Primitiva
{

    private $tituloPrimitivas;
    private $justificionPrimitivas;
    private $alcancesPrimitivas;
    private $resumenPrimitivas;

    /**
     * Primitiva constructor.
     * @param $tituloPrimitivas
     * @param $justificionPrimitivas
     * @param $alcancesPrimitivas
     * @param $resumenPrimitivas
     */
    public function __construct($tituloPrimitivas, $justificionPrimitivas, $alcancesPrimitivas, $resumenPrimitivas)
    {
        $this->tituloPrimitivas = $tituloPrimitivas;
        $this->justificionPrimitivas = $justificionPrimitivas;
        $this->alcancesPrimitivas = $alcancesPrimitivas;
        $this->resumenPrimitivas = $resumenPrimitivas;
    }

}

?>