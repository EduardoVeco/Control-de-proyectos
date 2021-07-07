<?php
$con = mysqli_connect('localhost', 'root', '', 'controlproyectos') or die(mysqli_error($mysqli));
$folio = $_REQUEST['folio'];
print_r($folio);
borrar($folio, $con);
function borrar($folio, $con)
{
    $consulta = mysqli_query($con, "SELECT h.noEquipo as equipo from  historicos as h, equipos as e
                 where h.noFolio='$folio' 
                 AND e.noEquipo=h.noEquipo
                 AND e.fecha_final IS NULL");
    $result = mysqli_fetch_array($consulta);
    $resultado = $result['equipo'];
    $consulta1 = mysqli_query($con, "UPDATE equipos set fecha_final=now() where noEquipo='$resultado'");
    $consulta2 = mysqli_query($con, "UPDATE proyectos set estatus='INACTIVO' where noFolio='$folio'");
    $consulta3 = mysqli_query($con, "SELECT correo from proyectos where noFolio='$folio'");
    $mostrar = mysqli_fetch_array($consulta3);
    $correo = $mostrar['correo'];
    header('location: proyecto.php?folio=' . $folio . '&correo=' . $correo);
}
