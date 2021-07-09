<?php
$folio = $_REQUEST['folio'];
$conexion = mysqli_connect('localhost', 'root', '', 'controlproyectos');
$noControl = $_REQUEST['noControl'];

$noControlA = $_REQUEST['noControlA'];
$nombre = $_REQUEST['nombre'];
$paterno = $_REQUEST['paterno'];
$materno = $_REQUEST['materno'];

if (empty($noControl)) {
    header("Location:registroequipo.php");
}
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
    <script>
        var nc = '<?php echo json_encode($noControl); ?>';
        var n = '<?php echo json_encode($noControlA); ?>'
        var nom = '<?php echo json_encode($nombre); ?>';
        var ap = '<?php echo json_encode($paterno); ?>';
        var am = '<?php echo json_encode($materno); ?>';
        var f = '<?php echo json_encode($folio); ?>';
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



    <br>

    <div class="container div div-ocultar" id="mensajeCont">
        <div class="col-12 justify-content-center">
            <div class="div div-mensaje" id="mensaje">
                <p>Mensaje importante</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center  mt-5 mr-1col-sm-5" style="margin: 0 auto;">
            <div class="formulario col-10 col-sm-9 col-md-7 col-lg-5 col-xl-4 ">
                <div>
                    <div class="div div-cabeza mx-sm-6">
                        <p class="ti ti-texto ">Registro: Integrantes </p>
                    </div>
                </div>
                <div class="div div-cuerpo form-group mx-sm-6">
                    <form action="" method="POST" id="verifalumno">
                        <div class="form-group mx-sm-7 pt-3">
                            <p class="pa pa-texto ">No. Control </p>
                            <input class="txt text-input " type="text " name="noControl" id="noControl" value="<?php echo $noControl; ?>" required />
                            <br>
                            <button class="btn btn-boton-ext " type="submit" form="verifalumno" name="btnFolio"><img class="fa fa-icon " src="../imagenes/verified-user.png " /> Verificar integrante</button>
                        </div>
                    </form>



                    <?php
                    $sql = "SELECT nombre,primerApellido,segundoApellido FROM integrantes
                            WHERE noControl='$noControl'";
                    $result = mysqli_query($conexion, $sql);
                    $mostrar = mysqli_fetch_array($result)
                    ?>
                    <?php
                    if (mysqli_num_rows($result) == 0) {
                    ?>
                        <form action="" method="POST" id="registroequipo">
                            <div class="form-group mx-sm-7 pt-3">
                                <p class="pa pa-texto ">Nombre </p>
                                <input class="txt text-input " type="text " name="nombre" id="nombre" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,37})" required />
                            </div>
                            <div class="form-group mx-sm-7 pt-3">
                                <p class="pa pa-texto ">Primer apellido </p>
                                <input class="txt text-input " type="text " name="paterno" id="paterno" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,37})" required />
                            </div>
                            <div class="form-group mx-sm-7 pt-3">
                                <p class="pa pa-texto ">Segundo apellido </p>
                                <input class="txt text-input " type="text " name="materno" id="materno" pattern="([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ ]{1,37})" required />
                            </div <br>
                            <button class="btn btn-boton-ext " type="submit" id="agregar" form="registroequipo"><img class="fa fa-icon " src="../imagenes/signin.png " /> Agregar integrante</button>
                            <br>
                        </form>
                    <?php
                    } else {
                    ?>
                        <form action="" method="POST" id="registroequipo">
                            <div class="form-group mx-sm-7 pt-3">
                                <p class="pa pa-texto ">Nombre </p>
                                <input class="txt text-input " type="text " name="nombre" id="nombre" value="<?php echo $mostrar['nombre'] ?>" required disabled />
                            </div>
                            <div class="form-group mx-sm-7 pt-3">
                                <p class="pa pa-texto ">Primer apellido </p>
                                <input class="txt text-input " type="text " name="paterno" id="paterno" value="<?php echo $mostrar['primerApellido'] ?>" required disabled />
                            </div>
                            <div class="form-group mx-sm-7 pt-3">
                                <p class="pa pa-texto ">Segundo apellido </p>
                                <input class="txt text-input " type="text " name="materno" id="materno" value="<?php echo $mostrar['segundoApellido'] ?>" required disabled />
                            </div <br>
                            <button class="btn btn-boton-ext " type="submit" id="agregar" form="registroequipo"><img class="fa fa-icon " src="../imagenes/signin.png " /> Agregar integrante</button>
                            <br>
                        </form>
                    <?php
                    }


                    ?>



                    <form action="" method="POST" id="propositoForm">
                        <div class="form-group mx-sm-7 pt-3">
                            <p class="pa pa-texto ">Propósito </p>
                            <input class="txt text-input " type="text " name="proposito" id="proposito" placeholder="introduzca el proposito del equipo " data-toggle="tooltip" data-placement="right" title="ejemplo:Proyecto para la materia de ingenieria de software" required />
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-6">
                            <?php
                            $sql = "SELECT correo 
                                    FROM proyectos 
                                    WHERE noFolio='$folio'";
                            $result = mysqli_query($conexion, $sql);
                            $mostrar = mysqli_fetch_array($result)
                            ?>
                            <button class="btn btn-cancelar " type="button " id="cancelar" form="registroequipo" onclick="location.href='asesor.php?correo='<?php echo $mostrar['correo'] ?>"><img class="fa fa-icon " src="../imagenes/cancel.png " /> Cancelar</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-boton " type="submit " id="siguiente" form="propositoForm"><img class="fa fa-icon " src="../imagenes/next.png " /> Siguiente</button>
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



    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="../js/registroequipo.js"></script>
</body>

</html>