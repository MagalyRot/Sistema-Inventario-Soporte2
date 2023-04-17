$(document).ready(function() {
    var ruta_id3, opcion;
    var dataTable = $('#datos_ruta').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "obtener_rutas2.php",
            type: "POST"
        },
        "columnsDefs": [{
            "targets": [0,3],
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
    $('#formRutaRed').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        vlan3      = $.trim($('#vlan3').val());    
        segmento3  = $.trim($('#segmento3').val());
        nodo3      = $.trim($('#nodo3').val());    
        panel3     = $.trim($('#panel3').val());    
        puerto3    = $.trim($('#puerto3').val());
                        

            $.ajax({
              url: "rutaRedModel.php",
              type: "POST",
              datatype:"json",    
              data:  {ruta_id3:ruta_id3,vlan3:vlan3, segmento3:segmento3,panel3:panel3,nodo3:nodo3,puerto3:puerto3,opcion:opcion},    
              success: function(data) {
                dataTable.ajax.reload(null, false);
               }
            });			        
        $('#modalCrearRutaRed').modal('hide');		
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
    ruta_id3=null;  
    $("#formRutaRed").trigger("reset");
    $(".modal-header").css( "color", "white" );
    $(".modal-title1").text("Agregar ruta de red");
    $('#modalCrearRutaRed').modal('show');	    
  });

     //EVENTO PARA ENVIAR LOS DATOS DE EQUIPOS AL MODAL EQUIPOS     
  $(document).on("click", ".btnVer", function(){
    var ruta  = $(this).attr("id");   
       
    $("#id").val(ruta); 	
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Equipos de cómputo Asignados");		
    $('#modalEquiposAsignados').modal('show');	
  });

  //EVENTO PARA ENVIAR LOS DATOS DE RUTA    
  $(document).on("click", ".btnEditar", function(){
    var ruta  = $(this).attr("id");
    	    
   // $("#id").val(ruta); 	
    $(".modal-header").css("color", "white" );
    $(".modal-title2").text("Editar Ruta");		
    $('#modalEditarRutaRed').modal('show');	
  });

  //DAR DE BAJA UN RUTA
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
              url: "rutaRedModel.php",
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