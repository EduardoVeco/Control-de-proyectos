<?php
//include "../php/Asesor.php";
class FuncionesDelSistema
{

    public $usuariosActivos = array();

    public function recordatorio()
    {
    }

    public function cerrarSesion()
    {
    }

    public function validarUsuario()
    {
    }

    public static function restablecerContrasena($con, $conN)
    {
        if ($con == $conN)
            echo $con;
    }

    public function incrementarTiempo()
    {
    }

    public static function comparar($justificacion, $alcances, $resumen, $titulo, $tituloOri, $justificacionOri, $alcancesOri, $resumenOri, $correo)
    {

        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
        $consulta = mysqli_query($con, "SELECT * from primitivas as pr, proyectos as p 
                                        WHERE  pr.noFolio=p.noFolio
                                        AND p.aprobacion='APROBADO'");


        if (mysqli_num_rows($consulta) != 0) {

            $contTit = 0;
            $contTitSel = 0;
            $contJus = 0;
            $contJusSel = 0;
            $contAlc = 0;
            $contAlcSel = 0;
            $contRes = 0;
            $contResSel = 0;
            $contPrimComun = 0;
            $porcentaje = 0;
            $porcentajeAux = 0;
            $porcenTit = 0;
            $porcenJus = 0;
            $porcenAlc = 0;
            $porcenRes = 0;
            $porcenOri = 0;
            $porcenPrim = 0;
            $tempFolio = 0;
            $id = 1;
            $filasPrim = mysqli_num_rows($consulta);
            $simMaxima = 0;
            for ($i = 1; $i <= $filasPrim; $i++) {
                $mostrar = '';
                $consulta1 = mysqli_query($con, "SELECT pr.tituloPrimitivas from primitivas as pr, proyectos as p   
                                                WHERE p.noFolio=pr.noFolio
                                                AND p.aprobacion='APROBADO'");
                $mostrar = mysqli_fetch_array($consulta1);
                $jus2 = '';
                $jus3 = '';
                $token3 = '';
                $contTit = 0;
                $contTitSel = 0;
                $token3 = strtok($mostrar['tituloPrimitivas'], " ");
                $aT = array();
                while ($token3 !== false) {
                    array_push($aT, $token3);
                    $token3 = strtok(" ");
                }
                foreach ($titulo as $jus2) {
                    $contTit = $contTit + 1;
                }
                foreach ($aT as $jus3) {
                    $contTitSel = $contTitSel + 1;
                }
                for ($j = 0; $j < $contTit; $j++) {
                    for ($k = 0; $k < $contTitSel; $k++) {
                        if ($titulo[$j] == $aT[$k]) {
                            $contPrimComun = $contPrimComun + 1;
                            $k = $contTitSel;
                        }
                    }
                }

                $porcenOri = ($contPrimComun / $contTit) * 100;
                if ($contTitSel != 0) {
                    $porcenPrim = ($contPrimComun / $contTitSel) * 100;
                    $porcenTit = ($porcenOri + $porcenPrim) / 2;
                } else {
                    $porcenPrim = ($contPrimComun / 0.01) * 100;
                    $porcenTit = ($porcenOri + $porcenPrim) / 2;
                }



                $contPrimComun = 0;
                $mostrar1 = '';
                $token4 = '';
                $consulta2 = mysqli_query($con, "SELECT pr.justificacionPrimitivas from primitivas as pr, proyectos as p 
                                                 WHERE  pr.noFolio=p.noFolio
                                                 AND p.aprobacion='APROBADO'");
                $mostrar1 = mysqli_fetch_array($consulta2);
                $token4 = strtok($mostrar1['justificacionPrimitivas'], " ");
                $jus4 = '';
                $jus5 = '';
                $contJus = 0;
                $contJusSel = 0;
                $aT1 = array();
                while ($token4 !== false) {
                    array_push($aT1, $token4);
                    $token4 = strtok(" ");
                }
                foreach ($justificacion as $jus4) {
                    $contJus = $contJus + 1;
                }
                foreach ($aT1 as $jus5) {
                    $contJusSel = $contJusSel + 1;
                }
                for ($l = 0; $l < $contJus; $l++) {
                    for ($m = 0; $m < $contJusSel; $m++) {
                        if ($justificacion[$l] == $aT1[$m]) {
                            $contPrimComun = $contPrimComun + 1;
                            $m = $contJusSel;
                        }
                    }
                }
                $porcenOri = ($contPrimComun / $contJus) * 100;
                if ($contJusSel != 0) {
                } else {
                    $contJusSel = 0.01;
                }
                $porcenPrim = ($contPrimComun / $contJusSel) * 100;
                $porcenJus = ($porcenOri + $porcenPrim) / 2;

                $contPrimComun = 0;
                $mostrar2 = '';
                $token5 = '';
                $jus6 = '';
                $jus7 = '';
                $contAlc = 0;
                $contAlcSel = 0;
                $consulta3 = mysqli_query($con, "SELECT pr.alcancesPrimitivas from primitivas as pr, proyectos as p 
                                                WHERE  pr.noFolio=p.noFolio
                                                AND p.aprobacion='APROBADO'");
                $mostrar2 = mysqli_fetch_array($consulta3);
                $token5 = strtok($mostrar2['alcancesPrimitivas'], " ");
                $aT2 = array();
                while ($token5 !== false) {
                    array_push($aT2, $token5);
                    $token5 = strtok(" ");
                }
                foreach ($alcances as $jus6) {
                    $contAlc = $contAlc + 1;
                }
                foreach ($aT2 as $jus7) {
                    $contAlcSel = $contAlcSel + 1;
                }
                for ($j = 0; $j < $contAlc; $j++) {
                    for ($k = 0; $k < $contAlcSel; $k++) {
                        if ($alcances[$j] == $aT2[$k]) {
                            $contPrimComun = $contPrimComun + 1;
                            $k = $contAlcSel;
                        }
                    }
                }
                if ($contAlcSel != 0) {
                } else {
                    $contAlcSel = 0.01;
                }
                $porcenOri = ($contPrimComun / $contAlc) * 100;
                $porcenPrim = ($contPrimComun / $contAlcSel) * 100;
                $porcenAlc = ($porcenOri + $porcenPrim) / 2;

                $contPrimComun = 0;
                $mostrar3 = '';
                $token6 = '';
                $jus8 = '';
                $jus9 = '';
                $contRes = 0;
                $contResSel = 0;

                $consulta4 = mysqli_query($con, "SELECT pr.resumenPrimitivas from primitivas as pr, proyectos as p 
                                                 WHERE  pr.noFolio=p.noFolio
                                                 AND p.aprobacion='APROBADO'");
                $mostrar3 = mysqli_fetch_array($consulta4);
                $token6 = strtok($mostrar3['resumenPrimitivas'], " ");
                $aT3 = array();
                while ($token6 !== false) {
                    array_push($aT3, $token6);
                    $token6 = strtok(" ");
                }
                foreach ($resumen as $jus8) {
                    $contRes = $contRes + 1;
                }
                foreach ($aT3 as $jus9) {
                    $contResSel = $contResSel + 1;
                }
                for ($j = 0; $j < $contRes; $j++) {
                    for ($k = 0; $k < $contResSel; $k++) {
                        if ($resumen[$j] == $aT3[$k]) {
                            $contPrimComun = $contPrimComun + 1;
                            $k = $contResSel;
                        }
                    }
                }
                if ($contResSel != 0) {
                } else {
                    $contResSel = 0.01;
                }
                $porcenOri = ($contPrimComun / $contRes) * 100;
                $porcenPrim = ($contPrimComun / $contResSel) * 100;
                $porcenRes = ($porcenOri + $porcenPrim) / 2;


                $porcentajeAux = ($porcenTit + $porcenJus + $porcenAlc + $porcenRes) / 4;
                if ($porcentajeAux > $porcentaje) {
                    $porcentaje = $porcentajeAux;
                }


                print_r($porcentajeAux);
                if ($porcentajeAux > $simMaxima) {
                    $consulta5 = mysqli_query($con, "select p.aprobacion 
                                                     from primitivas as pr,proyectos as p 
                                                     WHERE pr.id = $i 
                                                     AND p.noFolio=pr.noFolio");
                    $mostrar4 = mysqli_fetch_array($consulta5);
                    if ($mostrar4['resumenPrimitivas'] == 'REVISION') {
                    } else {
                        $simMaxima = $porcentajeAux;
                        $tempFolio = $i;
                    }
                }
            }
            if ($porcentaje <= 50) {
                $str = '';
                $str1 = '';
                $str2 = '';
                $str3 = '';
                foreach ($justificacion as $jus) {
                    $str = $str . ' ' . $jus;
                }
                foreach ($titulo as $jus2) {
                    $str3 = $str3 . ' ' . $jus2;
                }
                foreach ($alcances as $jus1) {
                    $str1 = $str1 . ' ' . $jus1;
                }
                foreach ($resumen as $jus3) {
                    $str2 = $str2 . ' ' . $jus3;
                }
                $folio = 'A';
                $tempFolio = '0';
                header('location: registrodueno.php?primjust=' . $str . '&primtit=' . $str3 . '&primalc=' . $str1 . '&primres=' . $str2 . '&justificacion=' . $justificacionOri . '&titulo=' . $tituloOri . '&alcances=' . $alcancesOri . '&resumen=' . $resumenOri . '&correo=' . $correo . '&folio=' . $folio . '&tempFolio=' . $tempFolio);
            } else if ($porcentaje > 50 && $porcentaje <= 90) {
                $str = '';
                $str1 = '';
                $str2 = '';
                $str3 = '';
                foreach ($justificacion as $jus) {
                    $str = $str . ' ' . $jus;
                }
                foreach ($titulo as $jus2) {
                    $str3 = $str3 . ' ' . $jus2;
                }
                foreach ($alcances as $jus1) {
                    $str1 = $str1 . ' ' . $jus1;
                }
                foreach ($resumen as $jus3) {
                    $str2 = $str2 . ' ' . $jus3;
                }
                $folio = 'R';

                for ($i = 1; $i <= mysqli_num_rows($consulta); $i++) {
                    $consulta1 = mysqli_query($con, "SELECT noFolio FROM primitivas WHERE id='$i'");
                    if ($tempFolio == $i) {
                        $mostrar4 = mysqli_fetch_array($consulta1);
                        $resultado = $mostrar4['noFolio'];
                        $i = mysqli_num_rows($consulta) + 1;
                    }
                }
                header('location: registrodueno.php?primjust=' . $str . '&primtit=' . $str3 . '&primalc=' . $str1 . '&primres=' . $str2 . '&justificacion=' . $justificacionOri . '&titulo=' . $tituloOri . '&alcances=' . $alcancesOri . '&resumen=' . $resumenOri . '&correo=' . $correo . '&folio=' . $folio . '&tempFolio=' . $resultado);
            } else if ($porcentaje > 90) {
                print_r('Tu pryotecto sobre pasa el maximo de similitud');
                header('location: denegar.php?correo=' . $correo);
            }
        } else {
            $folio = 'A';
            $tempFolio = 0;
            $str = '';
            $str1 = '';
            $str2 = '';
            $str3 = '';
            foreach ($justificacion as $jus) {
                $str = $str . ' ' . $jus;
            }
            foreach ($titulo as $jus2) {
                $str3 = $str3 . ' ' . $jus2;
            }
            foreach ($alcances as $jus1) {
                $str1 = $str1 . ' ' . $jus1;
            }
            foreach ($resumen as $jus3) {
                $str2 = $str2 . ' ' . $jus3;
            }

            print_r($str);
            print_r($str1);
            print_r($str2);
            print_r($str3);
            print_r($justificacionOri);
            print_r($tituloOri);
            print_r($alcancesOri);
            print_r($resumenOri);
            print_r($correo);
            print_r($folio);
            print_r($tempFolio);



            header('location: registrodueno.php?primjust=' . $str . '&primtit=' . $str3 . '&primalc=' . $str1 . '&primres=' . $str2 . '&justificacion=' . $justificacionOri .
                '&titulo=' . $tituloOri . '&alcances=' . $alcancesOri . '&resumen=' .
                $resumenOri . '&correo=' .
                $correo . '&folio=' .
                $folio .
                '&tempFolio=' . 0);
        };
    }

    public function notifica($folio, $correo)
    {
    }

    public function autoriza($folio, $aprobacion)
    {
    }
}
