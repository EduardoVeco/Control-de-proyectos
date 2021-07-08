<?php
include "../php/UsuarioDepartamento.php";
$folio1=$_REQUEST['folio1'];
$conclusion=$_REQUEST['conclusion'];
$correo=$_REQUEST['correo'];
$elemento=$_REQUEST['elemento'];
//print_r($elemento);
actualizar($folio1,$conclusion,$correo,$elemento);
function actualizar($folio1,$conclusion,$correo,$elemento){
    if($elemento=='si'){
UsuarioDepartamento::autoriza($folio1,'APROBADO',$conclusion,$correo);
    }
    else if($elemento=='no'){
UsuarioDepartamento::autoriza($folio1,'NO APROBADO',$conclusion,$correo);
    }
}
?>