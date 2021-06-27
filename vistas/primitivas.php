<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
include 'stemm_es.php';
include '../php/funcionesdelsistema.php';
$string = $_POST['resumen'];
$string2 = $_POST['alcances'];
$string1 = $_POST['justificacion'];

$string3 = $_POST['titulo'];
hacerPrimitivas($string1,$string2,$string,$string3);

function hacerprimitivas($string1,$string2,$string,$string3)
{
    $alcances = array();
    $resumen = array();
    $justificacion = array();
    $titulo = array();
//titulo
$token3 = strtok($string3, " ,.:;");
$aT = array();
while ($token3 !== false) {
array_push($aT, $token3);
$token3 = strtok(" ,.:;");
}
foreach ($aT as &$value3)
$value3 = strtolower($value3);
$aT = array_diff($aT, array('en', 'el', 'la', 'se', 'y', 'o', 'de', 'del', 'para', 'con'));
foreach ($aT as &$value3) {
$result = stemm_es::stemm($value3);
array_push($titulo,$result);
}


//resumen
$token = strtok($string, " ,.:;");
$aR = array();
while ($token !== false) {
array_push($aR, $token);
$token = strtok(" ,.:;");
}
foreach ($aR as &$value)
$value = strtolower($value);
$aR = array_diff($aR, array('en', 'el', 'la', 'se', 'y', 'o', 'de', 'del', 'para', 'con'));
foreach ($aR as &$value) {
$result = stemm_es::stemm($value);
array_push($resumen,$result);
}

//justificacion
$token1 = strtok($string1, " ,.:;");
    $aJ = array();
        while ($token1 !== false) {
    array_push($aJ, $token1);
    $token1 = strtok(" ,.:;");
    }
    foreach ($aJ as &$value1)
    $value1 = strtolower($value1);
    $aJ = array_diff($aJ, array('en', 'el', 'la', 'se', 'y', 'o', 'de', 'del', 'para', 'con'));
    foreach ($aJ as &$value1) {
    $result1 = stemm_es::stemm($value1);
    array_push($justificacion,$result1);
    }

//Alcances
$token2 = strtok($string2, " ,.:;");
    $aA = array();
    while ($token2 !== false) {
    array_push($aA, $token2);
    $token2 = strtok(" ,.:;");
    }
    foreach ($aA as &$value2)
    $value2 = strtolower($value2);
    $aA = array_diff($aA, array('en', 'el', 'la', 'se', 'y', 'o', 'de', 'del', 'para', 'con'));
    foreach ($aA as &$value2) {
    $result2 = stemm_es::stemm($value2);
    array_push($alcances,$result2);
    }

    funcionesdelsistema::comparar($justificacion,$alcances,$resumen,$titulo);
}






function hacerJustificacion($string1){
    
  
    }

    
function hacerAlcances($string2){
    
    }
   
?>
</body>
</html>

