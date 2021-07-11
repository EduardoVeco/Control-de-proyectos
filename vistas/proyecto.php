<?php
$folio = $_REQUEST['folio'];
$correo = $_REQUEST['correo'];
$conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');


$sql = "SELECT directorio
        FROM proyectos
        WHERE nofolio='$folio'";
$result = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($result))
{
    $directorio = $mostrar['directorio'];
}

//$directorio = '../documentos/A2306202101/';

if (is_dir($directorio))
{
    $arrayArchivos = scandir($directorio);
    if (count($arrayArchivos) > 2)
    {
        $fecha = array();
        $direccion = array();
        for ($i = 2; $i < count($arrayArchivos); $i++)
        {
            $nombreAux = $arrayArchivos[$i];
            $path = $directorio . $nombreAux;
            $nombre_archivo = $path;
            $direccion[$i - 2] = $path;
            if (file_exists($nombre_archivo))
            {
                $fecha[$i - 2] = date("d-m-Y ", filectime($nombre_archivo));
            }
            $extension[$i - 2] = pathinfo($path, PATHINFO_EXTENSION);
            $ex = explode(" .", $nombreAux);
            $nombre[$i - 2] = $ex[0];
        }
    } else
    {
        $fecha = array();
        $direccion = array();
        $nombre = array();
        $extension = array();
    }
} else
{
    $fecha = array();
    $direccion = array();
    $nombre = array();
    $extension = array();
}


session_start();
if (!isset($_SESSION['correo']))
{
    header('location:index.php');
} else
{
    if ((time() - $_SESSION['time']) > 930)
    {
        header('location: logout.php');
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Proyecto</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/contenedores.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="stylesheet" href="../css/textos.css">
    <link rel="stylesheet" href="../css/botones.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../js/Chart.min.js" type="text/javascript"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- DATATABLES -->
    <!--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <script>
        var f = '<?php echo json_encode($folio); ?>';
        var correo = '<?php echo json_encode($correo); ?>';
    </script>
</head>

<body class="body">
    <?php
    require 'conexion.php';
    $query = $conexion->query("SELECT * FROM `usuarios` WHERE `correo` = '$_SESSION[correo]'");
    $fetch = $query->fetch_array();
    $_SESSION['time'] = time();
    ?>
    <div class="container">
        <div class="row">
            <div class="borde col-sm-13 width:100%">
                <img src="../imagenes/header.png" class="div div-cabecera col">
            </div>
        </div>
    </div>

    <div class="container">
        <nav class="navbar navbar-light navbar-expand-sm border col-sm-12" style="background-color: #ffffff; border-radius: 7px;">

            <a class="navbar-brand" href="asesor.php?correo=<?php echo $correo ?>" style="font-size: 20px;">Control de proyectos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <ul class="navbar-nav text-left">
                    <li class="nav-item"><a class="nav-link " href="registroproyecto.php?correo=<?php echo $correo ?>">Registrar proyecto</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cuenta
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="cambiarcontrasena.php?correo=<?php echo $correo ?>&estado=0">Cambiar contraseña</a>
                            <a class="dropdown-item" href="index.html">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <br>

    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1 col-sm-13" style="margin: 0 auto;">
            <div class="formulario col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                <div>
                    <div class="div div-cabeza mx-sm-12">
                        <p class="ti ti-texto ">Detalles del proyecto </p>
                    </div>

                </div>
                <div class="div div-cuerpo form-group mx-sm-12">
                    <div class="row">
                        <div class="col-5" style="padding-top: 15px; margin: auto 0;">
                            <canvas id="pieChart"></canvas>
                        </div>
                        <div class="col-7">
                            <form action="">

                                <?php

                                $sql = "SELECT estatus,aprobacion
                                        FROM proyectos
                                        WHERE noFolio='$folio'";
                                $result = mysqli_query($conexion, $sql);
                                $mostrar = mysqli_fetch_array($result);
                                if (($mostrar['estatus'] == 'INACTIVO' || $mostrar['estatus'] == 'COMPLETADO') || ($mostrar['aprobacion'] == 'REVISION' || $mostrar['aprobacion'] == 'NO APROBADO'))
                                {
                                    $sql = "SELECT p.titulo,p.nofolio,p.estatus,aprobacion,CONCAT(u.nombre,' ', u.primerApellido,' ',u.segundoApellido ) as asesor,p.duenio,DATE_FORMAT(p.fecha_registro, '%d-%m-%Y') as fecha
                                    FROM proyectos as p, usuarios as u
                                    WHERE p.nofolio='$folio'
                                    AND p.correo=u.correo";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($mostrar = mysqli_fetch_array($result))
                                    {
                                ?>
                                        <p class="ti ti-titulo"><?php echo $mostrar['titulo'] ?></p>
                                        <p class="pa pa-texto">Folio: <?php echo $mostrar['nofolio'] ?></p>
                                        <p class="pa pa-texto">Propósito: </p>
                                        <p class="pa pa-texto">Estatus: <?php echo $mostrar['estatus'] ?></p>
                                        <p class="pa pa-texto">Estatus aprobación: <?php echo $mostrar['aprobacion'] ?></p>
                                        <p class="pa pa-texto">Asesor:<?php echo $mostrar['asesor'] ?></p>
                                        <p class="pa pa-texto">Co-asesor: </p>
                                        <p class="pa pa-texto">Dueño:<?php echo $mostrar['duenio'] ?></p>
                                        <p class="pa pa-texto">fecha de registro: <?php echo $mostrar['fecha'] ?></p>
                                    <?php
                                    }
                                } else
                                {
                                    $sql = "SELECT DISTINCT p.titulo,p.noFolio,e.proposito,p.estatus,p.aprobacion,CONCAT(u.nombre,' ', u.primerApellido,' ',u.segundoApellido ) as asesor,p.coasesor,p.duenio,DATE_FORMAT(p.fecha_registro, '%d-%m-%Y') as fecha
                                            FROM proyectos as p, usuarios as u, historicos as h, equipos as e
                                            WHERE p.noFolio='$folio'
                                            AND h.noFolio=p.noFolio
                                            AND e.noEquipo=h.noEquipo
                                            AND p.correo=u.correo
                                            AND e.fecha_final IS NULL";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($mostrar = mysqli_fetch_array($result))
                                    {
                                    ?>
                                        <p class="ti ti-titulo"><?php echo $mostrar['titulo'] ?></p>
                                        <p class="pa pa-texto">Folio: <?php echo $mostrar['noFolio'] ?></p>
                                        <p class="pa pa-texto">Propósito: <?php echo $mostrar['proposito'] ?></p>
                                        <p class="pa pa-texto">Estatus: <?php echo $mostrar['estatus'] ?></p>
                                        <p class="pa pa-texto">Estatus aprobación: <?php echo $mostrar['aprobacion'] ?></p>
                                        <p class="pa pa-texto">Asesor:<?php echo $mostrar['asesor'] ?></p>
                                        <p class="pa pa-texto">Co-asesor:<?php echo $mostrar['coasesor'] ?></p>
                                        <p class="pa pa-texto">Dueño:<?php echo $mostrar['duenio'] ?></p>
                                        <p class="pa pa-texto">Fecha de registro: <?php echo $mostrar['fecha'] ?></p>
                                <?php
                                    }
                                }
                                ?>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Button trigger modal -->
                            <button class="btn btn-boton-ext " type="button " data-toggle="modal" data-target="#actualizarModal">
                                <img class="fa fa-icon " src="../imagenes/data-actualization-on-cloud.png " /> Actualizar progreso</button>

                            <!-- Modal -->
                            <div class="modal fade" id="actualizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Datos del proyecto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" id="actualizar">
                                                <br>
                                                <p>Ingrese el porcentaje %</p>
                                                <input class="txt text-input" type="text" name="porcentaje" id="porcentaje" placeholder="introduzca un valor entre 0 y 100" style="width:100%" pattern="[0-9]{0,3}">
                                                <input class="txt text-input" type="text" name="folio" id="folio" value="<?php echo $folio ?>" hidden>

                                                <br>
                                            </form>
                                            <form action="guarda.php?folio=<?php echo $folio ?>" method="post" enctype="multipart/form-data" name="archivos" id="archivos">
                                                <input type="file" id="real-file" name="archivo[]" multiple="" hidden>
                                                <button class="btn btn-boton-ext" type="button" id="seleccionador"><img class="fa fa-icon " src="../imagenes/addfile.png" /> Agregar evidencias</button>
                                                <span id="archivoInfo"> archivo seleccionado</span>
                                                <button type="submit" class="btn btn-boton-ext" id="subirArchivos">
                                                    <img class="fa fa-icon " src="../imagenes/cloud-computing.png" /> Subir</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-cancelar-ext" onclick="location.href='proyecto.php?correo=<?php echo $correo ?>&folio=<?php echo $folio ?>'" type="button " data-dismiss="modal">
                                                <img class="fa fa-icon " src="../imagenes/cancel.png" /> Cancelar</button>
                                            <button class="btn btn-boton-ext " type="submit" form="actualizar" id="actualizarBtn">
                                                <img class="fa fa-icon " src="../imagenes/check.png" /> Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <form action="" method="post" id="cederForm">
                                <?php
                                $sql = "SELECT estatus,aprobacion
                                        FROM proyectos
                                        WHERE nofolio='$folio'";
                                $result = mysqli_query($conexion, $sql);

                                while ($mostrar = mysqli_fetch_array($result))
                                {
                                ?>
                                    <?php
                                    if ($mostrar['aprobacion'] == 'NO APROBADO' || $mostrar['aprobacion'] == 'REVISION')
                                    {
                                    ?>
                                        <button class="btn btn-boton-ext " type="submit" id="btnCeder" name="btnCeder" disabled><img class="fa fa-icon " src="../imagenes/box.png" /> Ceder</button>
                                    <?php
                                    } else
                                    {
                                    ?>
                                        <button class="btn btn-boton-ext " type="submit" id="btnCeder" name="btnCeder"><img class="fa fa-icon " src="../imagenes/box.png" /> Ceder</button>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                        <div class="col-6">
                            <form action="" method="post" id="retomarForm">
                                <?php
                                $sql = "SELECT estatus,aprobacion
                                        FROM proyectos
                                        WHERE nofolio='$folio'";
                                $result = mysqli_query($conexion, $sql);

                                while ($mostrar = mysqli_fetch_array($result))
                                {
                                ?>
                                    <?php
                                    if ($mostrar['estatus'] == 'ACTIVO' || $mostrar['aprobacion'] == 'NO APROBADO' || $mostrar['aprobacion'] == 'COMPLETADO' || $mostrar['aprobacion'] == 'REVISION')
                                    {
                                    ?>
                                        <button class="btn btn-boton-ext " type="submit" id="btnRetomar" name="btnRetomar" disabled><img class="fa fa-icon " src="../imagenes/box.png" /> Retomar</button>
                                    <?php
                                    } else
                                    {
                                    ?>
                                        <button class="btn btn-boton-ext " type="submit" id="btnRetomar" name="btnRetomar"><img class="fa fa-icon " src="../imagenes/box.png" /> Retomar</button>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-boton-ext " type="submit" id="historial" name="historial"><img class="fa fa-icon " src="../imagenes/historial.png " /> Historial</button>
                        </div>
                        <div class="col-6">
                            <!-- Button trigger modal -->
                            <button class="btn btn-boton-ext " type="button " data-toggle="modal" data-target="#datosModal"><img class="fa fa-icon " src="../imagenes/info.png " /> Ver datos</button>

                            <!-- Modal -->
                            <div class="modal fade" id="datosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Datos del proyecto</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="GET" id="datosProyecto">
                                                <br>
                                                <?php
                                                $sql = "SELECT titulo,justificacion,alcances,resumen
                                                        FROM proyectos
                                                        WHERE nofolio='$folio'";
                                                $result = mysqli_query($conexion, $sql);

                                                while ($mostrar = mysqli_fetch_array($result))
                                                {
                                                ?>
                                                    <p>Título</p>
                                                    <input class="txt text-input" type="text" name="titulo" id="titulo" style="width:100%" value="<?php echo $mostrar['titulo'] ?>" readonly>
                                                    <br>
                                                    <p>Justificación</p>
                                                    <textarea class="txt txt-texto-area " name="justificacion" id="justificacion" readonly><?php echo $mostrar['justificacion'] ?></textarea>
                                                    <p>Alcances</p>
                                                    <textarea class="txt txt-texto-area " name="alcances" id="alcances" readonly><?php echo $mostrar['alcances'] ?></textarea>
                                                    <p>Resumen</p>
                                                    <textarea class=" txt txt-texto-area " name="resumen" id="resumen" readonly><?php echo $mostrar['resumen'] ?></textarea>
                                                <?php
                                                }
                                                ?>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-boton-ext " data-dismiss="modal"><img class="fa fa-icon " src="../imagenes/check.png " /> Aceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <br>
                            <p class="pa pa-texto">Equipo actual</p>
                            <div class="col-13" style="overflow: hidden; overflow-x:scroll; margin-top: 20px;">
                                <table class="table table-striped table-bordered" id="tablax" style=" width: 100%;">
                                    <thead>
                                        <tr class="tr1">
                                            <th class="th th-cabeza">Nombre</th>
                                            <th class="th th-cabeza">Primer apellido</th>
                                            <th class="th th-cabeza">Segundo apellido</th>
                                            <th class="th th-cabeza">No. Control</th>
                                            <th class="th th-cabeza">No. Equipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT i.noControl,i.nombre,i.primerApellido,i.segundoApellido,e.noEquipo
                                                FROM integrantes as i, historicos as h, equipos as e
                                                WHERE h.nofolio='$folio'
                                                AND e.noEquipo=h.noEquipo
                                                AND i.noControl=h.noControl
                                                AND e.fecha_final IS NULL";
                                        $result = mysqli_query($conexion, $sql);

                                        while ($mostrar = mysqli_fetch_array($result))
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo $mostrar['nombre'] ?></td>
                                                <td><?php echo $mostrar['primerApellido'] ?></td>
                                                <td><?php echo $mostrar['segundoApellido'] ?></td>
                                                <td><?php echo $mostrar['noControl'] ?></td>
                                                <td><?php echo $mostrar['noEquipo'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <?php
                                $sql = "SELECT estatus,aprobacion
                                        FROM proyectos
                                        WHERE nofolio ='$folio'";
                                $result = mysqli_query($conexion, $sql);

                                while ($mostrar = mysqli_fetch_array($result))
                                {
                                ?>
                                    <?php
                                    if ($mostrar['estatus'] == 'INACTIVO' || $mostrar['aprobacion'] == 'APROBADO' || $mostrar['aprobacion'] == 'COMPLETADO')
                                    {
                                    ?>
                                        <button type="button" name="desvincular" id="desvincular" class="btn btn-boton-ext " data-dismiss="modal"><img class="fa fa-icon " src="../imagenes/cancel.png " /> Desvincular equipo</button>

                                    <?php
                                    } else
                                    {
                                    ?>
                                        <button type="button" name="desvincular" id="desvincular" class="btn btn-boton-ext " data-dismiss="modal" disabled><img class="fa fa-icon " src="../imagenes/cancel.png " /> Desvincular equipo</button>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row justify-content-center  mt-5 mr-1 col-sm-13" style="margin: 0 auto;">
                <div class="formulario col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <div>
                            <div class="div div-cabeza mx-sm-12">
                                <p class="ti ti-texto ">Evidencias </p>
                            </div>

                        </div>
                        <div class="div div-cuerpo form-group mx-sm-12">
                            <div class="col-13">
                                <table class="table1">
                                    <tr class="tr1">
                                        <th>Nombre</th>
                                        <th>Extensión<?php $extension ?></th>
                                        <th>Fecha</th>
                                    </tr>
                                    <?php
                                    for ($i = 0; $i < sizeof($nombre); $i++)
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo "<a href='$direccion[$i]'>$nombre[$i]</a>"; ?></td>
                                            <td><?php echo $extension[$i]; ?></td>
                                            <td><?php echo $fecha[$i]; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="borde col-sm-13 div div-pie-pagina width:100%">
                    <br><br>
                    <label>Instituto Tecnológico de Toluca | <a href="http://www.ittoluca.edu.mx/">www.ittoluca.edu.mx</a>
                        <br>
                        Instituto Tecnologico de Toluca - Algunos derechos reservados © 2021
                        <br>
                    </label>
                    <center><img class="div div-cabecera col" src="../imagenes/footer.png" title="footer"></center>
                    <br>
                    <label>
                        Av. Tecnológico s/n. Fraccionamiento La Virgen
                        <br>
                        Metepec, Edo. De México, México C.P. 52149
                        <br>
                        Tel. (52) (722) 2 08 72 00
                    </label>
                </div>
            </div>
        </div>


        <?php
        $sql = "SELECT avance
            FROM proyectos
            WHERE nofolio='$folio'";

        $result = mysqli_query($conexion, $sql);
        ?>
        <?php
        while ($mostrar = mysqli_fetch_array($result))
        {
        ?>
            <?php
            $progreso = $mostrar['avance'];
            ?>
        <?php
        }
        ?>

        <script>
            var p = '<?php echo json_encode($progreso); ?>';
        </script>

        <script type="text/javascript">
            var progreso = JSON.parse(p)
            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas);
            var PieData = [{
                value: progreso,
                color: "#FF8D57",
                highlight: "#FF8D57",
                label: "Avance"
            }, {
                value: 100 - progreso,
                color: "#337AB7",
                highlight: "#337AB7",
                label: "Restante"
            }];
            var pieOptions =
                {
                //Boolean - Whether we should show a stroke on each segment
                segmentShowStroke: true,
                //String - The colour of each segment stroke
                segmentStrokeColor: "#ffffff",
                //Number - The width of each segment stroke
                segmentStrokeWidth: 2,
                //Number - The percentage of the chart that we cut out of the middle
                percentageInnerCutout: 50, // This is 0 for Pie charts
                //Number - Amount of animation steps
                animationSteps: 100,
                //String - Animation easing effect
                animationEasing: "easeOutBounce",
                //Boolean - Whether we animate the rotation of the Doughnut
                animateRotate: true,
                //Boolean - Whether we animate scaling the Doughnut from the centre
                animateScale: false,
                //Boolean - whether to make the chart responsive to window resizing
                responsive: true,
                // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio: true,
                //String - A legend template
                legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
            };

            pieChart.Doughnut(PieData, pieOptions);
        </script>

        <script src="../js/proyecto.js"></script>
        <script src="../js/tablamini.js"></script>
</body>

</html>