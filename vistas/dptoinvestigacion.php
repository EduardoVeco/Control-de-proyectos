<?php
$conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');
$correo = $_REQUEST['correo'];
print_r($correo);
session_start();
if (!isset($_SESSION['correo'])) {
    header('location:index.php');
} else {
    if ((time() - $_SESSION['time']) > 930) {
        header('location: logout.php');
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/contenedores.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="stylesheet" href="../css/textos.css">
    <link rel="stylesheet" href="../css/botones.css" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




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
            <a class="navbar-brand" href="dptoinvestigacion.php?correo=<?php echo $correo ?>" style="font-size: 20px;">Control de proyectos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <ul class="navbar-nav text-left">
                    <li class="nav-item"><a class="nav-link " href="comparacion.php?correo=<?php echo $correo ?>">Comparar proyecto</a></li>
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
                        <p class="ti ti-texto ">Consultar proyecto </p>
                    </div>
                </div>
                <div class="div div-cuerpo form-group mx-sm-12">
                    <div class="col-13" style="overflow: hidden; overflow-x: scroll; margin-top: 20px;">
                        <table class="table table-striped table-bordered" id="tablax" style="width: 100%;">
                            <thead>
                                <tr class="tr1">
                                    <th class="th th-cabeza">Título</th>
                                    <th class="th th-cabeza">Folio</th>
                                    <th class="th th-cabeza">Asesor</th>
                                    <th class="th th-cabeza">Progreso</th>
                                    <th class="th th-cabeza">Estatus</th>
                                    <th class="th th-cabeza">Estatus de aprobación</th>
                                    <th class="th th-cabeza">Fecha</th>
                                </tr>
                            </thead>
                            <tbody id="proyectosBody">

                                <?php

                                $sql = "SELECT p.titulo,p.nofolio,CONCAT(u.nombre,' ',u.primerApellido,' ',u.segundoApellido) as asesor,p.avance,p.estatus,p.aprobacion,DATE_FORMAT(p.fecha_registro, '%d-%m-%Y') as fecha 
                                        FROM proyectos as p , usuarios as u
                                        WHERE p.correo=u.correo
                                        ORDER BY fecha_registro";
                                $result = mysqli_query($conexion, $sql);
                                ?>
                                <?php
                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $mostrar['titulo'] ?></td>
                                        <td><?php echo $mostrar['nofolio'] ?></td>
                                        <td><?php echo $mostrar['asesor'] ?></td>
                                        <td><?php echo $mostrar['avance'] ?></td>
                                        <td><?php echo $mostrar['estatus'] ?></td>
                                        <td><?php echo $mostrar['aprobacion'] ?></td>
                                        <td><?php echo $mostrar['fecha'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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

    <script src="../js/dptoinvestigacion.js"></script>
    <script src="../js/tabla.js"></script>

</html>