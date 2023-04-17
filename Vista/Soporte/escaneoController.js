const getValueInput = () =>{
    let inputValue1 = document.querySelector("#fecha").value; 
//alert(inputValue1);
    $("#fechaEntrega").val(inputValue1); 
    document.querySelector("#valueInput").innerHTML = `${inputValue1}`;  
  }