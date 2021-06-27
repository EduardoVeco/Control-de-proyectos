<?php

class Proyecto
{

    private $folio;
    private $dueño;
    private $asesor;
    private $coasesor;
    private $titulo;
    private $justificacion;
    private $alcances;
    private $resumen;
    private $estatus;
    private $aprobacion;
    private $avance;

    /**
     * Proyecto constructor.
     * @param $folio
     * @param $dueño
     * @param $asesor
     * @param $coasesor
     * @param $titulo
     * @param $justificacion
     * @param $alcances
     * @param $resumen
     * @param $estatus
     * @param $aprobacion
     * @param $avance
     */
    public function __construct($folio, $dueño, $asesor, $coasesor, $titulo, $justificacion, $alcances, $resumen, $estatus, $aprobacion, $avance)
    {
        $this->folio = $folio;
        $this->dueño = $dueño;
        $this->asesor = $asesor;
        $this->coasesor = $coasesor;
        $this->titulo = $titulo;
        $this->justificacion = $justificacion;
        $this->alcances = $alcances;
        $this->resumen = $resumen;
        $this->estatus = $estatus;
        $this->aprobacion = $aprobacion;
        $this->avance = $avance;
    }

}

?>