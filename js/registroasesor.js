const registro = document.getElementById("registroasesor")
const botonesForm = document.getElementById("botonesForm")
const inputs = document.querySelectorAll('#registroasesor input')
var noControlAs = []
var nombreAs = []
var paternoAs = []
var maternoAs = []


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
    materno: false
}

const validar = (e) =>
{
    switch (e.target.name)
    {
        case "noControl":
            validarCampo(expreg.noControl, e.target, 'noControl')
            break;
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

    if (e.submitter.id == 'atras')
    {
        console.log('atras')
        window.location.href = "registroequipo.php"
    } else
    {

        if (e.submitter.id == 'terminar')
        {
            var noControl = document.getElementById('noControl').value
            var nombre = document.getElementById('nombre').value
            var paterno = document.getElementById('paterno').value
            var materno = document.getElementById('materno').value

            if (noControl == '' && nombre == '' && paterno == '' && materno == '')
            {
                console.log('El coasesor sera null')
                    // window.location.href = "asesor.php"
            } else
            {
                if (campos.noControl && campos.nombre && campos.paterno & campos.materno)
                {
                    noControlAs.push(document.getElementById('noControl').value)
                    nombreAs.push(document.getElementById('nombre').value)
                    paternoAs.push(document.getElementById('paterno').value)
                    maternoAs.push(document.getElementById('materno').value)

                    console.log(noControlAs)
                    console.log(nombreAs)
                    console.log(paternoAs)
                    console.log(maternoAs)
                    console.log('terminar')
                    window.location.href = "asesor.php"
                } else
                {
                    document.getElementById("mensaje").innerHTML = "<p>Algunos campos no son validos</p>";
                    document.getElementById('mensajeCont').classList.remove('div')
                    document.getElementById('mensajeCont').classList.remove('div.ocultar')
                }
            }

        }
    }
})