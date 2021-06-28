<?php
include "../php/Asesor.php";
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

    public static function comparar($justificacion, $alcances, $resumen,$titulo,$tituloOri,$justificacionOri,$alcancesOri,$resumenOri)
    {
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
        $consulta = mysqli_query($con, "select * from primitivas");


        if (mysqli_num_rows($consulta) != 0) {

            $contTit = 0;
            $contTitSel=0;
            $contJus = 0;
            $contJusSel=0;
            $contAlc = 0;
            $contAlcSel=0;
            $contRes = 0;
            $contResSel=0;
            $contPrimComun=0;
            $porcentaje = 0;
            $porcentajeAux = 0;
            $porcenTit=0;
            $porcenJus=0;
            $porcenAlc=0;
            $porcenRes=0;
            $porcenOri=0;
            $porcenPrim=0;
            $id=0;
            $filasPrim=mysqli_num_rows($consulta);

            for ($i=1;$i<=$filasPrim;$i++){
                $consulta1 = mysqli_query($con,"select tituloPrimitivas from primitivas WHERE id = $i ");
                $mostrar= mysqli_fetch_array($consulta1);
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
                for ($j=0;$j<$contTit;$j++){
                    for ($k=0;$k<$contTitSel;$k++){
                        if ($titulo[$j]==$aT[$k]){
                            $contPrimComun= $contPrimComun+1;
                            $k=$contTitSel;
                        }
                    }
                }
                $porcenOri=($contPrimComun/$contTit)*100;
                $porcenPrim=($contPrimComun/$contTitSel)*100;
                $porcenTit=($porcenOri+$porcenPrim)/2;

                $contPrimComun=0;

                $consulta2 = mysqli_query($con,"select justificacionPrimitivas from primitivas WHERE id = $i ");
                $mostrar1= mysqli_fetch_array($consulta2);
                $token4 = strtok($mostrar1['justificacionPrimitivas'], " ");
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
                for ($j=0;$j<$contJus;$j++){
                    for ($k=0;$k<$contJusSel;$k++){
                        if ($justificacion[$j]==$aT1[$k]){
                            $contPrimComun = $contPrimComun + 1;
                            $k=$contJusSel;
                        }
                    }
                }
                $porcenOri=($contPrimComun/$contJus)*100;
                $porcenPrim=($contPrimComun/$contJusSel)*100;
                $porcenJus=($porcenOri+$porcenPrim)/2;

                $contPrimComun=0;

                $consulta3 = mysqli_query($con,"select alcancesPrimitivas from primitivas WHERE id = $i ");
                $mostrar2= mysqli_fetch_array($consulta3);
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
                for ($j=0;$j<$contAlc;$j++){
                    for ($k=0;$k<$contAlcSel;$k++){
                        if ($alcances[$j]==$aT2[$k]){
                            $contPrimComun = $contPrimComun + 1;
                            $k=$contAlcSel;
                        }
                    }
                }
                $porcenOri=($contPrimComun/$contAlc)*100;
                $porcenPrim=($contPrimComun/$contAlcSel)*100;
                $porcenAlc=($porcenOri+$porcenPrim)/2;

                $contPrimComun=0;

                $consulta4 = mysqli_query($con,"select resumenPrimitivas from primitivas WHERE id = $i ");
                $mostrar3= mysqli_fetch_array($consulta4);
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
                for ($j=0;$j<$contRes;$j++){
                    for ($k=0;$k<$contResSel;$k++){
                        if ($resumen[$j]==$aT3[$k]){
                            $contPrimComun = $contPrimComun + 1;
                            $k=$contResSel;
                        }
                    }
                }
                $porcenOri=($contPrimComun/$contRes)*100;
                $porcenPrim=($contPrimComun/$contResSel)*100;
                $porcenRes=($porcenOri+$porcenPrim)/2;


                $porcentajeAux=($porcenTit+$porcenJus+$porcenAlc+$porcenRes)/4;
                if ($porcentajeAux>$porcentaje){
                    $porcentaje = $porcentajeAux;
                }
                //print_r($porcenTit);
                //print_r($porcenJus);
                //print_r($porcenAlc);
                //print_r($porcenRes);
                //print_r($porcentaje);

                if ($porcentaje<=50){
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
                    header('location: registrodueno.php?primjust='.$str.'primtit='.$str3.'primalc='.$str1.'primres='.$str2.'justificaion='.$justificacionOri.'titulo='.$tituloOri.'alcances='.$alcancesOri.'resumen='.$resumenOri);
                } else if ($porcentaje<=60) {

                } else {
                    
                }

            }


        } else {
     
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

            $consulta = mysqli_query($con, "INSERT INTO primitivas (id,noFolio,tituloPrimitivas,justificacionPrimitivas,alcancesPrimitivas,resumenPrimitivas)VALUES  (null ,'A2306202101','$str3','$str','$str1','$str2')");

            print_r($consulta);
            mysqli_close($con);
            //header('location: registrodueno.php?primjust='.$str.'primtit='.$str3.'primalc='.$str1.'primres='.$str2.'justificaion='.$justificacionOri.'titulo='.$tituloOri.'alcances='.$alcancesOri.'resumen='.$resumenOri);

        };
    }

    public function notifica($folio, $correo)
    {
    }

    public function autoriza($folio, $aprobacion)
    {
    }
}
