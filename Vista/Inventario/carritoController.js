$(document).ready(function() {
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

});