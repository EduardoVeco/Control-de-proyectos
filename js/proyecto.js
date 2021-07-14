const registro = document.getElementById("actualizar")
const retomarForm = document.getElementById("retomarForm")
const inputs = document.querySelectorAll('#actualizar input')
const archivo = document.getElementById("real-file")
const boton = document.getElementById("seleccionador")
texto = document.getElementById("archivoInfo")
const historialBtn = document.getElementById("historial")
const actualizarBtn = document.getElementById("actualizarBtn")
const retomarBtn = document.getElementById("btnRetomar")
const desvincularBtn = document.getElementById("desvincular")
    //console.log(folio)


registro.addEventListener('submit', e => 
{
    e.preventDefault()
    console.log(campos.porcentaje)

    if (campos.porcentaje) 
    {
        campos.porcentaje = false
        actualizar.reset()

    } else {

    }
})


boton.addEventListener("click", function() 
{
    archivo.click();
})

archivo.addEventListener("change", function() 
{
    if (archivo.value) 
    {
        texto.innerHTML = ""
        for (var i = 0; i < archivo.files.length; i++) 
        {
            texto.innerHTML += archivo.files[i].name
            texto.innerHTML += "<br>"
        }
        //console.log(archivo.files[i])

    } else 
    {
        texto.innerHTML = "Ningun archivo seleccionado";
    }
})

retomarForm.addEventListener("submit", e => 
{
    e.preventDefault()
    console.log('aqui tendria que hacer la validacion si el proyecto esta inactivo e incompleto')
})

/*
seleccion = [], //Arreglo que almacenará a las filas seleccionadas
    seleccionar = function(event) { //Función a ejecutarse para seleccionar una fila
        if (event.target.tagName == "TD") { //Si se pulsó una celda
            var fila = event.target.parentNode; //Se almacena en una variable a la fila que la contiene
            var folio = $(this).find("td:eq(1)").text();
            window.location = "proyecto.php?folio=" + folio;
            console.log(folio)
        }
    };*/
//Cuando se produzca el evento "click" en la primera tabla, se ejecutará la función "callback"
historialBtn.addEventListener("click", e => 
{
    e.preventDefault()
    var folio = JSON.parse(f)
    var correo1 = JSON.parse(correo)
    window.location = "historico.php?folio=" + folio + '&correo=' + correo1;
    console.log(folio)
})

btnCeder.addEventListener("click", e => 
{
    e.preventDefault()
    var folio = JSON.parse(f)
    var correo1 = JSON.parse(correo)
    window.location = "cederproyecto.php?folio=" + folio + '&correo=' + correo1;
    console.log(folio)
})

actualizarBtn.addEventListener("click", e => 
{
    e.preventDefault()
    var folio = JSON.parse(f)
    var porcentaje = document.getElementById('porcentaje').value
    if (porcentaje > 0 && porcentaje <= 100) 
    {
        window.location.href = "actualizarPorcentaje.php?folio=" + folio + '&porcentaje=' + porcentaje;
        document.getElementById('mensajeCont').classList.add('div.ocultar')
    } else 
    {
        document.getElementById("mensaje").innerHTML = "<p>El porcentaje de estar entre 1 y 100</p>";
        document.getElementById('mensajeCont').classList.remove('div')
        document.getElementById('mensajeCont').classList.remove('div.ocultar')
    }

    // console.log(folio)
    //console.log(porcentaje)
})
retomarBtn.addEventListener("click", e => 
{
    e.preventDefault()
    var folio = JSON.parse(f)
    var correo1 = JSON.parse(correo)
    window.location.href = "registroequipo.php?folio=" + folio + '&correo= ' + correo1;
    // console.log(folio)
    //console.log(porcentaje)
})
desvincularBtn.addEventListener("click", e => 
{
    e.preventDefault()
    var folio = JSON.parse(f)
    var correo1 = JSON.parse(correo)

    window.location.href = "borraEquipo.php?folio=" + folio;
    // console.log(folio)
    //console.log(porcentaje)
})