const registro = document.getElementById("registrodueno")
const inputs = document.querySelectorAll('#registrodueno input')
const selects = document.querySelectorAll('#registrodueno select')
const buttons = document.querySelectorAll('#registrodueno button')


const expreg = {
    nombre: /^([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]{1,35})$/,
    noControl: /^([A-Z0-9]{1,8})$/
}

const campos = {
    noControl: false,
    nombre: false,
    paterno: false,
    materno: false,
    tipodueno: false
}

const validar = (e) => {
    switch (e.target.name) {
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
        case "tdueno":
            if (e.target.value != 'Seleccione una opcion') {
                document.getElementById('tdueno').classList.remove('slct-combo-error')
                campos.tipodueno = true
            } else {
                campos.tipodueno = false
            }
            break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(campo).classList.remove('input-error')
        campos[campo] = true
    } else {
        console.log('error');
        document.getElementById(campo).classList.add('input')
        document.getElementById(campo).classList.add('input-error')
        campos[campo] = false
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validar);
    input.addEventListener('blur', validar);
});

selects.forEach((select) => {
    select.addEventListener('blur', validar);
    select.addEventListener('change', validar);
});

registro.addEventListener('submit', e => {
    e.preventDefault()

    if (campos.nombre && campos.paterno && campos.materno && campos.noControl && campos.tipodueno) {
        campos.nombre = false
        campos.paterno = false
        campos.materno = false
        campos.noControl = false
        campos.tipodueno = false


        registro.reset()
        if (e.submitter.id == 'terminar') {
            console.log('terminar')
            window.location.href = "asesor.html"
        } else if (e.submitter.id == 'siguiente') {
            console.log('siguiente')
            window.location.href = "registroequipo.html"
        }
    } else if (!campos.tipodueno) {
        document.getElementById('tdueno').classList.add('slct')
        document.getElementById('tdueno').classList.add('slct-combo-error')
    } else {
        document.getElementById("mensaje").innerHTML = "<p>Algunos campos no son validos</p>";
        document.getElementById('mensajeCont').classList.remove('div')
        document.getElementById('mensajeCont').classList.remove('div.ocultar')
    }
})