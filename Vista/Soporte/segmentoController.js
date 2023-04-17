$(document).ready(function() {
    var seg_id, opcion;
    var dataTable = $('#datos_segmentos').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "obtenerSegmentos.php",
            type: "POST"
        },
        "columnsDefs": [{
            "targets": [0,4],
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
    //submit para agregar ruta de red
    $('#formSegmentos').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        segmento     = $.trim($('#segmento').val());
        num_segmento = $.trim($('#num_segmento').val());   
                        
            $.ajax({
              url: "segmentosModel.php",
              type: "POST",
              datatype:"json",    
              data:  {seg_id:seg_id,segmento:segmento,num_segmento:num_segmento,opcion:opcion},    
              success: function(data) {
                dataTable.ajax.reload(null, false);
               }
            });			        
        $('#modalCrearSegmento').modal('hide');		
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
    rut_id=null;  
    $("#formSegmentos").trigger("reset");
    $(".modal-header").css( "color", "white" );
    $(".modal-title1").text("Agregar ruta de red");
    $('#modalCrearSegmento').modal('show');	    
  });

     //EVENTO PARA ENVIAR LOS DATOS DE EQUIPOS AL MODAL EQUIPOS     
  $(document).on("click", ".btnVer", function(){
    var ruta  = $(this).attr("id");	    
    $("#id").val(ruta); 	
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Equipos de cómputo Asignados");		
    $('#modalEquiposAsignados').modal('show');	
  });


 //DAR DE BAJA UN SEGMENTO
 $(document).on("click", ".btnBorrar", function(){
  var id  = $(this).attr("id");
  fila = $(this);           	
  opcion = 3; 
  //dar de baja        
 
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
              url: "segmentosModel.php",
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