<?php
include "../php/UsuarioDepartamento.php";
$folio1=$_REQUEST['folio1'];
$conclusion=$_REQUEST['conclusion'];
$correo=$_REQUEST['correo'];
$elemento=$_REQUEST['elemento'];
$cantidad = $_REQUEST['cantidad'];
$folio2 = $_REQUEST['folio2'];
//print_r($elemento);
actualizar($folio1,$conclusion,$correo,$elemento,$folio2,$cantidad);
function actualizar($folio1,$conclusion,$correo,$elemento,$folio2,$cantidad){
    if($elemento=='si'){
UsuarioDepartamento::autoriza($folio1,'APROBADO',$conclusion,$correo,$folio2,$cantidad);
    }
    else if($elemento=='no'){
UsuarioDepartamento::autoriza($folio1,'NO APROBADO',$conclusion,$correo,$folio2,$cantidad);
    }
}
?>