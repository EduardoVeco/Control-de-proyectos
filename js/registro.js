const registro = document.getElementById("registro")
const inputs = document.querySelectorAll('#registro input')
const selects = document.querySelectorAll('#registro select')
console.log(inputs)
console.log(selects)

const expreg =
    {
    correo: /^[a-zA-Z0-9.#$%&*+_-]{1,35}(@toluca.tecnm.mx){1}$/,
    password: /^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,40})/,
    nombre: /^([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]{1,35})$/,
    noControl: /^([A-Z0-9]{1,8})$/
}

const campos =
    {
    correo: false,
    contrasena: false,
    contrasena2: false,
    nombre: false,
    paterno: false,
    materno: false,
    noControl: false,
    carrera: false
}

const validar = (e) =>
{
    switch (e.target.name)
    {
        case "correo":
            validarCampo(expreg.correo, e.target, 'correo')
            break;
        case "contrasena":
            validarCampo(expreg.password, e.target, 'contrasena')
            if (e.target.value == document.getElementById('contrasena2').value)
            {
                document.getElementById('contrasena2').classList.remove('input-error')
                campos.contrasena2 = true;
                console.log('Las contraseñas coinciden')
            } else
            {
                console.log('Las contraseñas no coinciden')
                document.getElementById('contrasena2').classList.add('input')
                document.getElementById('contrasena2').classList.add('input-error')
                campos.contrasena2 = false;
            }
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
        case "noControl":
            validarCampo(expreg.noControl, e.target, 'noControl')
            break;
        case "carrera":
            if (e.target.value != 'Seleccione una opcion')
            {
                document.getElementById('carrera').classList.remove('slct-combo-error')
                campos.carrera = true
            } else
            {
                campos.carrera = false
            }
            break;
        case "contrasena2":
            if (campos.contrasena && (e.target.value == document.getElementById('contrasena').value))
            {
                document.getElementById('contrasena2').classList.remove('input-error')
                campos.contrasena2 = true;
            } else
            {
                document.getElementById('contrasena2').classList.add('input')
                document.getElementById('contrasena2').classList.add('input-error')
                campos.contrasena2 = false;
            }
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

selects.forEach((select) =>
{
    select.addEventListener('blur', validar);
    select.addEventListener('change', validar);
});

registro.addEventListener('submit', e =>
{
    e.preventDefault()
    console.log(campos.correo)
    console.log(campos.contrasena)
    console.log(campos.contrasena2)
    console.log(campos.paterno)
    console.log(campos.materno)
    console.log(campos.noControl)
    console.log(campos.carrera)

    if (campos.correo && campos.contrasena && campos.contrasena2 && campos.nombre && campos.paterno && campos.materno && campos.noControl && campos.carrera)
    {
        campos.correo = false
        campos.contrasena = false
        campos.contrasena2 = false
        campos.nombre = false
        campos.paterno = false
        campos.materno = false
        campos.noControl = false
        campos.carrera = false
        registro.reset()
        document.getElementById("mensaje").innerHTML = "<p>Registro exitoso</p>";
        document.getElementById('mensajeCont').classList.remove('div')
        document.getElementById('mensajeCont').classList.remove('div.ocultar')
    } else if (!campos.carrera)
    {
        document.getElementById('carrera').classList.add('slct')
        document.getElementById('carrera').classList.add('slct-combo-error')
    } else
    {
        document.getElementById("mensaje").innerHTML = "<p>Algunos campos no son validos</p>";
        document.getElementById('mensajeCont').classList.remove('div')
        document.getElementById('mensajeCont').classList.remove('div.ocultar')
    }
})