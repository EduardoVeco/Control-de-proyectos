const cambiarBtn=document.getElementById('cambiar')

cambiarBtn.addEventListener("click", e => {

    e.preventDefault()

    var correo = JSON.parse(c)
    window.location='conexion.php?correo='+ correo

})