<?php
$conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');
$folio1 = $_REQUEST['folio1'];
$folio2 = $_REQUEST['folio2'];

print_r($folio1);
print_r($folio2);

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/Chart.min.js" type="text/javascript"></script>
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

            <a class="navbar-brand" href="dptoinvestigacion.php" style="font-size: 20px;">Control de proyectos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <ul class="navbar-nav text-left">
                    <li class="nav-item"><a class="nav-link " href="comparacion.php">Comparar proyecto</a></li>
                    <li class="nav-item"><a class="nav-link " href="autorizarproyecto.html">Autorizar proyecto</a></li>
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
                                <p class="pa pa-texto">Introduzca el folio 1</p>
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
                                        <th>Titulo</th>
                                        <th>Correo del asesor</th>
                                        <th>Estatus de aprobacion</th>
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
                                <p class="pa pa-texto">Introduzca el folio 2</p>
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
                                        <th>Titulo</th>
                                        <th>Correo del asesor</th>
                                        <th>Estatus de aprobacion</th>
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



    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1 col-sm-13" style="margin: 0 auto;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="div div-cabeza mx-sm-12">
                                <p class="ti ti-texto ">Folio 1 </p>
                            </div>
                            <div class="div div-cuerpo form-group mx-sm-12 justify-content-left">
                                <p>Titulo</p>
                                <input class="txt text-input" readonly="readonly" type="text">
                                <p>Justificación</p>
                                <textarea class="txt txt-texto-area " readonly="readonly"> Área de texto!</textarea>
                                <p>Alcances</p>
                                <textarea class="txt txt-texto-area " readonly="readonly"> Área de texto!</textarea>
                                <p>Resumen</p>
                                <textarea class="txt txt-texto-area " readonly="readonly"> Área de texto!</textarea>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-12">
                            <div class="div div-cabeza mx-sm-12">
                                <p class="ti ti-texto ">Folio 2 </p>
                            </div>
                            <div class="div div-cuerpo form-group mx-sm-12">
                                <p>Titulo</p>
                                <input class="txt text-input" readonly="readonly" type="text">
                                <p>Justificación</p>
                                <textarea class="txt txt-texto-area " readonly="readonly"> Área de texto!</textarea>
                                <p>Alcances</p>
                                <textarea class="txt txt-texto-area " readonly="readonly"> Área de texto!</textarea>
                                <p>Resumen</p>
                                <textarea class="txt txt-texto-area " readonly="readonly"> Área de texto!</textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1 col-sm-13" style="margin: 0 auto;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="">
                    <div class="col-13">
                        <div class="div div-cabeza mx-sm-12">
                            <p class="ti ti-texto ">Conclusión</p>
                        </div>
                        <div class="div div-cuerpo form-group mx-sm-12 justify-content-left">
                            <p>Escriba una Conclusión</p>
                            <textarea class="txt txt-texto-area "> Área de texto!</textarea>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-cancelar-ext " type="button "><img class="fa fa-icon " src="../imagenes/cancel.png " /> Denegar proyecto</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-aceptar-ext " type="button "><img class="fa fa-icon " src="../imagenes/check.png " /> Autorizar proyecto</button>
                                </div>
                            </div>
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

    <script src="../js/comparar.js"></script>

</html>