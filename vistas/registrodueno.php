<?php
$primjust = $_REQUEST['primjust'];
$primtit = $_REQUEST['primtit'];
$primalc = $_REQUEST['primalc'];
$primres = $_REQUEST['primres'];
$correo = $_REQUEST['correo'];
$justificacion = $_REQUEST['justificacion'];
$titulo = $_REQUEST['titulo'];
$alcances = $_REQUEST['alcances'];
$resumen = $_REQUEST['resumen'];

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
        <div class="row justify-content-center  mt-5 mr-1col-sm-5" style="margin: 0 auto;">
            <div class="formulario col-10 col-sm-9 col-md-7 col-lg-5 col-xl-4 ">
                <div>
                    <div class="div div-cabeza mx-sm-6">
                        <p class="ti ti-texto ">Registro: Dueño </p>
                    </div>

                </div>
                <div class="div div-cuerpo form-group mx-sm-6">
                    <form action="conexion.php" method="POST" id="registrodueno">
                        <div class="form-group mx-sm-7 pt-3">
                            <p class="pa pa-texto ">No. Control </p>
                            <input class="txt text-input " type="text " name="noControl" id="noControl" required />
                        </div>
                        <div class="form-group mx-sm-7 pt-3">
                            <p class="pa pa-texto ">Nombre </p>
                            <input class="txt text-input " type="text " name="nombre" id="nombre" required/>
                        </div>
                        <div class="form-group mx-sm-7 pt-3">
                            <p class="pa pa-texto ">Primer apellido </p>
                            <input class="txt text-input " type="text " name="paterno" id="paterno" required/>
                        </div>
                        <div class="form-group mx-sm-7 pt-3">
                            <p class="pa pa-texto ">Segundo apellido </p>
                            <input class="txt text-input " type="text " name="materno" id="materno" required/>
                        </div>
                        <div class="form-group mx-sm-7 pt-3 justify-content-center">
                            <p class="pa pa-texto ">Tipo de dueño </p>
                            <select name="tdueno" id="tdueno" class="slct slct-combo" required>
                            <option selected hidden>Seleccione una opcion</option>
                            <option value="doc">Docente</option>
                            <option value="alu">Alumno</option>
                            </select>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-aceptar " type="submit " form="registrodueno" name="terminar" id="terminar"><img class="fa fa-icon " src="../imagenes/check.png " /> Terminar</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-boton " type="submit " form="registrodueno" name="siguiente" id="siguiente"><img class="fa fa-icon " src="../imagenes/next.png " /> Siguiente</button>
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

    <script src="../js/registrodueno.js"></script>

</body>

</html>