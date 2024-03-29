<?php
$correo = $_REQUEST['correo'];
$conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');

session_start();
        if(!ISSET($_SESSION['correo']))
        {
            header('location:index.php');
        }else
        {
            if((time() - $_SESSION['time']) > 930)
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
    <title>Registro de proyecto</title>
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-12">
                        <div class="div div-cabeza mx-sm-12">
                            <p class="ti ti-texto ">Registro: proyecto </p>
                        </div>
                        <div class="div div-cuerpo form-group mx-sm-12 justify-content-left">
                            <form action="primitivas.php" method="POST" id="registroProyecto">
                                <br>
                                <p>Título</p>
                                <input class="txt text-input" type="text" name="titulo" id="titulo" style="width:100%" placeholder="Ingrese el título 1-150 caracteres" pattern=".{1,150}" required>
                                <br>
                                <p>Justificación</p>
                                <textarea class="txt txt-texto-area " name="justificacion" id="justificacion" placeholder="Ingrese la justificación 1-22,000 caracteres" pattern=".{1,22000}" required></textarea>
                                <p>Alcances</p>
                                <textarea class="txt txt-texto-area " name="alcances" id="alcances" placeholder="Ingrese los alcances 1-13,000 caracteres" pattern=".{1,13000}" required></textarea>
                                <p>Resumen</p>
                                <textarea class=" txt txt-texto-area " name="resumen" id="resumen" placeholder="Ingrese el resumen 1-25,000 caracteres" pattern=".{1,25000}" required></textarea>

                                <input type="text" name="correo" value="<?php echo $correo?>" hidden>
                                <br>
                                <div class="row">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-6 justify-content-center">
                                        <br>
                                        <button class="btn btn-boton-ext " type="button " form="registroProyecto"><img class="fa fa-icon " src="../imagenes/check.png " /> Verificar</button>
                                    </div>
                                    <div class="col-3">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container div div-ocultar" id="mensajeCont">
        <div class="col-12 justify-content-center">
            <div class="div div-mensaje" id="mensaje">
                <p>Mensaje importante</p>
            </div>
            <div class="div div-ocultar" id="boton1">
                <button class="btn btn-boton-ext " type="button " onclick="location.href='registrodueno.php'"><img class="fa fa-icon " src="../imagenes/next.png " /> Continuar con el registro</button>
            </div>
            <div class="div div-ocultar" id="boton2">
                <button class="btn btn-boton-ext " type="button "><img class="fa fa-icon " src="../imagenes/customer-service.png " /> Apelar proyecto</button>
            </div>
        </div>
    </div>

    <br><br><br>

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