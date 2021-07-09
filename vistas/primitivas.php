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
    $correo = $_POST['correo'];
    $string3 = $_POST['titulo'];
    hacerPrimitivas($string1, $string2, $string, $string3, $correo);

    function hacerprimitivas($string1, $string2, $string, $string3, $correo)
    {
        $nexos = array('además', 'menos', 'a', 'la', 'par', 'al', 'mismo', 'aparte', 'propósito', 'asimismo', 'su', 'vez', 'todo', 'esto', 'cabe', 'de', 'igual', 'forma', 'manera', 'modo', 'misma', 'del', 'en', 'cuanto', 'es', 'igualmente', 'inclusive', 'incluso', 'aún', 'ni', 'siquiera', 'paralelamente', 'remate', 'para', 'colmo', 'por', 'añadidura', 'cierto', 'lo', 'demás', 'otra', 'parte', 'otro', 'lado', 'si', 'fuera', 'poco', 'puede', 'agregarse', 'también', 'tampoco', 'todavía', 'más', 'y', 'excepción', 'con', 'salvedad', 'excepto', 'salvo', 'aclarar', 'que', 'quiero', 'decir', 'conviene', 'precisar', 'dicho', 'otras', 'palabras', 'otros', 'términos', 'bueno', 'anterior', 'no', 'quiere', 'significa', 'o', 'sea', 'mejor', 'vale', 'u', 'bien', 'ya', 'pesar', 'así', 'aun', 'cuando', 'aunque', 'cualquier', 'todas', 'todos', 'formas', 'maneras', 'modos', 'caso', 'obstante', 'pese', 'sin', 'embargo', 'ahora', 'contrario', 'antes', 'contrariamente', 'desde', 'punto', 'vista', 'empero', 'cambio', 'contraposición', 'contraste', 'oposición', 'inversamente', 'mientras', 'muy', 'el', 'pero', 'pues', 'sino', 'obstar', 'solo', 'se');
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
        $aT = array_diff($aT, $nexos);
        foreach ($aT as &$value3) {
            $result = stemm_es::stemm($value3);
            array_push($titulo, $result);
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
        $aR = array_diff($aR, $nexos);
        foreach ($aR as &$value) {
            $result = stemm_es::stemm($value);
            array_push($resumen, $result);
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
        $aJ = array_diff($aJ, $nexos);
        foreach ($aJ as &$value1) {
            $result1 = stemm_es::stemm($value1);
            array_push($justificacion, $result1);
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
        $aA = array_diff($aA, $nexos);
        foreach ($aA as &$value2) {
            $result2 = stemm_es::stemm($value2);
            array_push($alcances, $result2);
        }

        funcionesdelsistema::comparar($justificacion, $alcances, $resumen, $titulo, $string3, $string1, $string2, $string, $correo);
    }






    function hacerJustificacion($string1)
    {
    }


    function hacerAlcances($string2)
    {
    }

    ?>
</body>

</html>