const registro = document.getElementById("actualizar")
const retomarForm = document.getElementById("retomarForm")
const inputs = document.querySelectorAll('#actualizar input')
const archivo = document.getElementById("real-file")
const boton = document.getElementById("seleccionador")
texto = document.getElementById("archivoInfo")
const historialBtn = document.getElementById("historial")
const actualizarBtn = document.getElementById("actualizarBtn")

//console.log(folio)

const campos = {
    porcentaje: false
}



registro.addEventListener('submit', e => {
    e.preventDefault()
    console.log(campos.porcentaje)

    if (campos.porcentaje) {
        campos.porcentaje = false
        actualizar.reset()

    } else {

    }
})


boton.addEventListener("click", function() {

    archivo.click();
})

archivo.addEventListener("change", function() {
    if (archivo.value) {
        texto.innerHTML = ""
        for (var i = 0; i < archivo.files.length; i++) {
            texto.innerHTML += archivo.files[i].name
            texto.innerHTML += "<br>"
        }
        //console.log(archivo.files[i])

    } else {
        texto.innerHTML = "Ningun archivo seleccionado";
    }
})

retomarForm.addEventListener("submit", e => {
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
historialBtn.addEventListener("click", e => {
    e.preventDefault()
    var folio = JSON.parse(f)
    window.location = "historico.php?folio=" + folio;
    console.log(folio)
})

btnCeder.addEventListener("click", e => {
    e.preventDefault()
    var folio = JSON.parse(f)
    window.location = "cederproyecto.html?folio=" + folio;
    console.log(folio)
})

actualizarBtn.addEventListener("click", e => {
    e.preventDefault()
    var folio = JSON.parse(f)
    var porcentaje=document.getElementById('porcentaje').value
   window.location = "actualizarPorcentaje.php?folio=" + folio +'&porcentaje='+porcentaje;
   // console.log(folio)
    //console.log(porcentaje)
})