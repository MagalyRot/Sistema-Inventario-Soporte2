$(document).ready(function() {
    var cat_id, opcion;
    var dataTable = $('#datos_categorias').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "obtener_categorias.php",
            type: "POST"
        },
        "columnsDefs": [{
            "targets": [0,2],
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
    //submit para agregar categorías
    $('#formCategorias').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        categoria1   = $.trim($('#categoria1').val());       
            $.ajax({
              url: "categoriasModel.php",
              type: "POST",
              datatype:"json",    
              data:  {cat_id:cat_id, categoria1:categoria1, opcion:opcion},    
              success: function(data) {
                dataTable.ajax.reload(null, false);
               }
            });			        
        $('#modalCrearCategoria').modal('hide');		
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
    cat_id=null;
    $("#formCategorias").trigger("reset");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Agregar Categoría");
    $('#modalCrearCategoria').modal('show');	    
  });
  
  
  // EDITAR ARTICULOS
  $('#formEditarCategorias').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    categoria   = $.trim($('#categoria').val()); 
    id          = $.trim($('#id').val());                           
    $.ajax({
             url: "categoriasModel.php",
             type: "POST",
             datatype:"json",    
             data:  {id:id,categoria:categoria,opcion:opcion},    
                 success: function(data) {
                 dataTable.ajax.reload(null, false);
                 }
           });			        
    $('#modalCategoria').modal('hide');		
    Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Categoría Actualizada',
        showConfirmButton: false,
        timer: 1500,
        
      })									     			
  });
  
  //EVENTO PARA ENVIAR LOS DATOS DE UN ARTICULO AL FORMULARIO PARA SU ACTUALIZACIÓN      
  $(document).on("click", ".btnEditar", function(){	
    var cat_id  = $(this).attr("id");	           //Obtención del ID del artículo desde botón editar       
    opcion      = 2;                               // Opción editar
    fila        = $(this).closest("tr");	                  
    categoria   = fila.find('td:eq(0)').text();
    $("#categoria").val(categoria);
    $("#id").val(cat_id);
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Categoría");		
    $('#modalCategoria').modal('show');	
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
                url: "categoriasModel.php",
                type: "POST",
                datatype:"json",    
                data:  { id:id,opcion:opcion},    
                success: function(data) {
                  dataTable.ajax.reload(null, false);
                  }
              });	
          swalWithBootstrapButtons.fire(
            'Registro Eliminado',
            'La categoría se ha eliminado correctamente',
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