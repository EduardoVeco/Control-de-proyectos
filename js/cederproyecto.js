console.log('Soy JS')
btnCorreo.addEventListener('click', e => 
{
    e.preventDefault()
    var correo = document.getElementById('correo').value
    var folio = f
    console.log(correo)
    window.location = "cederproyecto1.php?correo=" + correo + '&folio=' + folio;
})