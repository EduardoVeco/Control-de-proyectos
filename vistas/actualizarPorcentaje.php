<?php
print_r("perro");
$folio='';
$porcentaje=2;

actualiza($pocentaje,$folio);

function actualiza($pocentaje,$folio){
    $folio=$_REQUEST('folio');
    $porcentaje=$_REQUEST('porcentaje');

    Asesor::actualizarProyecto($folio,$pocentaje);
}

?>