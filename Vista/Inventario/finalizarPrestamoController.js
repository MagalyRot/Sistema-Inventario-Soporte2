$(document).ready(function() {
    var cat_id, opcion;
    //TABLA DE PRÉSTAMOS PERMANENTES
    var dataTable = $('#tabla_permanentes').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "obtener_asignacionP.php",
            type: "POST"
        },
        "columnsDefs": [{
            "targets": [0,6],
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


// TABLA DE PRÉSTAMOS TEMPORALES
    var dataTable = $('#tabla_temporales').DataTable({
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
          url: "obtener_asignacionT.php",
          type: "POST"
      },
      "columnsDefs": [{
          "targets": [0,6],
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


  // TABLA DE PRÉSTAMOS FINALIZADOS
  var dataTable = $('#tabla_finalizados').DataTable({
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        url: "obtener_asignacionF.php",
        type: "POST"
    },
    "columnsDefs": [{
        "targets": [0,6],
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

  // TABLA DE PRÉSTAMOS CANCELADOS
  var dataTable = $('#tabla_cancelados').DataTable({
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        url: "obtener_asignacionC.php",
        type: "POST"
    },
    "columnsDefs": [{
        "targets": [0,6],
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

//********************* BOTONES DE TABLA PERMANENTES ******************************** */
     //CLICK AL BOTON VER EQUIPOS
  $('#tabla_permanentes').on('click', '.Verbtn ', function(event) {
    var dataTableUsuarios = $('#tabla_permanentes').DataTable();
    var trid              = $(this).closest('tr').attr('id');
    var id                = $(this).data('id');
    $('#modalComponentes').modal('show');
    $("#Componentes").empty();
    $.ajax({
      url: "getEquipoArt.php",
      data: {
        id: id 
      },
      type: 'post',
        success: function (data) {
            $('#Componentes').append(data);
        }
    })
  })

    //CLICK AL BOTON VER EQUIPOS
    $('#tabla_permanentes').on('click', '.VerbtnE ', function (event) {
        var dataTableUsuarios = $('#tabla_permanentes').DataTable();
        var trid = $(this).closest('tr').attr('id');
        var id = $(this).data('id');
        $('#modalEquipos').modal('show');
        $("#Equipos").empty();
        $.ajax({
            url: "getEquipo.php",
            data: {
                id: id
            },
            type: 'post',
            success: function (data) {
                $('#Equipos').append(data);
            }
        })
    })

    //CLICK AL BOTON VER PERSONAL
    $('#tabla_permanentes').on('click', '.VerbtnP ', function (event) {
        var dataTableUsuarios = $('#tabla_permanentes').DataTable();
        var trid = $(this).closest('tr').attr('id');
        var id = $(this).data('id');
        $('#modalPersonal').modal('show');
        $("#Personal").empty();
        $.ajax({
            url: "getPersonal.php",
            data: {
                id: id
            },
            type: 'post',
            success: function (data) {
                $('#Personal').append(data);
            }
        })
    })

      //FINALIZAR UN PRÉSTAMO PERMANENTE
  $(document).on("click", ".Finbtn", function(){
    var id  = $(this).attr("id");
    fila = $(this);           		
    opcion = 1; 
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: '¿Estás seguro de Finalizar?',
        text: "Una vez aceptado, no se revertirán los cambios",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: ' Sí',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "prestamosModel2.php",
                type: "POST",
                datatype:"json",    
                data:  { id:id,opcion:opcion},    
                success: function(data) {
                  dataTable.ajax.reload(null, false);
                  }
              });	
          swalWithBootstrapButtons.fire(
            'Finalizado',
            'El préstamo ha sido finalizado',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelar',
            'El préstamo sigue vigente',
            'error'
          )
        }
      })
    
  });

      //CANCELAR UN PRÉSTAMO PERMANENTE
      $(document).on("click", ".Cancelbtn", function(){
        var id  = $(this).attr("id");
        fila = $(this);           		
        opcion = 2; 
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: '¿Estás seguro de cancelarlo?',
            text: "Una vez cancelado, los cambios no se podrán revertir",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: ' Sí',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "prestamosModel2.php",
                    type: "POST",
                    datatype:"json",    
                    data:  { id:id,opcion:opcion},    
                    success: function(data) {
                      dataTable.ajax.reload(null, false);
                      }
                  });	
              swalWithBootstrapButtons.fire(
                'Cancelado',
                'El préstamo ha sido cancelado',
                'success'
              )
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelar'
              )
            }
          })
        
      });

//********************* BOTONES DE TABLA TEMPORALES ******************************** */
     //CLICK AL BOTON VER ARTÍCULOS
     $('#tabla_temporales').on('click', '.Verbtn ', function(event) {
      var dataTableUsuarios = $('#tabla_temporales').DataTable();
      var trid              = $(this).closest('tr').attr('id');
      var id                = $(this).data('id');
      $('#modalComponentes').modal('show');
      $("#Componentes").empty();
      $.ajax({
        url: "getEquipoArt.php",
        data: {
          id: id 
        },
        type: 'post',
          success: function (data) {
              $('#Componentes').append(data);
          }
      })
    })
  
      //CLICK AL BOTON VER EQUIPOS
      $('#tabla_temporales').on('click', '.VerbtnE ', function (event) {
          var dataTableUsuarios = $('#tabla_temporales').DataTable();
          var trid = $(this).closest('tr').attr('id');
          var id = $(this).data('id');
          $('#modalEquipos').modal('show');
          $("#Equipos").empty();
          $.ajax({
              url: "getEquipo.php",
              data: {
                  id: id
              },
              type: 'post',
              success: function (data) {
                  $('#Equipos').append(data);
              }
          })
      })
  
      //CLICK AL BOTON VER PERSONAL
      $('#tabla_temporales').on('click', '.VerbtnP ', function (event) {
          var dataTableUsuarios = $('#tabla_temporales').DataTable();
          var trid = $(this).closest('tr').attr('id');
          var id = $(this).data('id');
          $('#modalPersonal').modal('show');
          $("#Personal").empty();
          $.ajax({
              url: "getPersonal.php",
              data: {
                  id: id
              },
              type: 'post',
              success: function (data) {
                  $('#Personal').append(data);
              }
          })
      })

//********************* BOTONES DE TABLA FINALIZADOS ******************************** */
     //CLICK AL BOTON VER ARTÍCULOS
     $('#tabla_finalizados').on('click', '.Verbtn ', function(event) {
      var dataTableUsuarios = $('#tabla_finalizados').DataTable();
      var trid              = $(this).closest('tr').attr('id');
      var id                = $(this).data('id');
      $('#modalComponentes').modal('show');
      $("#Componentes").empty();
      $.ajax({
        url: "getEquipoArt.php",
        data: {
          id: id 
        },
        type: 'post',
          success: function (data) {
              $('#Componentes').append(data);
          }
      })
    })
  
      //CLICK AL BOTON VER EQUIPOS
      $('#tabla_finalizados').on('click', '.VerbtnE ', function (event) {
          var dataTableUsuarios = $('#tabla_finalizados').DataTable();
          var trid = $(this).closest('tr').attr('id');
          var id = $(this).data('id');
          $('#modalEquipos').modal('show');
          $("#Equipos").empty();
          $.ajax({
              url: "getEquipo.php",
              data: {
                  id: id
              },
              type: 'post',
              success: function (data) {
                  $('#Equipos').append(data);
              }
          })
      })
  
      //CLICK AL BOTON VER PERSONAL
      $('#tabla_finalizados').on('click', '.VerbtnP ', function (event) {
          var dataTableUsuarios = $('#tabla_finalizados').DataTable();
          var trid = $(this).closest('tr').attr('id');
          var id = $(this).data('id');
          $('#modalPersonal').modal('show');
          $("#Personal").empty();
          $.ajax({
              url: "getPersonal.php",
              data: {
                  id: id
              },
              type: 'post',
              success: function (data) {
                  $('#Personal').append(data);
              }
          })
      })
 //********************* BOTONES DE TABLA CANCELADOS ******************************** */
     //CLICK AL BOTON VER ARTÍCULOS
     $('#tabla_cancelados').on('click', '.Verbtn ', function(event) {
      var dataTableUsuarios = $('#tabla_cancelados').DataTable();
      var trid              = $(this).closest('tr').attr('id');
      var id                = $(this).data('id');
      $('#modalComponentes').modal('show');
      $("#Componentes").empty();
      $.ajax({
        url: "getEquipoArt.php",
        data: {
          id: id 
        },
        type: 'post',
          success: function (data) {
              $('#Componentes').append(data);
          }
      })
    })
  
      //CLICK AL BOTON VER EQUIPOS
      $('#tabla_cancelados').on('click', '.VerbtnE ', function (event) {
          var dataTableUsuarios = $('#tabla_cancelados').DataTable();
          var trid = $(this).closest('tr').attr('id');
          var id = $(this).data('id');
          $('#modalEquipos').modal('show');
          $("#Equipos").empty();
          $.ajax({
              url: "getEquipo.php",
              data: {
                  id: id
              },
              type: 'post',
              success: function (data) {
                  $('#Equipos').append(data);
              }
          })
      })
  
      //CLICK AL BOTON VER PERSONAL
      $('#tabla_cancelados').on('click', '.VerbtnP ', function (event) {
          var dataTableUsuarios = $('#tabla_cancelados').DataTable();
          var trid = $(this).closest('tr').attr('id');
          var id = $(this).data('id');
          $('#modalPersonal').modal('show');
          $("#Personal").empty();
          $.ajax({
              url: "getPersonal.php",
              data: {
                  id: id
              },
              type: 'post',
              success: function (data) {
                  $('#Personal').append(data);
              }
          })
      })

});