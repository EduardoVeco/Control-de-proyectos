<?php
$estado = $_REQUEST['estado'];
$correo = $_REQUEST['correo'];
$min;
$max;
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
                            <a class="dropdown-item" href="parametros.php?correo=<?php echo $correo ?>&estado=0">Ajustar parámetros</a>
                            <a class="dropdown-item" href="index.html">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <br>

    <div class="container div" id="mensajeCont">
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10 justify-content-center">
                <?php
                if ($estado == '0') {
                } else {
                ?>
                    <div class="div div-mensaje" id="mensaje">
                        <p><?php echo $estado ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-1">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1col-sm-5" style="margin: 0 auto;">
            <div class="formulario col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 ">
                <div>
                    <div class="div div-cabeza mx-sm-7">
                        <p class="ti ti-texto "> Parámetros </p>
                    </div>
                </div>
                <div class="div div-cuerpo form-group mx-sm-6">
                    <form action="conexion.php" method="POST" id="parametros">
                        <?php
                        $conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');
                        $sql = "SELECT c.carrera,c.porcentajeMin,c.porcentajeMax
                                FROM usuarios as u ,carreras as c
                                WHERE u.correo='$correo'
                                AND c.carrera=u.carrera";
                        $result = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_array($result))
                        {
                            $min = $mostrar['porcentajeMin'];
                            $min = $mostrar['porcentajeMax'];
                        ?>
                            <br>
                            <h6 style="text-align: center;">Estos cambios afectan solo a los futuros proyectos de <?php echo $mostrar['carrera'] ?></h6>


                        <?php
                        }
                        ?>

                        <div class="row">
                            <div class="form-group mx-sm-7 pt-3 col-7">
                                <p class="pa pa-texto ">Similitud mínima</p>
                            </div>
                            <div class="form-group mx-sm-7 pt-3 col-5">
                                <input type="number" class="txt spinner-input" id="numero" value="<?php echo $min ?>" data-toggle="tooltip" data-placement="right" title="Modifica el porcentaje mínimo en el que un proyecto se pone en revisión" pattern="[0-9]{1,3}" min="1" max="100" required>
                                <br>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mx-sm-7 pt-3 col-7">
                                <p class="pa pa-texto ">Similitud máxima</p>
                            </div>
                            <div class="form-group mx-sm-7 pt-3 col-5">
                                <input type="number" class="txt spinner-input" id="numero" value="<?php echo $max ?>" data-toggle="tooltip" data-placement="right" title="Modifica el porcentaje máximo en el que un proyecto se pone en revisión" min="1" max="100" pattern="[0-9]{1,3}" required>
                                <br>
                                <br>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-cancelar-ext" type="submit" name="cancelar" onclick="location.href='dptoinvestigacion.php?estado=0'">
                                    <img class="fa fa-icon " src="../imagenes/cancel.png" /> Cancelar</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-boton-ext" type="submit" name="aplicar" form="parametros">
                                    <img class="fa fa-icon " src="../imagenes/check.png " /> Aplicar</button>
                            </div>
                        </div>
                    </form>
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