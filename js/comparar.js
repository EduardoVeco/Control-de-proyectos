console.log('Soy JS')
btnComparar = document.getElementById('compararBtn')
actualizarBtn = document.getElementById('actualizarBtn')
negarBtn = document.getElementById('cancelar')
var correo = JSON.parse(c)


btnComparar.addEventListener('click', e => {
    e.preventDefault()
    var folio1 = document.getElementById('folio1').value
    var folio2 = document.getElementById('folio2').value
    if (document.getElementById('folio1').value != '') {
        if (document.getElementById('folio1').value != '' && document.getElementById('folio2').value != '') {
            window.location.href = "comparacion1.php?folio1=" + folio1 + "&folio2=" + folio2 + "&correo=" + correo + "&cantidad=" + 2 + '&estado=0';
        } else {

        }


    } else {
        document.getElementById("mensaje").innerHTML = "<p>Complete el campo de folio a revision</p>";
        document.getElementById('mensajeCont').classList.remove('div')
        document.getElementById('mensajeCont').classList.remove('div-ocultar')
    }
})

actualizarBtn.addEventListener('click', e => {
    e.preventDefault()
    var conclusion = document.getElementById('conclusion').value
    var folio1 = document.getElementById('folio1').value
    var folio2 = document.getElementById('folio2').value
    var cantidad = JSON.parse(can)
    window.location.href = "llamadaUD.php?folio1=" + folio1 + "&conclusion=" + conclusion + "&correo=" + correo + "&elemento=" + "si" + "&folio2=" + folio2 + '&cantidad=' + cantidad;

})

negarBtn.addEventListener('click', e => {
    e.preventDefault()
    var conclusion = document.getElementById('conclusion').value
    document.getElementById('mensajeCont').classList.add('div.ocultar')
    var folio1 = document.getElementById('folio1').value
         window.location.href = "llamadaUD.php?folio1=" + folio1 + "&conclusion=" + conclusion + "&correo=" + correo + "&elemento=no";
})