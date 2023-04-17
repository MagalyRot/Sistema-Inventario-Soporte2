$(document).ready(function() {
    var cat_id, opcion;
  //******************************************************************************************************** */
    //TABLA QUE MUESTRA TODOS LOS USUARIOS
    var dataTableUsuarios = $('#Usuarios').DataTable({
      "responsive"    : true,
      "processing"    : true,
      "serverSide"    : true,
      "order"         : [],
      "ajax"          : {
          url         : "obtenerUsuarios.php", 
          type        : "POST"
      },
      "columnsDefs"     : [{
          "targets"     : [0,8],
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
   
  //TABLA DE DATOS DE USUARIOS PERSONAL
  var dataTableUsuariosPersonal = $('#usuarios_personal').DataTable({
    "responsive"    : true,
    "processing"    : true,
    "serverSide"    : true,
    "order"         : [],
    "ajax"          : {
        url         : "obtenerUsuariosPersonal.php",
        type        : "POST"
    },
    "columnsDefs"     : [{
        "targets"     : [0,8],
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
            "sLast"   :"Último",
            "sNext"   :"Siguiente",
            "sPrevious": "Anterior"
         },
         "sProcessing":"Procesando...",
    }
  }); 
  
  //TABLA DE DATOS DE USUARIOS ADMINISTRATIVOS
  var dataTableAdministrativos = $('#usuarios_administrativos').DataTable({
    "responsive"    : true,
    "processing"    : true,
    "serverSide"    : true,
    "order"         : [],
    "ajax"          : {
        url         : "obtenerUsuariosAdministrativos.php",
        type        : "POST"
    },
    "columnsDefs"     : [{
        "targets"     : [0,8],
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
            "sLast"   :"Último",
            "sNext"   :"Siguiente",
            "sPrevious": "Anterior"
         },
         "sProcessing":"Procesando...",
    }
  }); 
  
  //TABLA DE DATOS DE USUARIOS INACTIVOS
  var dataTableInactivos = $('#usuarios_inactivos').DataTable({
    "responsive"    : true,
    "processing"    : true,
    "serverSide"    : true,
    "order"         : [],
    "ajax"          : {
        url         : "obtenerUsuariosInactivos.php",
        type        : "POST"
    },
    "columnsDefs"     : [{
        "targets"     : [0,8],
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
            "sLast"   :"Último",
            "sNext"   :"Siguiente",
            "sPrevious": "Anterior"
         },
         "sProcessing":"Procesando...",
    }
  });
  
  //********************************************************************************************************** */
  //VALIDACIONES FORMULARIO AÑADIR PERSONAL

  const PnombreInput 		  = document.getElementById('addnombre_ad');
  const PapellidoPInput	  = document.getElementById('addapellidoP_ad');
  const PapellidoMInput 	= document.getElementById('addapellidoM_ad');
  const PntrabajadorInput = document.getElementById('addnTrabajador_ad');
  const PareaInput 		    = document.getElementById('addarea_ad');
  const PtipoInput 		    = document.getElementById('addTipo_ad');
  const submitButton 		  = document.querySelector('button[type="submit"]');
  
  submitButton.addEventListener('click', (event) => {
    const Pnombre 	   = PnombreInput.value.trim();
    const PapellidoP   = PapellidoPInput.value.trim();
    const PapellidoM   = PapellidoMInput.value.trim();
    const Pntrabajador = PntrabajadorInput.value.trim();
    const Parea 	     = PareaInput.value.trim();
    const Ptipo 	     = PtipoInput.value.trim();
  
    if (Pnombre === '' || PapellidoP === '' || PapellidoM === '' ||  Pntrabajador==='' || Parea ==='' || Ptipo ==='') {
      event.preventDefault();
      
        Swal.fire({
          icon    : 'error',
          title   : 'Oops...',
          text    : 'No ingresaste todos los campos!',
        });

    } else { 
      $.ajax({
        url: "add_user.php",
        type: "post",
        data: {
          addnombre_ad      : Pnombre ,
          addapellidoP_ad   : PapellidoP,
          addapellidoM_ad   : PapellidoM,
          addnTrabajador_ad : Pntrabajador,
          addarea_ad        : Parea,
          addTipo_ad        : Ptipo
        },
        success: function(data) {
          dataTableUsuarios.ajax.reload(null, false);
          dataTableUsuariosPersonal.ajax.reload(null, false);
          dataTableAdministrativos.ajax.reload(null, false);
          dataTableInactivos.ajax.reload(null, false);
          
          var json      = JSON.parse(data);
          var status    = json.status;
          if (status    == 'true') {
            $('#addUserModal').modal('hide');
            Swal.fire({
              position: 'top-center',
              icon: 'success',
              title: 'Guardado correctamente',
              showConfirmButton: false,
              timer: 1500,
              
            })	
          } else {

          }
        }
        
      });

     
    }
  });
  
  //**************************** INPUT NOMBRE *********************** */
  PnombreInput.addEventListener('input', () => {
    const PnombreError = document.getElementById('Pnombre-error');
    const Pnombre = PnombreInput.value.trim();
    if (Pnombre === '') {
      PnombreError.textContent = 'Por favor, ingrese su nombre';
    } else if (!/^[a-zA-ZÀ-ÿ\s]{3,20}$/.test(Pnombre)) {  
      PnombreError.textContent = 'El nombre no es válido';
    } else {
      PnombreError.textContent = '';
    }
  });

  //******************** INPUT APELLIDO PATERNO ********************** */
PapellidoPInput.addEventListener('input', () => {
	const PapellidoError = document.getElementById('PapellidoP-error');
	const PapellidoP = PapellidoPInput.value.trim();
	if (PapellidoP === '') {
		PapellidoError.textContent = 'Por favor, ingrese su apellido correcto';
	} else if (!/^[a-zA-ZÀ-ÿ\s]{3,20}$/.test(PapellidoP)) {  
		PapellidoError.textContent = 'El apellido no es válido';
	} else {
		PapellidoError.textContent = '';
	}
});

//********************* INPUT APELLIDO MATERNO ********************** */
PapellidoMInput.addEventListener('input', () => {
	const PapellidoMError = document.getElementById('PapellidoM-error');
	const PapellidoM = PapellidoMInput.value.trim();
	if (PapellidoM === '') {
		PapellidoMError.textContent = 'Por favor, ingrese su apellido correcto';
	} else if (!/^[a-zA-ZÀ-ÿ\s]{3,20}$/.test(PapellidoM)) { 
		PapellidoMError.textContent = 'El apellido no es válido';
	} else {
		PapellidoMError.textContent = '';
	}
});

//*********************** INPUT NUM TRABAJADOR ********************** */
PntrabajadorInput.addEventListener('input', () => {
	const PntrabajadorError = document.getElementById('Pntrabajador-error');
	const Pntrabajador = PntrabajadorInput.value.trim();
	if (Pntrabajador === '') {
		PntrabajadorError.textContent = 'Por favor, ingrese el Num. de trabajador';
	} else if (!/^[A-Z0-9\-]{4,16}$/.test(Pntrabajador)) {  
		PntrabajadorError.textContent = 'Minimo 4 caracteres, se permiten letras mayúsculas, números y guiones';
	} else {
		PntrabajadorError.textContent = '';
	}
});

// me parece que no funcionan area y tipo
//**************************** INPUT ÁREA ************************* */
PareaInput .addEventListener('input', () => {
	const PareaError = document.getElementById('Parea-error');
	const Parea = PareaInput.value.trim();
	if (Parea === '') {
		PareaError.textContent = 'Por favor seleccione una opción del menú desplegable';
	} 
});


//***************************** INPUT TIPO ************************* */
PtipoInput .addEventListener('input', () => {
	const PtipoError = document.getElementById('Ptipo-error');
	const Ptipo = PtipoInput.value.trim();
	if (Ptipo === '') {
		PtipoError.textContent = 'Por favor seleccione una opción del menú desplegable';
	}
});


  // **************************************************
  //AGREGAR DATOS DE USUARIO GENERAL
  // $(document).on('submit', '#addUser', function(e) {
  //   e.preventDefault();
  //   var addnombre_ad      = $('#addnombre_ad').val();
  //   var addapellidoP_ad   = $('#addapellidoP_ad').val();
  //   var addapellidoM_ad   = $('#addapellidoM_ad').val();
  //   var addnTrabajador_ad = $('#addnTrabajador_ad').val();
  //   var addarea_ad        = $('#addarea_ad').val();
  //   var addTipo_ad        = $('#addTipo_ad').val();
  





  //   if (addnombre_ad != '' && addapellidoP_ad != '' && addapellidoM_ad != '' && addnTrabajador_ad != '' && addarea_ad != '' && addTipo_ad != '') {
  //     $.ajax({
  //       url: "add_user.php",
  //       type: "post",
  //       data: {
  //         addnombre_ad      : addnombre_ad,
  //         addapellidoP_ad   : addapellidoP_ad,
  //         addapellidoM_ad   : addapellidoM_ad,
  //         addnTrabajador_ad : addnTrabajador_ad,
  //         addarea_ad        : addarea_ad ,
  //         addTipo_ad        : addTipo_ad
  //       },
  //       success: function(data) {
  //         dataTableUsuarios.ajax.reload(null, false);
  //         dataTableUsuariosPersonal.ajax.reload(null, false);
  //         dataTableAdministrativos.ajax.reload(null, false);
  //         dataTableInactivos.ajax.reload(null, false);
  
  //         var json      = JSON.parse(data);
  //         var status    = json.status;
  //         if (status    == 'true') {
  //           $('#addUserModal').modal('hide');
  //           Swal.fire({
  //             position: 'top-center',
  //             icon: 'success',
  //             title: 'Guardado correctamente',
  //             showConfirmButton: false,
  //             timer: 1500,
              
  //           })	
  //         } else {}
  //       }
  //     });
  //   } 
  //   else {  Swal.fire({
  //     icon    : 'error',
  //     title   : 'Oops...',
  //     text    : 'No ingresaste todos los campos!',
  //   });
  //   }


  // });
  
  //********************************************************************************************************* */
  // LIMPIAR CAMPOS
    $("#limpiarCampos").click(function(){
      $("#addUser").trigger("reset");    
      // opcion    = 1; //alta           
      // art_id    = null;
      
    });
  
  //********************************************************************************************************** */
  //EDITAR DATOS PERSONALES DE USUARIOS ADMIN Y PERSONAL
  $(document).on('submit', '#updateUser', function(e) {
    e.preventDefault();
    //var tr = $(this).closest('tr');
    var edtnombre      = $('#edtnombre').val();
    var edtapellidoP   = $('#edtapellidoP').val();
    var edtapellidoM   = $('#edtapellidoM').val();
    var edtnTrabajador = $('#edtnTrabajador').val();
    var edtarea        = $('#edtarea').val();
    var edttipo        = $('#edttipo').val();
    var edtestado      = $('#edtestado').val() 
  
    var trid           = $('#trid').val();
    var id             = $('#id').val();
  
    if (edtnombre != '' && edtapellidoP != '' && edtapellidoM != '' && edtnTrabajador != '' && edtarea != '' && edttipo) {
      $.ajax({
        url: "update_user.php",
        type: "post",
        data: {
          edtnombre      : edtnombre,
          edtapellidoP   : edtapellidoP,
          edtapellidoM   : edtapellidoM,
          edtnTrabajador : edtnTrabajador,
          edtarea        : edtarea,
          edttipo        : edttipo,
          edtestado      : edtestado,
          id             : id
        },
        success: function(data) {
          dataTableUsuarios.ajax.reload(null, false);
          dataTableUsuariosPersonal.ajax.reload(null, false);
          dataTableAdministrativos.ajax.reload(null, false);
          dataTableInactivos.ajax.reload(null, false);
        }
  
      });
      $('#exampleModal').modal('hide');		
      Swal.fire({
          position          : 'top-center',
          icon              : 'success',
          title             : 'Datos de usuario Actualizados!',
          showConfirmButton : false,
          timer             : 1500,
          
        })
      
    } else {
      Swal.fire({
        icon    : 'error',
        title   : 'Oops...',
        text    : 'No ingresaste todos los campos!',
      });
    }
  });
  
  //********************************************************************************************************** */
  //CLICK AL BOTON EDITAR TABLA USUARIOS
  $('#Usuarios').on('click', '.editbtn ', function(event) {
    var dataTableUsuarios = $('#Usuarios').DataTable();
    var trid              = $(this).closest('tr').attr('id');
    var id                = $(this).data('id');
    $('#exampleModal').modal('show');
  
    $.ajax({
      url: "get_single_data.php",
      data: {
        id: id 
      },
      type: 'post',
      success: function(data) {
        var json = JSON.parse(data);
        $('#edtnombre').val(json.nombre_per);
        $('#edtapellidoP').val(json.apellidoP_per);
        $('#edtapellidoM').val(json.apellidoM_per);
        $('#edtnTrabajador').val(json.ntrabajador_per);
        $('#edtarea').val(json.area_per);
        $('#edttipo').val(json.tipo_per);
        $('#edtestado').val(json.estado_per);
        $('#id').val(id);
        $('#trid').val(trid); 
      }
    })
  })
  
  //CLICK AL BOTON EDITAR TABLA PERSONAL
  $('#usuarios_personal').on('click', '.editbtn ', function(event) {
    var dataTableUsuarios = $('#usuarios_personal').DataTable();
    var trid              = $(this).closest('tr').attr('id');
    var id                = $(this).data('id');
    $('#exampleModal').modal('show');
  
    $.ajax({
      url: "get_single_data.php",
      data: {
        id: id
      },
      type: 'post',
      success: function(data) {
        var json = JSON.parse(data);
        $('#edtnombre').val(json.nombre_per);
        $('#edtapellidoP').val(json.apellidoP_per);
        $('#edtapellidoM').val(json.apellidoM_per);
        $('#edtnTrabajador').val(json.ntrabajador_per);
        $('#edtarea').val(json.area_per);
        $('#edttipo').val(json.tipo_per);
        $('#edtestado').val(json.estado_per);
        $('#id').val(id);
        $('#trid').val(trid);
      }
    })
  })
  
  //CLICK AL BOTON EDITAR TABLA ADMINISTRADORES
  $('#usuarios_administrativos').on('click', '.editbtnadmin ', function(event) {
    var dataTableAdministrativos = $('#Usuarios_administrativos').DataTable();
    var trid                     = $(this).closest('tr').attr('id');
    var id                       = $(this).data('id');
    $('#exampleModal').modal('show');
  
    $.ajax({
      url: "get_single_data.php",
      data: { 
        id: id  
      },
      type: 'post',
      success: function(data) {
        var json = JSON.parse(data);
        $('#edtnombre').val(json.nombre_per);
        $('#edtapellidoP').val(json.apellidoP_per);
        $('#edtapellidoM').val(json.apellidoM_per);
        $('#edtnTrabajador').val(json.ntrabajador_per);
        $('#edtarea').val(json.area_per);
        $('#edttipo').val(json.tipo_per);
        $('#edtestado').val(json.estado_per);
        $('#id').val(id);
        $('#trid').val(trid);
      }
    })
  })
  
  //********************************************************************************************************** */
  //CLICK PARA INHABILITAR LOS DATOS DEL USUARIO ADMINISTRATIVOS Y PERSONAL (ESTATUS DE PERSONAL CAMBIA A 0)
  $(document).on('click', '.desactivarDatosBtn', function(event) {
    var table = $('#example').DataTable();
    event.preventDefault();
    var id = $(this).data('id');
  
  
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton : 'btn btn-success', 
        cancelButton  : 'btn btn-danger'
      },
      buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
      title             : '¿Estás seguro de deshabilitar los datos?',
      text              : "Una vez deshabilitado no podrá solicitar prestamos o mantenimientos.",
      icon              : 'warning',
      showCancelButton  : true,
      confirmButtonText : 'Sí',
      cancelButtonText  : 'Cancelar',
      reverseButtons    : true
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url       : "delete_user.php", 
              type      : "POST",
              datatype  :"json",    
              data:  { id     :id,
                       opcion :opcion},    
              success: function(data) {
                dataTableUsuarios.ajax.reload(null, false);
                dataTableUsuariosPersonal.ajax.reload(null, false);
                dataTableAdministrativos.ajax.reload(null, false);
                dataTableInactivos.ajax.reload(null, false);
              }
            });	
        swalWithBootstrapButtons.fire(
          'Datos deshabilitados',
          'Los datos del personal se han deshabilitado correctamente.',
          'success'
        )
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelar',
          'Los datos del personal continuan Activos.',
          'error'
        )
      }
    })
  })
  
  //CLICK PARA INHABILITAR USUARIO ADMINISTRADOR, MANTENIMIENTO ETC. (ESTATUS DE USUARIOS CAMBIA A 0)
  $(document).on('click', '.desactivarCorreoBtn', function(event) {
    var table = $('#usuarios_personal').DataTable();
    event.preventDefault();
    var id = $(this).data('id'); 
  
  
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton : 'btn btn-success',
        cancelButton  : 'btn btn-danger'
      },
      buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
      title             : '¿Estás seguro de deshabilitar el usuario?',
      text              : "una vez deshabilitado no podrá iniciar sesión.",
      icon              : 'warning',
      showCancelButton  : true,
      confirmButtonText : 'Sí',
      cancelButtonText  : 'Cancelar',
      reverseButtons    : true
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url       : "desactivar_user.php", 
              type      : "POST",
              datatype  :"json",     
              data:  { id     :id,
                       opcion :opcion},    
              success: function(data) {
                dataTableUsuarios.ajax.reload(null, false);
                dataTableUsuariosPersonal.ajax.reload(null, false);
                dataTableAdministrativos.ajax.reload(null, false);
                dataTableInactivos.ajax.reload(null, false);
              }
            });	
        swalWithBootstrapButtons.fire(
          'Usuario Deshabilitado',
          'El usuario se ha deshabilitado correctamente.',
          'success'
        )
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelar',
          'El usuario sigue Activo.',
          'error'
        )
      }
    })
  })

  //CLICK PARA ESTATUS ACTIVO (ID PESONAL CAMBIA A 1) DE DATOS USUARIOS PERSONAL Y ADMINISTRATIVO
  $(document).on('click', '.ActivarDatosBtn', function(event) {
    var table = $('#usuarios_inactivos').DataTable();
    event.preventDefault();
    var id = $(this).data('id');
  
  
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton   : 'btn btn-success',
        cancelButton    : 'btn btn-danger'
      },
      buttonsStyling    : false
    })
    
    swalWithBootstrapButtons.fire({
      title             : '¿Estás seguro de Activarlo?',
      text              : "Una vez activo los datos del usuario, este podrá solicitar prestamos y mantenimientos",
      icon              : 'warning',
      showCancelButton  : true,
      confirmButtonText : 'Sí',
      cancelButtonText  : 'Cancelar',
      reverseButtons    : true
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url       : "activar_datosPersonal.php",
              type      : "POST",
              datatype  :"json",    
              data:  {  id      :id,
                        opcion  :opcion },    
              success: function(data) {
                dataTableUsuarios.ajax.reload(null, false);
                dataTableUsuariosPersonal.ajax.reload(null, false);
                dataTableAdministrativos.ajax.reload(null, false);
                dataTableInactivos.ajax.reload(null, false);
                }
            });	
        swalWithBootstrapButtons.fire(
          'Datos Activados',
          'Los datos del usuario se han activado correctamente',
          'success'
        )
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelar',
          'Los datos continuan Inactivos',
          'error'
        )
      }
    })
  })

  //CLICK PARA ESTATUS ACTIVO (ID DE USUARIO CAMBIA A 1) CORREO USUARIO SI ESTA ACTIVO PODRÁ INICIAR SESIÓN
  $(document).on('click', '.ActivarCorreoBtn', function(event) {
    var table = $('#usuarios_inactivos').DataTable();
    event.preventDefault();
    var id = $(this).data('id');
  
  
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton   : 'btn btn-success',
        cancelButton    : 'btn btn-danger'
      },
      buttonsStyling    : false
    })
    
    swalWithBootstrapButtons.fire({
      title             : '¿Estás seguro de Activarlo?',
      text              : "Una vez activo, este podrá iniciar sesión.",
      icon              : 'warning',
      showCancelButton  : true,
      confirmButtonText : 'Sí',
      cancelButtonText  : 'Cancelar',
      reverseButtons    : true
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url       : "activar_user.php",
              type      : "POST",
              datatype  :"json",    
              data:  {  id      :id,
                        opcion  :opcion },    
              success: function(data) {
                dataTableUsuarios.ajax.reload(null, false);
                dataTableUsuariosPersonal.ajax.reload(null, false);
                dataTableAdministrativos.ajax.reload(null, false);
                dataTableInactivos.ajax.reload(null, false);
                }
            });	
        swalWithBootstrapButtons.fire(
          'Usuario Activado',
          'El usuario se ha Activado correctamente.',
          'success'
        )
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelar',
          'El usuario sigue inactivo.',
          'error'
        )
      }
    })
  })

   
  });