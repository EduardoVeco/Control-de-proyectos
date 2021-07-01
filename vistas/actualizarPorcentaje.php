<?php
include "../php/Asesor.php";


actualizar();
function   actualizar(){
    $folio=$_REQUEST['folio'];
    $porcentaje=$_REQUEST['porcentaje'];
    Asesor::actualizarProyecto($folio,$porcentaje);
}

?>