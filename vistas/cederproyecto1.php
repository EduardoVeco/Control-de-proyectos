<?php
$folio = $_REQUEST['folio'];
$correo = $_REQUEST['correo'];
$conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');

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
    <script>
        var f = '<?php echo json_encode($folio); ?>';
    </script>
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
                <form action="" method="POST" id="cederForm">
                    <div>
                        <div class="div div-cabeza mx-sm-12">
                            <p class="ti ti-texto ">Ceder proyecto </p>
                        </div>
                    </div>
                    <div class="div div-cuerpo form-group mx-sm-12">
                        <div class="row">
                            <div class="col-4 justify-content-left input-group">
                                <p> Introduzca el correo del asesor</p>
                                <input class="txt text-buscar" type="text" placeholder="Correo institucional" name="correo" id="correo" value="<?php echo $correo ?>" pattern="[a-zA-Z0-9.#$%&*+_-]{1,35}(@toluca.tecnm.mx){1}" />
                                <button class="btn btn-buscar " type="submit" id="btnCorreo"><img class="fa fa-icon " src="../imagenes/search.png " /> </button>
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        <div class="col-13">
                            <table class="table1">
                                <tr class="tr1">
                                    <th>Nombre</th>
                                    <th>Primer apellido</th>
                                    <th>Segundo apellido</th>
                                    <th>Carrera</th>
                                </tr>
                                <?php
                                $sql = "SELECT nombre,primerApellido,segundoApellido,carrera FROM usuarios
                                                WHERE correo='$correo'";
                                $result = mysqli_query($conexion, $sql);

                                while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td> <?php echo $mostrar['nombre'] ?></td>
                                        <td> <?php echo $mostrar['primerApellido'] ?></td>
                                        <td> <?php echo $mostrar['segundoApellido'] ?></td>
                                        <td> <?php echo $mostrar['carrera'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4 justify-content-center">
                                <br><br>
                                <?php
                                //Ejecutamos la sentencia SQL
                                if (mysqli_num_rows($result) != 0) {
                                ?>
                                    <button class="btn btn-aceptar-ext " type="submit " id="btnCeder"><img class="fa fa-icon " src="../imagenes/check.png " /> Ceder proyecto</button>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-aceptar-ext " type="submit " id="btnCeder" disabled><img class="fa fa-icon " src="../imagenes/check.png " /> Ceder proyecto</button>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
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

</html>