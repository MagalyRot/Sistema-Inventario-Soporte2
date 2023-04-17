$(document).ready(function() {
    var prov_id, opcion;
    var dataTable = $('#datos_proveedores').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "obtener_proveedores.php",
            type: "POST"
        },
        "columnsDefs": [{
            "targets": [0,5],
            "orderable": false,
        }, ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });

    var fila;
    //submit para agregar proveedores
    $('#formProveedores').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        nombre1    = $.trim($('#nombre1').val()); 
        direccion1 = $.trim($('#direccion1').val()); 
        telefono1  = $.trim($('#telefono1').val()); 
        email1     = $.trim($('#email1').val());       
            $.ajax({
              url: "proveedoresModel.php",
              type: "POST",
              datatype:"json",    
              data:  {prov_id:prov_id,nombre1:nombre1, direccion1:direccion1, telefono1:telefono1,  email1:email1, opcion:opcion},    
              success: function(data) {

                dataTable.ajax.reload(null, false);
               }
            });			 

        $('#modalProveedores').modal('hide');		
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Guardado correctamente',
            showConfirmButton: false,
            timer: 1500,
            
          })									     			
    });

    // limpiar campos
    $("#limpiarCampos").click(function(){
           opcion = 1; //alta           
           prov_id=null;
           $("#formProveedores").trigger("reset");
           $(".modal-header").css( "color", "white" );
           $(".modal-title").text("Agregar Categoría");
           $('#modalProveedores').modal('show');	    
    });

 // EDITAR PROVEEDORES
$('#formEditarProveedores').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombre     = $.trim($('#nombre').val()); 
    direccion  = $.trim($('#direccion').val()); 
    telefono   = $.trim($('#telefono').val()); 
    email      = $.trim($('#email').val());  
    id         = $.trim($('#id').val());                        
    $.ajax({
             url: "proveedoresModel.php",
             type: "POST",
             datatype:"json",    
             data:  {id:id,nombre:nombre,direccion:direccion, telefono:telefono,  email:email, opcion:opcion},    
                 success: function(data) {
                 dataTable.ajax.reload(null, false);
                 }
           });			        
    $('#modalEditarProveedores').modal('hide');		
    Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Proveedor Actualizado',
        showConfirmButton: false,
        timer: 1500,
        
      })									     			
});

//EVENTO PARA ENVIAR LOS DATOS DE UN ARTICULO AL FORMULARIO PARA SU ACTUALIZACIÓN      
$(document).on("click", ".btnEditar", function(){	
    var cat_id  = $(this).attr("id");	           //Obtención del ID del artículo desde botón editar       
    opcion      = 2;                               // Opción editar
    fila        = $(this).closest("tr");	                  
    nombre   = fila.find('td:eq(0)').text();
    direccion   = fila.find('td:eq(1)').text();
    telefono   = fila.find('td:eq(2)').text();
    email   = fila.find('td:eq(3)').text();
    $("#nombre").val(nombre);
    $("#direccion").val(direccion);
    $("#telefono").val(telefono);
    $("#email").val(email);
    $("#id").val(cat_id);
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Categoría");		
    $('#modalEditarProveedores').modal('show');	
});
 

//DAR DE BAJA UN ARTÍCULO
$(document).on("click", ".btnBorrar", function(){
    var id  = $(this).attr("id");
    fila = $(this);           
    //user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; 
    //dar de baja        
   /* var respuesta = confirm("¿Está seguro de borrar el registro"+id+"?");                
    if (respuesta) {            
        $.ajax({
          url: "articulosModel.php",
          type: "POST",
          datatype:"json",    
          data:  { id:id,opcion:opcion},    
          success: function(data) {
            dataTable.ajax.reload(null, false);
            }
        });	
    }
    */
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: '¿Estás seguro de eliminarlo?',
        text: "Una vez aceptado, el registro no podrá ser recuperado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: ' Sí',
        cancelButtonText: 'No, Cancelar',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "proveedoresModel.php",
                type: "POST",
                datatype:"json",    
                data:  { id:id,opcion:opcion},    
                success: function(data) {
                  dataTable.ajax.reload(null, false);
                  }
              });	
          swalWithBootstrapButtons.fire(
            'Registro Eliminado',
            'Proveedor eliminado correctamente',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelar',
            'El registro sigue vigente',
            'error'
          )
        }
      })
    
 });

   
});