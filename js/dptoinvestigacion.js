const buscar = document.getElementById("buscar")
const inputs = document.querySelectorAll('#buscar input')

const expreg = {
    folio: /^([A-Z0-9]{0,13})$/
}

const validar = (e) => {
    switch (e.target.name) {
        case "folio":
            validarCampo(expreg.folio, e.target, 'folio')
            break;
    }
}

const campos = {
    folio: false
}

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(campo).classList.remove('text-buscar-error')
        document.getElementById(campo).classList.add('text-buscar')
        campos[campo] = true
    } else {
        console.log('error');
        document.getElementById(campo).classList.remove('text-buscar')
        document.getElementById(campo).classList.add('text-buscar-error')
        campos[campo] = false
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validar);
    input.addEventListener('blur', validar);
});