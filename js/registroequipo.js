const registro = document.getElementById("registroequipo")
const inputs = document.querySelectorAll('#registroequipo input')
const alumno = document.getElementById("verifalumno")
const inputAlumno = document.querySelectorAll('#verifalumno input')
const propositoForm = document.getElementById("propositoForm")
const propositoInput = document.querySelectorAll('#propositoForm input')

var noControlA = []
var nombre = []
var paterno = []
var materno = []
var folio
noControlA += ',' + JSON.parse(n)
nombre += ',' + JSON.parse(nom)
paterno += ',' + JSON.parse(ap)
materno += ',' + JSON.parse(am)
folio = f

console.log(noControlA)
console.log(nombre)
console.log(paterno)
console.log(materno)

console.log(propositoForm)

const expreg = {
    nombre: /^([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s]{1,35})$/,
    prop: /^([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ\s0-9]{1,100})$/,
    noControl: /^([A-Z0-9]{1,8})$/
}

const campos = {
    noControl: false,
    nombre: false,
    paterno: false,
    materno: false,
    proposito: false,
    nc: ''
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
        case "proposito":
            validarCampo(expreg.prop, e.target, 'proposito')
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

inputAlumno.forEach((input) => {
    input.addEventListener('keyup', validar);
    input.addEventListener('blur', validar);
});

propositoInput.forEach((input) => {
    input.addEventListener('keyup', validar);
    input.addEventListener('blur', validar);
});




alumno.addEventListener('submit', e => {
    e.preventDefault()
    if (campos.noControl) {
        campos.nc = document.getElementById('noControl').value
            //var noControl = document.getElementById('noControl').value
        console.log(noControlA)
        console.log(nombre)
        console.log(paterno)
        console.log(materno)
        console.log(folio)
        window.location = "registroequipo1.php?noControl=" + campos.nc + "&noControlA=" + noControlA + '&nombre=' + nombre + '&paterno=' + paterno + '&materno=' + materno + '&folio=' + folio;
        console.log(noControl)
        document.getElementById("nombre").disabled = false;
        document.getElementById("paterno").disabled = false;
        document.getElementById("materno").disabled = false;
        document.getElementById('mensajeCont').classList.add('div')
        document.getElementById('mensajeCont').classList.add('div.ocultar')

    } else {
        document.getElementById("mensaje").innerHTML = "<p>El numero de control no es valido</p>";
        document.getElementById('mensajeCont').classList.remove('div')
        document.getElementById('mensajeCont').classList.remove('div.ocultar')
    }
})




registro.addEventListener('submit', e => {
    e.preventDefault()

    if (e.submitter.id == 'cancelar') {
        console.log('cancelar')
        window.location.href = "asesor.html"
    } else {

        const noc = document.getElementById('noControl')
        const nom = document.getElementById('nombre')
        const ap = document.getElementById('paterno')
        const am = document.getElementById('materno')

        validarCampo(expreg.noControl, noc, 'noControl')
        validarCampo(expreg.nombre, nom, 'nombre')
        validarCampo(expreg.nombre, ap, 'paterno')
        validarCampo(expreg.nombre, am, 'materno')

        console.log(campos.noControl)
        console.log(campos.nombre)
        console.log(campos.paterno)
        console.log(campos.materno)


        if (campos.nombre && campos.paterno && campos.materno) {
            if (e.submitter.id == 'agregar' && campos.noControl) {
                console.log(campos.nc)
                campos.nombre = false
                campos.paterno = false
                campos.materno = false
                    /* noControlA.push(document.getElementById('noControl').value)
                     nombre.push(document.getElementById('nombre').value)
                     paterno.push(document.getElementById('paterno').value)
                     materno.push(document.getElementById('materno').value)*/
                noControlA += ',' + document.getElementById('noControl').value
                nombre += ',' + document.getElementById('nombre').value
                paterno += ',' + document.getElementById('paterno').value
                materno += ',' + document.getElementById('materno').value

                console.log(noControlA)
                console.log(nombre)
                console.log(paterno)
                console.log(materno)
                console.log(folio)
                    //registro.reset()
                    //alumno.reset()
                document.getElementById("noControl").value = '';
                document.getElementById("nombre").value = '';
                document.getElementById("paterno").value = '';
                document.getElementById("materno").value = '';
                document.getElementById("nombre").disabled = true;
                document.getElementById("paterno").disabled = true;
                document.getElementById("materno").disabled = true;


                document.getElementById("mensaje").innerHTML = "<p>Integrante agregado</p>";
                document.getElementById('mensajeCont').classList.remove('div')
                document.getElementById('mensajeCont').classList.remove('div.ocultar')

            }
        } else {
            document.getElementById("mensaje").innerHTML = "<p>Algunos campos son incorrectos</p>";
            document.getElementById('mensajeCont').classList.remove('div')
            document.getElementById('mensajeCont').classList.remove('div.ocultar')
        }
    }

})



propositoForm.addEventListener('submit', e => {
    e.preventDefault()

    if (e.submitter.id == 'siguiente') {
        if (noControl.length == 0 && nombre.length == 0) {
            document.getElementById("mensaje").innerHTML = "<p>Agregue almenos un integrante</p>";
            document.getElementById('mensajeCont').classList.remove('div')
            document.getElementById('mensajeCont').classList.remove('div.ocultar')
        } else {
            if (campos.proposito) {
                console.log('Aqui ya pasaste a la otra ventana carnal')
                propositoFinal = document.getElementById('proposito').value
                console.log(propositoFinal)
                window.location = "formarequipo.php?noControlA=" + noControlA + '&nombre=' + nombre + '&paterno=' + paterno + '&materno=' + materno + '&folio=' + folio + '&proposito=' + propositoFinal;
                if (campos.nombre && campos.paterno && campos.materno) {
                    noControlA.push(document.getElementById('noControl').value)
                    nombre.push(document.getElementById('nombre').value)
                    paterno.push(document.getElementById('paterno').value)
                    materno.push(document.getElementById('materno').value)
                        /* nombre += ' ' + document.getElementById('nombre').value
                         paterno += ' ' + document.getElementById('paterno').value
                         materno += ' ' + document.getElementById('materno').value*/
                        /*    noControlA += ' ' + document.getElementById('noControl').value
                            nombre += ' ' + document.getElementById('nombre').value
                            paterno += ' ' + document.getElementById('paterno').value
                            materno += ' ' + document.getElementById('materno').value*/
                    console.log(noControl)
                    console.log(nombre)
                    console.log(paterno)
                    console.log(materno)

                }
                //window.location.href = "registroasesor.php"
            } else {
                document.getElementById("mensaje").innerHTML = "<p>El campo proposito es incorrecto</p>";
                document.getElementById('mensajeCont').classList.remove('div')
                document.getElementById('mensajeCont').classList.remove('div.ocultar')
            }
        }
    }
})