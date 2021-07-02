console.log('Soy JS')
btnComparar = document.getElementById('compararBtn')
actualizarBtn = document.getElementById('actualizarBtn')

btnComparar.addEventListener('click', e => {
    e.preventDefault()
    if (document.getElementById('folio1').value != '' && document.getElementById('folio2').value != '') {
        var folio1 = document.getElementById('folio1').value
        var folio2 = document.getElementById('folio2').value
        console.log(folio1)
        console.log(folio2)

        window.location.href = "comparacion1.php?folio1=" + folio1 + "&folio2=" + folio2;

    } else {
        document.getElementById("mensaje").innerHTML = "<p>Complete todos los campos</p>";
        document.getElementById('mensajeCont').classList.remove('div')
        document.getElementById('mensajeCont').classList.remove('div-ocultar')
        console.log(document.getElementById('mensajeCont').classList)
    }
})

actualizarBtn.addEventListener('click', e => {
    e.preventDefault()
    var folio1 = document.getElementById('folio1').value
    window.location.href = "update a proyecto.php?folio1=" + folio1;
})