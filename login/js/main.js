(function($) {
  "use strict";

  /*
   * ================================================================== [ Focus
   * input ]
   */
  $('.input100').each(function() {
        $(this).on('blur', function() {
              if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
              } else {
                $(this).removeClass('has-val');
              }
            })
      })

  /*
   * ================================================================== [
   * Validate ]
   */
  var input = $('.validate-input .input100');

  $('.validate-input .input100').on('keydown', function(e) {
        if (e.which == 13) {
          $('.login100-form-btn').click();
        }
      });

  $('.validate-form .input100').each(function() {
        $(this).focus(function() {
              hideValidate(this);
            });
      });

  function validate(input) {
    if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
      if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
        return false;
      }
    } else {
      if ($(input).val().trim() == '') {
        return false;
      }
    }
  }

  function showValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).addClass('alert-validate');
  }

  function hideValidate(input) {
    var thisAlert = $(input).parent();

    $(thisAlert).removeClass('alert-validate');
  }

  var showPass = 0;
  $('.btn-show-pass').on('click', function() {
        if (showPass == 0) {
          $(this).next('input').attr('type', 'text');
          $(this).addClass('active');
          showPass = 1;
        } else {
          $(this).next('input').attr('type', 'password');
          $(this).removeClass('active');
          showPass = 0;
        }

      });
  var showPass = 0;
  $('.login100-form-btn').on('click', function() {
        var check = true;

        for (var i = 0; i < input.length; i++) {
          if (validate(input[i]) == false) {
            showValidate(input[i]);
            check = false;
          }
        }
        if (check) {
    
            $.ajax({
                  type : "GET",
                  url : '../php/negocios/login/ingresarLogin.php',
                  contentType : "application/json; charset=utf-8",
                  data : {
                    usuario : $('#usuario').val(),
                    pass : $('#clave').val()
                  },
                  success : function(data,response) {
                  	console.log(data);
                   var datos= JSON.parse(data);
                   console.log(datos);
                    if (datos.success == false) {
                      Swal.fire({
                        title : "Advertencia",
                        text : "Usuario o contraseña incorrectos.",
                        icon: 'warning',
                        confirmButtonText : "Ok"
                      });
                    } 

                   
                    /*else if (datos.tipo== 1) {

                      Swal.fire({
                            title : "¿Sesión Activa?",
                            text : "Al continuar, se cerrará la otra sesión dando prioridad a la actual.",
                            type : "warning",
                            showCloseButton : true,
                            showCancelButton : true,
                            confirmButtonText : "Continuar",
                            cancelButtonText : "Cancelar"
  
                          }) .then((result) => {
                           
                            if (result.isConfirmed) {
                              console.log("SSS");
                              $.ajax({
                                    type : "GET",
                                    url : '../php/negocios/login/usuarioPrioridad.php',
                                    contentType : "application/json; charset=utf-8",
                                    data : {
                                     
                                      usuario : $('#usuario').val(),
                                      pass : $('#clave').val()
                                    },
                                    success : function(data) {
                                      console.log(data);
                                      var datos2= JSON.parse(data);
                                      console.log("s",datos2);
                                      if (datos2.success == false) {
                                        Swal.fire({
                                              title : "Advertencia",
                                              text : "Usuario o contraseña incorrectos.",
                                              imageUrl : "images/peligro.png",
                                              confirmButtonText : "Ok"
                                            });
  
                                      } else {
                                        var redirect = '../index.php';
                                        window.location = redirect;
                                      }
  
                                    },
                                    error : function(result) {
                                      Swal.fire("Error", "Lo sentimos uno  ");
                                    }
                                  });
                            } else {
                              Swal.fire("Error", "Lo sentimos uno  ");
                            }
                          });
  
                    }

                    */
                    
                    else {
                    	
                      
                      var redirect = '../inicio/index.php';
                      window.location = redirect;
                    }
                  },
                  error : function() {
                    alert('Datos incorrectos');
                  }
                });
          
        } else {
          return check;
        }
      });

})(jQuery);