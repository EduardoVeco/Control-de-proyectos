<?php
$correo=$_REQUEST['correo'];
print_r($correo);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cuenta: contrasena</title>
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

    <div class="container">
        <div class="row">
            <div class="borde col-sm-13 width:100%">
                <img src="../imagenes/header.png" class="div div-cabecera col">
            </div>
        </div>
    </div>

    <div class="container">
        <nav class="navbar navbar-light navbar-expand-sm border col-sm-12" style="background-color: #ffffff; border-radius: 7px;">

            <a class="navbar-brand" href="# " style="font-size: 20px;">Control de proyectos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
        </nav>
    </div>

    <br>

    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1col-sm-5" style="margin: 0 auto;">
            <div class="formulario col-10 col-sm-9 col-md-7 col-lg-5 col-xl-4 ">
                <div>
                    <div class="div div-cabeza mx-sm-7">
                        <p class="ti ti-texto ">Contraseña </p>
                    </div>

                </div>
                <div class="div div-cuerpo form-group mx-sm-6">
                    <div class="mx-sm-4 pt-3 " style="text-align: center;">
                        <img src="../imagenes/logo 125x125.png" class="col-7">
                    </div>
                    <form action="conexion.php" method="POST" id="login">
                        <div class="form-group mx-sm-7 pb-3 ">
                            <p class="pa pa-texto ">Contraseña actual </p>
                            <input class="txt text-input " type="password" name="contrasena" id="contrasena" data-toggle="tooltip" data-placement="right" title="Minimo 6 caracteres, una mayuscula y un numero" pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,20}" required />
                        </div>

                        <br><br>
                        <div class="form-group mx-sm-7 pb-3 ">
                            <p class="pa pa-texto ">Nueva contraseña</p>
                            <input class="txt text-input " type="password" name="contrasena" id="contrasena" data-toggle="tooltip" data-placement="right" title="Minimo 6 caracteres, una mayuscula y un numero" pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,20}" required />

                        </div>
                        <div class="form-group mx-sm-7 pb-3 ">
                            <p class="pa pa-texto ">Confirmar contraseña </p>
                            <input class="txt text-input " type="password" name="contrasena" id="contrasena" data-toggle="tooltip" data-placement="right" title="Minimo 6 caracteres, una mayuscula y un numero" pattern="(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,20}" required />

                        </div>
                    </form>
                    <div class="row">
                        <div class="col-1">
                        </div>
                        <div class="col-10">
                            <button class="btn btn-boton-ext " type="submit" form="login"><img class="fa fa-icon " src="../imagenes/key.png " /> Cambiar contraseña</button>

                        </div>
                        <div class="col-1">
                        </div>
                    </div>
                    <br>
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


    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>