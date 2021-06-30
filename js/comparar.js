console.log('Soy JS')
btnComparar = document.getElementById('compararBtn')

btnComparar.addEventListener('clcik', e => {
    e.preventDefault()
    var folio1 = document.getElementById('folio1').value
    var folio2 = document.getElementById('folio2').value
    console.log(folio1)
    console.log(folio2)

    window.location = "comparacion1.php?folio1=" + folio1 + '&folio2=' + folio2;

})