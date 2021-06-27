<?php

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

    public function restablecerContraseña()
    {
    }

    public function incrementarTiempo()
    {
    }

    public static function comparar($justificacion, $alcances, $resumen,$titulo,$tituloOri,$justificacionOri,$alcancesOri,$resumenOri)
    {
        $con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
        $consulta = mysqli_query($con, "select * from primitivas");

        if (mysqli_num_rows($consulta) != 0) {
            while ($row = mysqli_fetch_array($consulta)) {
             //   echo $row["registro"];
              print_r('que tranza');
            };
            
            if (porcentaje>=0&&$porcentaje<=60){
             header('location: registrodueno.php?primjust='.$str.'primtit='.$str3.'primalc='.$str1.'primres='.$str2.'justificaion='.$justificacionOri.'titulo='.$tituloOri.'alcances='.$alcancesOri.'resumen='.$resumenOri);
            } else {

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

           
            
            $consulta = mysqli_query($con, "INSERT INTO primitivas (noFolio,tituloPrimitivas,justificacionPrimitivas,alcancesPrimitivas,resumenPrimitivas)VALUES  ('A2306202101','$str3','$str','$str1','$str2')");
            print_r($consulta);
            mysqli_close($con);
        };
    }

    public function notifica($folio, $correo)
    {
    }

    public function autoriza($folio, $aprobacion)
    {
    }
}
