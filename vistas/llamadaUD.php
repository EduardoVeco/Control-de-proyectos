<?php
include "../php/UsuarioDepartamento.php";
$folio1=$_REQUEST['folio1'];
$conclusion=$_REQUEST['conclusion'];
$correo=$_REQUEST['correo'];

actualizar($folio1,$conclusion,$correo);
function actualizar($folio1,$conclusion,$correo){
UsuarioDepartamento::autoriza($folio1,'APROBADO',$conclusion,$correo);
}
?>