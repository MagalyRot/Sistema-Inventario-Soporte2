//TEMPORAL
function ShowSelected()
{
/* Para obtener el valor */
var cod = document.getElementById("ubicacion").value;
$("#id_ubicacion").val(cod); 
var combo = document.getElementById("ubicacion");
var selected = combo.options[combo.selectedIndex].text;
//$("#nombrePersona").val(selected);
document.querySelector("#ubi").innerHTML = `${selected}`;  
}
//PERMANENTE
function ShowSelected2()
{
/* Para obtener el valor */
var cod = document.getElementById("ubicacion2").value;
$("#id_ubicacion2").val(cod); 
var combo = document.getElementById("ubicacion2");
var selected = combo.options[combo.selectedIndex].text;
//$("#nombrePersona").val(selected);
document.querySelector("#ubi2").innerHTML = `${selected}`;  
}

function Datosadministrativo(info)
{
    const obtener=info.split("-");
    var id_per1=obtener[0];
    console.log(id_per1);
    var numTrabajador=obtener[1];
    var nombre=obtener[2];
    console.log(numTrabajador);
    document.querySelector("#numeroT").innerHTML = `${numTrabajador}`;
    document.querySelector("#nombrePersona").innerHTML = `${nombre}`;     
    $("#idTrabajador").val(id_per1); 
/* Para obtener el valor */
}
const getValueInput = () =>{
    let inputValue1 = document.querySelector("#fecha").value; 
//alert(inputValue1);
    $("#fechaEntrega").val(inputValue1); 
    document.querySelector("#valueInput").innerHTML = `${inputValue1}`;  
  }

  const getValueInput2 = () =>{
    let inputValue1 = document.querySelector("#fecha2").value; 
   //alert(inputValue1);
    $("#fechaEntrega2").val(inputValue1); 
    document.querySelector("#valueInput2").innerHTML = `${inputValue1}`;  
  }

  function Datosadministrativo2(info)
{
    const obtener=info.split("-");
    var id_per1=obtener[0];
    console.log(id_per1);
    var numTrabajador=obtener[1];
    var nombre=obtener[2];
    console.log(numTrabajador);
    document.querySelector("#numeroT2").innerHTML = `${numTrabajador}`;
    document.querySelector("#nombrePersona2").innerHTML = `${nombre}`;     
    $("#idTrabajador2").val(id_per1); 
/* Para obtener el valor */
}



