$(document).ready(function() {
    var art_id, opcion;
    // TABLA DE ARTÍCULOS DISPONIBLES
    var dataTable = $('#datos_articulos').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "articulos_obtener.php",
            type: "POST"
        },
        "columnsDefs": [{
            "targets": [0,9],
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
    
// TABLA DE ARTÍCULOS OCUPADOS
    var dataTable2 = $('#datos_artOcupados').DataTable({
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
          url: "articulosOcupados.php",
          type: "POST"
      },
      "columnsDefs": [{
          "targets": [0,9],
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

  // TABLA DE ARTÍCULOS INACTIVOS
  var dataTable2 = $('#datos_artInactivos').DataTable({
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        url: "articulosNoDisponibles.php",
        type: "POST"
    },
    "columnsDefs": [{
        "targets": [0,9],
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
    //submit para agregar articulos
    $('#formArticulos').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        folio1       = $.trim($('#folio1').val());    
        nombre1      = $.trim($('#nombre1').val());
        marca1       = $.trim($('#marca1').val());    
        modelo1      = $.trim($('#modelo1').val());    
        num_poliza1  = $.trim($('#num_poliza1').val());
        categoria1   = $.trim($('#categoria1').val()); 
        proveedor1   = $.trim($('#proveedor1').val());
        descripcion1 = $.trim($('#descripcion1').val());                           
            $.ajax({
              url: "articulosModel.php",
              type: "POST",
              datatype:"json",    
              data:  {art_id:art_id, folio1:folio1, nombre1:nombre1, marca1:marca1, modelo1:modelo1, num_poliza1:num_poliza1 ,categoria1:categoria1,proveedor1:proveedor1, descripcion1:descripcion1, opcion:opcion},    
              success: function(data) {
                dataTable.ajax.reload(null, false);
               }
            });			        
        $('#modalArticulo').modal('hide');		
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
    art_id=null;
    $("#formArticulos").trigger("reset");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Agregar Artículo");
    $('#modalArticulo').modal('show');	    
  });
  
  // EDITAR ARTICULOS
  $('#formEditaArticulos').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
   
    folio       = $.trim($('#folio').val());    
    nombre      = $.trim($('#nombre').val());
    marca       = $.trim($('#marca').val());    
    modelo      = $.trim($('#modelo').val());    
    num_poliza  = $.trim($('#num_poliza').val());
    categoria   = $.trim($('#categoria').val()); 
    proveedor   = $.trim($('#proveedor').val());
    descripcion = $.trim($('#descripcion').val()); 
    id          = $.trim($('#id').val());                           
    $.ajax({
             url: "articulosModel.php",
             type: "POST",
             datatype:"json",    
             data:  {id:id, folio:folio, nombre:nombre, marca:marca, modelo:modelo, num_poliza:num_poliza ,categoria:categoria,proveedor:proveedor, descripcion:descripcion, opcion:opcion},    
                 success: function(data) {
                 dataTable.ajax.reload(null, false);
                 }
           });			        
    $('#modalEditarArticulo').modal('hide');		
    Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Artículo Actualizado',
        showConfirmButton: false,
        timer: 1500,
        
      })									     			
  });
  
  
  //EVENTO PARA ENVIAR LOS DATOS DE UN ARTICULO AL FORMULARIO PARA SU ACTUALIZACIÓN      
  $(document).on("click", ".btnEditar", function(){	
    var art_id  = $(this).attr("id");	           //Obtención del ID del artículo desde botón editar  
         
    opcion      = 2;                               // Opción editar
    fila        = $(this).closest("tr");	                  
    folio       = fila.find('td:eq(0)').text();    //obtención de datos de una fila
    nombre      = fila.find('td:eq(1)').text();
    modelo      = fila.find('td:eq(2)').text();
    marca       = fila.find('td:eq(3)').text();
    descripcion = fila.find('td:eq(4)').text();
    num_poliza  = fila.find('td:eq(5)').text();
    proveedor   = fila.find('td:eq(6)').text();
    categoria   = fila.find('td:eq(7)').text();
  
    $("#folio").val(folio);                        //Añade la info del artículo al formulario
    $("#nombre").val(nombre);
    $("#modelo").val(modelo);
    $("#marca").val(marca);
    $("#descripcion").val(descripcion);
    $("#num_poliza").val(num_poliza);
    $("#proveedor").val(proveedor);
    $("#categoria").val(categoria);
    $("#id").val(art_id);
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Artículo");		
    $('#modalEditarArticulo').modal('show');	
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
                url: "articulosModel.php",
                type: "POST",
                datatype:"json",    
                data:  { id:id,opcion:opcion},    
                success: function(data) {
                  dataTable.ajax.reload(null, false);
                  }
              });	
          swalWithBootstrapButtons.fire(
            'Registro Eliminado',
            'El artículo se ha eliminado correctamente',
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
  
  