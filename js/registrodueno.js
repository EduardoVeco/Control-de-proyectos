const registro = document.getElementById("registrodueno")
const inputs = document.querySelectorAll('#registrodueno input')
const buttons = document.querySelectorAll('#registrodueno button')


const expreg =
    {
    nombre: /^([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]{1,35})$/,
    noControl: /^([A-Z0-9]{1,8})$/
}

const campos =
    {
    noControl: false,
    nombre: false,
    paterno: false,
    materno: false,
    tipodueno: false
}

const validar = (e) =>
{
    switch (e.target.name)
    {
        case "nombre":
            validarCampo(expreg.nombre, e.target, 'nombre')
            break;
        case "paterno":
            validarCampo(expreg.nombre, e.target, 'paterno')
            break;
        case "materno":
            validarCampo(expreg.nombre, e.target, 'materno')
            break;
    }
}

const validarCampo = (expresion, input, campo) =>
{
    if (expresion.test(input.value))
    {
        document.getElementById(campo).classList.remove('input-error')
        campos[campo] = true
    } else
    {
        console.log('error');
        document.getElementById(campo).classList.add('input')
        document.getElementById(campo).classList.add('input-error')
        campos[campo] = false
    }
}

inputs.forEach((input) =>
{
    input.addEventListener('keyup', validar);
    input.addEventListener('blur', validar);
});

registro.addEventListener('submit', e =>
{
    e.preventDefault()
    console.log(campos.nombre)
    console.log(campos.paterno)
    console.log(campos.materno)
    if (campos.nombre && campos.paterno && campos.materno)
    {
        campos.nombre = false
        campos.paterno = false
        campos.materno = false

        var nom = document.getElementById('nombre').value
        var pat = document.getElementById('paterno').value
        var mat = document.getElementById('materno').value

        if (e.submitter.id == 'terminar')
        {

            window.location.href = "asesor.php?nom=" + nom

        } else if (e.submitter.id == 'siguiente')
        {
            console.log('terminar')
            $.ajax({
                type: 'REQUEST',
                url: 'prueba.php',
                data: {
                    nom: nom,
                    pat: pat,
                    mat: mat
                },
                success: function(data)
                {
                    //  alert("success!");
                    console.log(data);
                }
            });

            window.location.href = "prueba.php?nom=" + nom
        }
    } else
    {
        document.getElementById("mensaje").innerHTML = "<p>Algunos campos no son validos</p>";
        document.getElementById('mensajeCont').classList.remove('div')
        document.getElementById('mensajeCont').classList.remove('div.ocultar')
    }
})