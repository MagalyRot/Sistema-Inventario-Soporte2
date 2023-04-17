// ******************************************************************************************************** */
//                              FUNCIONES PARA FINALIZAR EL MANTENIMIENTO
// ******************************************************************************************************** */
$(document).ready(function() {
  var cat_id, opcion;

  
  //******************************************************************************************************** */
  //LLAMA LOS DATOS QUE SON DE LOS MANTENIMIENTOS SOLICITADOS LOS CUALES SIGUEN PENDIENTES
  var dataTableSmantenimiento = $('#smantenimiento').DataTable({
    "responsive"    : true,
    "processing"    : true,
    "serverSide"    : true,
    "order"         : [],
    "ajax"          : {
        url         : "obtener_solicitudmantenimiento.php", 
        type        : "POST"
    },
    "columnsDefs"     : [{
        "targets"     : [,8,9,10],
        "orderable"   : false,
      }, 
    ],
    "language": {
        "lengthMenu"  : "Mostrar _MENU_ registros",
        "zeroRecords" : "No se encontraron resultados",
        "info"        : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty"   : "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch"     : "Buscar:",
        "oPaginate"   : {
            "sFirst"  : "Primero",
            "sLast"   : "Último",
            "sNext"   : "Siguiente",
            "sPrevious": "Anterior"
         },
         "sProcessing":"Procesando...",
    }
  });

  //LLAMA LOS DATOS DE LOS MANTENIMIENTOS QUE FUERON FINALIZADOS
  var dataTableFmantenimientos = $('#fmantenimientos').DataTable({
    "responsive"    : true,
    "processing"    : true,
    "serverSide"    : true,
    "order"         : [],
    "ajax"          : {
        url         : "obtener_mantenimientosfinalizados.php", 
        type        : "POST"
    },
    "columnsDefs"     : [{
        "targets"     : [0,10],
        "orderable"   : false,
      }, 
    ],
    "language": {
        "lengthMenu"  : "Mostrar _MENU_ registros",
        "zeroRecords" : "No se encontraron resultados",
        "info"        : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty"   : "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch"     : "Buscar:",
        "oPaginate"   : {
            "sFirst"  : "Primero",
            "sLast"   : "Último",
            "sNext"   : "Siguiente",
            "sPrevious": "Anterior"
         },
         "sProcessing":"Procesando...",
    }
  });

  //LLAMA LOS DATOS DE LOS MANTENIMIENTOS CANCELADOS
  var dataTableCmantenimientos = $('#cmantenimientos').DataTable({
    "responsive"    : true,
    "processing"    : true,
    "serverSide"    : true,
    "order"         : [],
    "ajax"          : {
        url         : "obtener_mantenimientosCancelados.php", 
        type        : "POST"
    },
    "columnsDefs"     : [{
        "targets"     : [0,12],
        "orderable"   : false,
      }, 
    ],
    "language": {
        "lengthMenu"  : "Mostrar _MENU_ registros",
        "zeroRecords" : "No se encontraron resultados",
        "info"        : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty"   : "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch"     : "Buscar:",
        "oPaginate"   : {
            "sFirst"  : "Primero",
            "sLast"   : "Último",
            "sNext"   : "Siguiente",
            "sPrevious": "Anterior"
         },
         "sProcessing":"Procesando...",
    }
  });

  //********************************************************************************************************** */
  //CLICK AL BOTON CANCELARMANT TABLA DE SOLICITUD DE MANTENIMIENTOS
  $('#smantenimiento').on('click', '.cancelarMant ', function(event) {
    var dataTableSmantenimiento = $('#smantenimiento').DataTable();
    var trid              = $(this).closest('tr').attr('id');
    var id                = $(this).data('id');
    // $("#addcancelarM_Modal").trigger("reset");
    $('#addcancelarM_Modal').modal('show');
          
  
    $.ajax({
      url: "obtenerMantenimiento.php",
      data: {
        id: id 
      },
      type: 'post',
      success: function(data) {
        var json = JSON.parse(data);


        $('#cancelFolio').val(json.folio_mant);
        $('#cancelid').val(id);
        $('#trid').val(trid); 
      }
    })
  })

  //CANCELAR MANTENIMIENTO
  $(document).on('submit', '#cancelarS_Mant', function(e) {
  e.preventDefault();
  var cancelid           = $('#cancelid').val();
  var cancelid2          = $('#cancelid').val();
  var cancelTecnico      = $('#cancelTecnico').val();
  var cancelObservaciones= $('#cancelObservaciones').val();
  var cancelFecha        = $('#cancelFecha').val();

  if (cancelid != '' && cancelid2 != '' && cancelTecnico != '' && cancelObservaciones != '' && cancelFecha != '') {
    $.ajax({
      url: "detalleMantenimientoCancel.php",
      //url: "cancelar_mantenimiento.php",
      type: "post",
      data: {
        cancelid            : cancelid,
        cancelTecnico       : cancelTecnico,
        cancelObservaciones : cancelObservaciones, 
        cancelFecha         : cancelFecha
      },
      data2: {
        cancelid2           : cancelid2,
      },
     
      success: function(data) {
      dataTableSmantenimiento.ajax.reload(null, false);
      dataTableFmantenimientos.ajax.reload(null, false);
      dataTableCmantenimientos.ajax.reload(null, false);
      //   dataTableInactivos.ajax.reload(null, false);

        var json      = JSON.parse(data);
        var status    = json.status;

        if (status == 'true' ) {
          $('#addcancelarM_Modal').modal('hide');
          $("#cancelarS_Mant").trigger("reset"); 
            Swal.fire({
              position: 'top-center',
              icon: 'success',
              title: 'Guardado correctamente',
              showConfirmButton: false,
              timer: 1500,
          })
          
        } else {}
      }
    });
  } else {  Swal.fire({
    icon    : 'error',
    title   : 'Oops...',
    text    : 'No ingresaste todos los campos!',
  });
  }
  });

  //********************************************************************************************************** */
  //CLICK AL BOTON EDITAR TABLA ADMINISTRADORES
  $('#smantenimientos').on('click', '.editArticulos', function(event) {
    var dataTableSmantenimiento = $('#smantenimientos').DataTable();
    var trid                     = $(this).closest('tr').attr('id');
    var id                   = $(this).data('id');
    $('#editArti').modal('show');
  
    $.ajax({
      url: "obtenerMantenimiento.php",  
      data: {
        id: id 
      },
      type: 'post',
      success: function(data) {
        var json = JSON.parse(data);


        $('#finalFolio').val(json.folio_mant);
        $('#fequipo').val(json.equipo_mant)
        $('#finalid').val(id);
        $('#trid').val(trid); 

        
      }
    })
  })
  //********************************************************************************************************** */
  //CLICK AL BOTON FINALIZARMANT EN LA TABLA DE SOLICITUD DE MANTENIMIENTOS
  $('#smantenimiento').on('click', '.finalizarMant ', function(event) {
    var dataTableSmantenimiento = $('#smantenimiento').DataTable();
    var trid              = $(this).closest('tr').attr('id');
    var id                = $(this).data('id');
    $('#addFinalizarM_Modal').modal('show');
  
    $.ajax({
      url: "obtenerMantenimiento.php",  
      data: {
        id: id 
      },
      type: 'post',
      success: function(data) {
        var json = JSON.parse(data);


        $('#finalFolio').val(json.folio_mant);
        $('#fequipo').val(json.equipo_mant)
        $('#finalid').val(id);
        $('#trid').val(trid); 

        
      }
    })
  })

  //FINALIZAR MANTENIMIENTO
  $(document).on('submit', '#finalizar_Mant', function(e) {
      e.preventDefault();


      var checkbox = document.getElementById("opcion1");
      var opcion1 = checkbox.checked ? checkbox.value : "";
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
        }
      };

      var finalid           = $('#finalid').val();
      var finalTecnico      = $('#finalTecnico').val();
      var finalObservaciones= $('#finalObservaciones').val();
      var finalFecha        = $('#finalFecha').val();
      
      var n_cpu             =$('#n_cpu').val();
      var n_teclado         =$('#n_teclado').val();
      var n_mouse           =$('#n_mouse').val();
      var n_monitor         =$('#n_monitor').val();
      var n_procesador      =$('#n_procesador').val();
      var n_almacenamiento  =$('#n_almacenamiento').val();
      var n_ram             =$('#n_ram').val();
      var n_software        =$('#n_software').val();
      var n_ip              =$('#n_ip').val();
      var n_ruta            =$('#n_ruta').val();


      if (finalid != '' && finalTecnico != '' && finalObservaciones != '' && finalFecha != '' ) {
        $.ajax({
          url: "detalleMantenimientofinal.php",
          //url: "cancelar_mantenimiento.php",
          type: "post",
          data: {
            finalid            : finalid,
            finalTecnico       : finalTecnico,
            finalObservaciones : finalObservaciones,
            finalFecha         : finalFecha,
            opcion1            : opcion1,

            n_cpu             : n_cpu,
            n_teclado         : n_teclado,
            n_mouse           : n_mouse,
            n_monitor         : n_monitor,
            n_procesador      : n_procesador,
            n_almacenamiento  : n_almacenamiento,
            n_ram             : n_ram,
            n_software        : n_software,
            n_ip              : n_ip,
            n_ruta            : n_ruta
          },
    
          success: function(data) {
          dataTableSmantenimiento.ajax.reload(null, false);
          dataTableFmantenimientos.ajax.reload(null, false);
          dataTableCmantenimientos.ajax.reload(null, false);
          //   dataTableInactivos.ajax.reload(null, false);
    
            var json      = JSON.parse(data);
            var status    = json.status;
            if (status    == 'true') {
              $('#addFinalizarM_Modal').modal('hide');
              $("#finalizar_Mant").trigger("reset"); 
              Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'El soporte se ah finalizado correctamente',
                showConfirmButton: false,
                timer: 1500,
                
              })	
            } else {}
          }
        });
      } else {  Swal.fire({
        icon    : 'error',
        title   : 'Oops...',
        text    : 'No ingresaste todos los campos!',
      });
      }
  });
    
  //********************************************************************************************************* */
  // LIMPIAR CAMPOS
  $("#limpiarCampos5").click(function(){
    $("#").trigger("reset");      
  });
  
});

// ******************************************************************************************************** */
// ******************************************************************************************************** */
//                              FUNCIONES PARA SOLICITAR UN MANTENIMIENTO
// ******************************************************************************************************** */




// MOVER DATOS DE UN INPUT A OTRO
// input de equipo
function nextequipo(){
  dato2=document.getElementById('campoeqc').value;
  document.getElementById('equipo_eqc').value=dato2;

  dato1=document.getElementById('tipo_mant').value;
  document.getElementById('tipo_s').value=dato1; 
}

// input observaciones
function nextobservaciones(){
  dato3=document.getElementById('observaeqc').value;
  document.getElementById('observaciones_eqc').value=dato3;

  dato4=document.getElementById('fechaeqc').value;
  document.getElementById('fecha_i').value=dato4;
}

// ACCION DE LIMPIAR LOS INPUTS AL DAR CLIC EN LIMPIAR
function limpiar(){  
  num2=document.getElementById('ntrabajador').value;
  document.getElementById('campo').value="";
}

//AGREGAR DATOS DE USUARIO ADMINISTRATIVO
$(document).on('submit', '#addUser', function(e) {
    e.preventDefault();
    var addnombre_ad      = $('#addnombre_ad').val();
    var addapellidoP_ad   = $('#addapellidoP_ad').val();
    var addapellidoM_ad   = $('#addapellidoM_ad').val();
    var addnTrabajador_ad = $('#addnTrabajador_ad').val();
    var addarea_ad        = $('#addarea_ad').val();
  
    if (addnombre_ad != '' && addapellidoP_ad != '' && addapellidoM_ad != '' && addnTrabajador_ad != '' && addarea_ad != '') {
      $.ajax({
        url: "add_datosAdministrativos.php",
        type: "post",
        data: {
          addnombre_ad      : addnombre_ad,
          addapellidoP_ad   : addapellidoP_ad,
          addapellidoM_ad   : addapellidoM_ad,
          addnTrabajador_ad : addnTrabajador_ad,
          addarea_ad        : addarea_ad ,
        },
        success: function(data) {
        //   dataTableUsuarios.ajax.reload(null, false);
        //   dataTableUsuariosPersonal.ajax.reload(null, false);
        //   dataTableAdministrativos.ajax.reload(null, false);
        //   dataTableInactivos.ajax.reload(null, false);
  
          var json      = JSON.parse(data);
          var status    = json.status;
          if (status    == 'true') {
            $('#modalNuevoSolicitante').modal('hide');
            Swal.fire({
              position: 'top-center',
              icon: 'success',
              title: 'Guardado correctamente',
              showConfirmButton: false,
              timer: 1500,
              
            })	
          } else {}
        }
      });
    } else {  Swal.fire({
      icon    : 'error',
      title   : 'Oops...',
      text    : 'No ingresaste todos los campos!',
    });
    }
});

//********************************************************************************************************* */
// LIMPIAR CAMPOS
$("#limpiarCampos3").click(function(){
    $("#addUser").trigger("reset");      
});

//********************************************************************************************************* */
//AGREGAR MANTENIMIENTO, RELACIONADO CON EL EQUIPO DE CÓMPUTO 
  $(document).on('submit', '#msform', function(e) {
    e.preventDefault();
    
    //var folio_mant  = $('#').val();
    var solicitante   = $('#id').val();
    var tipo_mant     = $('#tipo_mant').val();
    var fecha_mant    = $('#fechaeqc').val();
    var observa_mant  = $('#observaeqc').val();
    var equipo_mant   = $('#ideqc').val();
    // var tecnico_mant  = $('#tecnico').val();
  
    if (solicitante != '' && tipo_mant != '' && observa_mant != '' && equipo_mant != '') {
      $.ajax({
        url: "add_mantenimiento.php",
        type: "post",
        data: {
          //folio_mant   : folio_mant,
          solicitante  : solicitante,
          tipo_mant    : tipo_mant,
          fecha_mant   : fecha_mant,
          observa_mant : observa_mant,
          equipo_mant  : equipo_mant,
          
        },
        success: function(data) {
          // dataTableUsuarios.ajax.reload(null, false);
          // dataTableUsuariosPersonal.ajax.reload(null, false);
          // dataTableAdministrativos.ajax.reload(null, false);
          // dataTableInactivos.ajax.reload(null, false);
  
          var json      = JSON.parse(data);
          var status    = json.status;
          if (status    == 'true') {
          //   $('#addUserModal').modal('hide');
            Swal.fire({
              position: 'top-center',
              icon: 'success',
              title: 'Guardado correctamente',
              showConfirmButton: false,
              timer: 1500,
              
            })	
          } else {}
        }
      });
    } else {  Swal.fire({
      icon    : 'error',
      title   : 'Oops...',
      text    : 'No ingresaste todos los campos!',
    });
    }
  });

//CONFIRMAR MANTENIMIENTO, RELACIONADO CON EL USUARIO QUE SOLICITA CON EL MANTENIMIENTO 
  $(document).on('submit', '#addMant_user', function(e) {
    e.preventDefault();
    
    //var id_mant     = $('#mantenimiento').val();
    var id_user  = $('#id').val();
  
    if (id_user != '' ) { //
      $.ajax({
        url: "add_mant-user.php",
        type: "post",
        data: {
          //id_mant      : id_mant,
          id_user      : id_user,
        },
        success: function(data) {
          // dataTableUsuarios.ajax.reload(null, false);
          // dataTableUsuariosPersonal.ajax.reload(null, false);
          // dataTableAdministrativos.ajax.reload(null, false);
          // dataTableInactivos.ajax.reload(null, false);
  
          var json      = JSON.parse(data);
          var status    = json.status;
          if (status    == 'true') {
          //   $('#addUserModal').modal('hide');
            Swal.fire({
              position: 'top-center',
              icon: 'success',
              title: 'Guardado correctamente',
              showConfirmButton: false,
              timer: 1500,
              
            })	
          } else {}
        }
      });
    } else {  Swal.fire({
      icon    : 'error',
      title   : 'Oops...',
      text    : 'No ingresaste todos los campos!',
    });
    }
  });

//******************************************************************************************************** */
//******************************************************************************************************** */
function solicitarmant(){
  window.location = "solicitarMante.php"
}

function modificarequipo(){
  window.location = "../inventario/equipoCompu.php"
}



