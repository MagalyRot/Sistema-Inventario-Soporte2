// *********************************************************************************************************************//
//LLAMA LAS FUNCIONES AL TECLEAR EL INPUT CORRESPONDIENTE
document.getElementById("campo").addEventListener("keyup", getCodigos)
document.getElementById("campoeqc").addEventListener("keyup", getCodigosEquipos)

// *********************************************************************************************************************//
// OBTENER LOS DATOS DE PERSONAL PARA PODER SELECCIONAR UNO
function getCodigos() {
    let inputCP = document.getElementById("campo").value
    let lista = document.getElementById("lista")

    if (inputCP.length > 0) { //debe de haber por lo menos un caracter para mostrar

        let url = "inc/getCodigos.php"
        let formData = new FormData()
        formData.append("campo", inputCP)

        fetch(url, {
            method: "POST", 
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => { 
                lista.style.display = 'block'
                lista.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none' //Para que no se vea la lista 
    }
}

// OBTENER LOS EQUIPOS DE COMPUTO EN FORMA DE LISTA PARA SELECCIONAR UNO
function getCodigosEquipos() {
    let inputeqc = document.getElementById("campoeqc").value
    let listaeqc = document.getElementById("listaeqc")

    if (inputeqc.length > 0) { //debe de haber por lo menos un caracter para mostrar

        let url = "inc/getCodigosEquipos.php"
        let formData = new FormData()
        formData.append("campoeqc", inputeqc)

        fetch(url, {
            method: "POST", 
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                listaeqc.style.display = 'block'
                listaeqc.innerHTML = data
            })
            .catch(err => console.log(err))
    } else {
        listaeqc.style.display = 'none' //Para que no se vea la lista 
    }
}


// *********************************************************************************************************************//
//VALORES DE PERSONAL 
function mostrar(id,trabajador,name,ap,tipo,area) {
    lista.style.display = 'none'
    document.getElementById('campo').value=trabajador;
    document.getElementById('id').value=id;
    document.getElementById('ntrabajador').value=trabajador;
    document.getElementById('name').value=name;
    document.getElementById('ap').value=ap;
    document.getElementById('tipo').value=tipo;
    document.getElementById('area').value=area;
}

function mostrareqc(id,folio) {
    listaeqc.style.display = 'none'
    document.getElementById('ideqc').value=id;
    document.getElementById('campoeqc').value=folio;
    // document.getElementById('folioeqc').value=folio;

}

const campo = document.getElementById('campo');
const boton1 = document.getElementById('next1');

campo.addEventListener('input', function() {
if (campo.value.length > 0) {
    boton1.disabled = false;
} else {
    boton1.disabled = true;
}
});


//Segunda pantalla solicitar mantenimiento
const tipo_mant = document.getElementById('tipo_mant');
const campoeqc = document.getElementById('campoeqc');
const boton2 = document.getElementById('next2');

tipo_mant.addEventListener('select', validarCampos);
campoeqc.addEventListener('input',validarCampos); 

function validarCampos(){
if (input2.value.length > 0 && input3.value > 0) {
    boton2.disabled = false;
} else {
    boton2.disabled = true;
}
}

