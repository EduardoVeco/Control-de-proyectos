<?php
$folio = $_REQUEST['folio'];
print_r($folio);
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
    $query = $con->query("SELECT * FROM `usuarios` WHERE `correo` = '$_SESSION[correo]'");
    $fetch = $query->fetch_array();
    ?>
    <div class="container">
        <div class="row">
            <div class="borde col-sm-13 width:100%">
                <img src="../imagenes/header.png" class="div div-cabecera col">
            </div>
        </div>
    </div>


    <br>

    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1col-sm-5" style="margin: 0 auto;">
            <div class="formulario col-10 col-sm-9 col-md-7 col-lg-5 col-xl-4 ">
                <div>
                    <div class="div div-cabeza mx-sm-6">
                        <p class="ti ti-texto ">Registro: co-asesor </p>
                    </div>
                </div>
                <div class="div div-cuerpo form-group mx-sm-6">

                    <form action="registroCoasesor1.php" method="POST" id="registroasesor">
                        <div class="form-group mx-sm-7 pt-3">
                            <p style="text-align: center; color: #FF8D57">Esta sección es opcional</p>
                            <br>
                            <p class="pa pa-texto ">No. Empleado </p>
                            <input class="txt text-input " type="text " name="folio" id="folio" value="<?php echo $folio ?>" hidden />
                            <input class="txt text-input " type="text " name="noControl" id="noControl" pattern="([A-Z0-9]{1,8})" />

                        </div>
                        <div class="form-group mx-sm-7 pt-3">
                            <p class="pa pa-texto ">Nombre </p>
                            <input class="txt text-input " type="text " name="nombre" id="nombre" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,37})" />
                        </div>
                        <div class="form-group mx-sm-7 pt-3">
                            <p class="pa pa-texto ">Primer apellido </p>
                            <input class="txt text-input " type="text " name="paterno" id="paterno" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,37})" />
                        </div>
                        <div class="form-group mx-sm-7 pt-3">
                            <p class="pa pa-texto ">Segundo apellido </p>
                            <input class="txt text-input " type="text " name="materno" id="materno" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,37})" />
                        </div>
                    </form>

                    <br><br>
                    <form action="" method="POST" id="botonesForm">
                        <div class="row">

                            <div class="col-12">
                                <button class="btn btn-aceptar-ext " type="submit" name="terminar2" id="terminar2" form="registroasesor"><img class="fa fa-icon " src="../imagenes/check.png " /> Terminar</button>
                            </div>
                        </div>
                    </form>
                </div>
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

</body>

</html>