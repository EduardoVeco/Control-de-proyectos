<?php
$folio = $_REQUEST['folio'];
$conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');
session_start();
        if(!ISSET($_SESSION['correo'])){
            header('location:index.php');
        }else{
            if((time() - $_SESSION['time']) > 930){
                header('location: logout.php');
            }
        }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Historial</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/contenedores.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="stylesheet" href="../css/textos.css">
    <link rel="stylesheet" href="../css/botones.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

</head>

<body class="body">
        <?php
            require 'conexion.php';
            $query = $conexion->query("SELECT * FROM `usuarios` WHERE `correo` = '$_SESSION[correo]'");
            $fetch = $query->fetch_array();
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

            <a class="navbar-brand" href="asesor.html" style="font-size: 20px;">Control de proyectos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <ul class="navbar-nav text-left">
                    <li class="nav-item"><a class="nav-link " href="cederproyecto.html">Ceder proyecto</a></li>
                    <li class="nav-item"><a class="nav-link " href="registroproyecto.html">Registrar proyecto</a></li>
                </ul>
            </div>
        </nav>
    </div>


    <br>


    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1 col-sm-13" style="margin: 0 auto;">
            <div class="formulario col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                <form action="">
                    <div>
                        <div class="div div-cabeza mx-sm-12">
                            <p class="ti ti-texto ">Historico </p>
                        </div>

                    </div>
                    <div class="div div-cuerpo form-group mx-sm-12">
                        <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="col-6 justify-content-center" style="text-align: center;">
                                <?php
                                $sql = "SELECT titulo,nofolio,DATE_FORMAT(fecha_registro, '%d-%m-%Y') as fecha
                                        FROM proyectos
                                        WHERE nofolio='$folio'";
                                $result = mysqli_query($conexion, $sql);

                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
                                    <p class="ti ti-titulo"><?php echo $mostrar['titulo'] ?></p>
                                    <p class="pa pa-texto">Folio: <?php echo $mostrar['nofolio'] ?></p>
                                    <p class="pa pa-texto">Fecha de registro: <?php echo $mostrar['fecha'] ?></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-3">
                            </div>
                        </div>



                        <div class="col-13" style="overflow: hidden; overflow-x: scroll; margin-top: 20px;">
                            <table class="table table-striped table-bordered" id="tablax" style="width: 100%;">
                                <thead>
                                    <tr class="tr1">
                                        <th class="th th-cabeza">Nombre</th>
                                        <th class="th th-cabeza">No.Control</th>
                                        <th class="th th-cabeza">No.Equipo</th>
                                        <th class="th th-cabeza">Fecha inicio</th>
                                        <th class="th th-cabeza">Fecha final</th>
                                        <th class="th th-cabeza">Proposito</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT CONCAT(i.nombre,' ', i.primerApellido,' ',i.segundoApellido ) as integrante,i.noControl,e.noEquipo,e.proposito,DATE_FORMAT(h.fecha_inicial, '%d-%m-%Y') as fi,DATE_FORMAT(h.fecha_final, '%d-%m-%Y') as ff
                                        FROM integrantes as i,equipos as e,historicos as h
                                        WHERE e.noEquipo=i.noEquipo
                                        AND e.noEquipo=h.noEquipo
                                        AND h.nofolio='$folio'
                                        ORDER BY h.fecha_inicial,h.fecha_final";
                                    $result = mysqli_query($conexion, $sql);

                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $mostrar['integrante'] ?></td>
                                            <td><?php echo $mostrar['noControl'] ?></td>
                                            <td><?php echo $mostrar['noEquipo'] ?></td>
                                            <td><?php echo $mostrar['fi'] ?></td>
                                            <td><?php echo $mostrar['ff'] ?></td>
                                            <td><?php echo $mostrar['proposito'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
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
    <script src="../js/tabla.js"></script>

</html>