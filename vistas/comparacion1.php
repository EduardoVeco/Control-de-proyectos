<?php
$conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');
$folio1 = $_REQUEST['folio1'];
$folio2 = $_REQUEST['folio2'];
$correo = $_REQUEST['correo'];
$cantidad = $_REQUEST['cantidad'];
print_r($folio1);
print_r($folio2);
print_r($correo);

session_start();
if (!isset($_SESSION['correo'])) {
    header('location:index.php');
} else {
    if ((time() - $_SESSION['time']) > 930) {
        header('location: logout.php');
    }
}
$aprobacion;
$sql = "SELECT aprobacion FROM proyectos
        WHERE noFolio='$folio1'";
$result = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($result)) {
    $aprobacion = $mostrar['aprobacion'];
}
print_r($aprobacion);

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../js/Chart.min.js" type="text/javascript"></script>
    <script>
        var c = '<?php echo json_encode($correo); ?>';
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
                <form action="" method="POST">
                    <div>
                        <div class="div div-cabeza mx-sm-12">
                            <p class="ti ti-texto ">Comparar proyectos </p>
                        </div>

                    </div>
                    <div class="div div-cuerpo form-group mx-sm-12">


                        <div class="row">
                            <div class="col-6 justify-content-left input-group">
                                <p class="pa pa-texto">Folio del proyecto en revisión</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4 justify-content-left input-group">
                                <input class="txt text-input " type="text " id="folio1" name="buscar" placeholder="Folio:" value="<?php echo $folio1 ?>" style="width: 100%;" pattern="[A-Z0-9]{7,15}" required />
                            </div>
                        </div>
                        <br>
                        <div class="col-13 ">
                            <table class="table1">
                                <thead>
                                    <tr class="tr1">
                                        <th>Título</th>
                                        <th>Correo del asesor</th>
                                        <th>Estatus de aprobación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT titulo,correo,aprobacion FROM proyectos
                                                WHERE noFolio='$folio1'";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $mostrar['titulo'] ?></td>
                                            <td><?php echo $mostrar['correo'] ?></td>
                                            <td><?php echo $mostrar['aprobacion'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-6 justify-content-left input-group">
                                <p class="pa pa-texto">Folio de proyecto aprobado</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4 justify-content-left input-group">
                                <input class="txt text-input " type="text " id="folio2" name="buscar" placeholder="Folio:" style="width: 100%;" value="<?php echo $folio2 ?>" pattern="[A-Z0-9]{7,15}" required />
                            </div>
                        </div>
                        <br>
                        <div class="col-13 ">
                            <table class="table1">
                                <thead>
                                    <tr class="tr1">
                                        <th>Título</th>
                                        <th>Correo del asesor</th>
                                        <th>Estatus de aprobación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT titulo,correo,aprobacion FROM proyectos
                                                WHERE noFolio='$folio2'";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $mostrar['titulo'] ?></td>
                                            <td><?php echo $mostrar['correo'] ?></td>
                                            <td><?php echo $mostrar['aprobacion'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <br>
                        <button class="btn btn-boton-ext " type="submit" id="compararBtn">
                            <img class="fa fa-icon " src="../imagenes/comparar.png " /> Comparar proyectos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container div div-ocultar" id="mensajeCont">
        <div class="col-12 justify-content-center">
            <div class="div div-mensaje" id="mensaje">
                <p>Mensaje importante</p>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1 col-sm-13" style="margin: 0 auto;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="">
                    <div class="row">
                        <?php
                        if ($cantidad == 1) {
                        ?>
                            <div class="col-xl-12 col-lg-12 col-12">
                                <div class="div div-cabeza mx-sm-12">
                                    <p class="ti ti-texto ">Folio del proyecto en revision</p>
                                </div>
                                <div class="div div-cuerpo form-group mx-sm-12 justify-content-left">
                                    <?php
                                    $sql = "SELECT titulo,alcances,resumen,justificacion FROM proyectos
                                WHERE noFolio='$folio1'";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>
                                        <p>Titulo</p>
                                        <input class="txt text-input" readonly="readonly" type="text" value="<?php echo $mostrar['titulo'] ?>">
                                        <p>Justificación</p>
                                        <textarea class="txt txt-texto-area " readonly="readonly"><?php echo $mostrar['justificacion'] ?></textarea>
                                        <p>Alcances</p>
                                        <textarea class="txt txt-texto-area " readonly="readonly"> <?php echo $mostrar['alcances'] ?></textarea>
                                        <p>Resumen</p>
                                        <textarea class="txt txt-texto-area " readonly="readonly"> <?php echo $mostrar['resumen'] ?></textarea>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <div class="div div-cabeza mx-sm-12">
                                    <p class="ti ti-texto ">Folio del proyecto en revision</p>
                                </div>
                                <div class="div div-cuerpo form-group mx-sm-12 justify-content-left">
                                    <?php
                                    $sql = "SELECT titulo,alcances,resumen,justificacion FROM proyectos
                                WHERE noFolio='$folio1'";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>
                                        <p>Titulo</p>
                                        <input class="txt text-input" readonly="readonly" type="text" value="<?php echo $mostrar['titulo'] ?>">
                                        <p>Justificación</p>
                                        <textarea class="txt txt-texto-area " readonly="readonly"><?php echo $mostrar['justificacion'] ?></textarea>
                                        <p>Alcances</p>
                                        <textarea class="txt txt-texto-area " readonly="readonly"> <?php echo $mostrar['alcances'] ?></textarea>
                                        <p>Resumen</p>
                                        <textarea class="txt txt-texto-area " readonly="readonly"> <?php echo $mostrar['resumen'] ?></textarea>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12">
                                <div class="div div-cabeza mx-sm-12">
                                    <p class="ti ti-texto ">Folio de proyecto aprobado </p>
                                </div>
                                <div class="div div-cuerpo form-group mx-sm-12">
                                    <?php
                                    $sql = "SELECT titulo,alcances,resumen,justificacion FROM proyectos
                                WHERE noFolio='$folio2'";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>
                                        <p>Titulo</p>
                                        <input class="txt text-input" readonly="readonly" type="text" value="<?php echo $mostrar['titulo'] ?>">
                                        <p>Justificación</p>
                                        <textarea class="txt txt-texto-area " readonly="readonly"><?php echo $mostrar['justificacion'] ?></textarea>
                                        <p>Alcances</p>
                                        <textarea class="txt txt-texto-area " readonly="readonly"> <?php echo $mostrar['alcances'] ?></textarea>
                                        <p>Resumen</p>
                                        <textarea class="txt txt-texto-area " readonly="readonly"> <?php echo $mostrar['resumen'] ?></textarea>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1 col-sm-13" style="margin: 0 auto;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="col-13">
                    <div class="div div-cabeza mx-sm-12">
                        <p class="ti ti-texto ">Conclusión</p>
                    </div>
                    <div class="div div-cuerpo form-group mx-sm-12 justify-content-left">
                        <form action="">
                            <p>Escriba una conclusión</p>
                        </form>
                        <textarea class="txt txt-texto-area " id="conclusion" required></textarea>
                        <div class="row">
                            <div class="col-6">
                                <br>
                                <?php
                                if ($aprobacion == 'APROBADO') {
                                ?>
                                    <button class="btn btn-cancelar-ext " name="aviso" id="aviso" type="button " data-toggle="modal" data-target="#avisoModal">
                                        <img class="fa fa-icon " src="../imagenes/cancel.png " /> Denegar proyecto</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="avisoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Aviso!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>No se puede denegar un proyecto ya aprobado</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-boton-ext " type="button" data-dismiss="modal">
                                                        <img class="fa fa-icon " src="../imagenes/check.png" /> Entendido</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-cancelar-ext " name="cancelar" id="cancelar" type="button ">
                                        <img class="fa fa-icon " src="../imagenes/cancel.png " /> Denegar proyecto</button>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-6">
                                <br>
                                <button class="btn btn-aceptar-ext " type="button " data-toggle="modal" data-target="#autorizarModal">
                                    <img class="fa fa-icon " src="../imagenes/check.png " /> Autorizar proyecto</button>
                                <!-- Modal -->
                                <div class="modal fade" id="autorizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Autorizacion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" id="autorizaForm">
                                                    <p>El proyecto <?php echo $folio1 ?> sera aprobado ¿Desea continuar?</p>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-cancelar-ext" type="button " data-dismiss="modal">
                                                    <img class="fa fa-icon " src="../imagenes/cancel.png" /> Cancelar</button>
                                                <button class="btn btn-boton-ext " type="submit" id="actualizarBtn">
                                                    <img class="fa fa-icon " src="../imagenes/check.png" /> Aceptar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <script src="../js/comparar.js"></script>

</html>