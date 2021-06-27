var oneTbody = document.querySelector("#tablax tbody"), //Cuerpo de la primera tabla
    seleccion = [], //Arreglo que almacenará a las filas seleccionadas
    seleccionar = function(event) { //Función a ejecutarse para seleccionar una fila
        if (event.target.tagName == "TD") {
            var fila = event.target.parentNode; //la contiene
            var folio = fila.children[1].innerHTML // toma el segundo valor de la fila
            window.location = "proyecto.php?folio=" + folio;
            console.log(folio)
        }

    };
//Cuando se produzca el evento "click" en la primera tabla, se ejecutará la función "callback"*/
oneTbody.addEventListener("click", seleccionar, false);
/* if (event.target.tagName == "TD") { //Si se pulsó una celda
    console.log(tabla.cells[4].value)
    var fila = event.target.parentNode; //Se almacena en una variable a la fila que la contiene
    var folio = $(this).find("td:eq(1)").text();
    window.location = "proyecto.php?folio=" + folio;
    console.log(folio)
}*/