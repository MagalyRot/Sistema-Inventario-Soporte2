$(document).ready(function() {
    var vlan_id, opcion;
    var dataTable = $('#datos_vlans').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "obtenerVlans.php",
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
    //submit para agregar VLAN
    $('#formVlans').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        vlan      = $.trim($('#vlan').val());    
            $.ajax({
              url: "vlansModel.php",
              type: "POST",
              datatype:"json",    
              data:  {vlan_id:vlan_id,vlan:vlan,opcion:opcion},    
              success: function(data) {
                dataTable.ajax.reload(null, false);
               }
            });			        
        $('#modalCrearVlan').modal('hide');		
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
    vlan_id=null;  
    $("#formVlans").trigger("reset");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Agregar VLAN");
    $('#modalCrearVlan').modal('show');	    
  });

    // EDITAR ARTICULOS
    $('#formEditarVlans').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
       
        vlan       = $.trim($('#vlan2').val());    
        id          = $.trim($('#id').val());                           
        $.ajax({
                 url: "vlansModel.php",
                 type: "POST",
                 datatype:"json",    
                 data:  {id:id, vlan:vlan, opcion:opcion},    
                     success: function(data) {
                     dataTable.ajax.reload(null, false);
                     }
               });			        
        $('#modalEditarVlan').modal('hide');		
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Artículo Actualizado',
            showConfirmButton: false,
            timer: 1500,
            
          })									     			
      });
      
      
      //EVENTO PARA ENVIAR LOS DATOS DE UNS VLAN AL FORMULARIO PARA SU ACTUALIZACIÓN      
      $(document).on("click", ".btnEditar", function(){	
        var vlan_id  = $(this).attr("id");	           //Obtención del ID del artículo desde botón editar   
        opcion      = 2;                               // Opción editar
        fila        = $(this).closest("tr");	                  
        vlan        = fila.find('td:eq(0)').text();    //obtención de datos de una fila
        $("#vlan2").val(vlan);                        //Añade la info del artículo al formulario
        $("#id").val(vlan_id);
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar VLAN");		
        $('#modalEditarVlan').modal('show');	
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
        confirmButtonText: ' Aceptar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "vlansModel.php",
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