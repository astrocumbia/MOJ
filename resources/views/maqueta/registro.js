/*
 *  Document   : registro.js
 *  Author     : Daniel Hernández
 *  email      : daniel@mictlan.mx
 */

var BasePagesRegister = function() {
    // Init Register Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationRegister = function(){
        jQuery('.js-validation-register').validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group .form-material').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'username': {
                    required: true,
                    minlength: 5
                },
                'nombre': {
                    required: true
                },
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 5
                },
                'password2': {
                    required: true,
                    equalTo: '#password'
                },
                terminos:{
                    required: true
                }
            },
            messages: {
                'username': {
                    required: 'Por favor, ingresa tu nombre de usuario',
                    minlength: 'Tu nombre de usuario debe contener al menos 5 caracteres'
                },
                'nombre': {
                    required: 'Por favor, ingresa tu nombre'
                },
                'email': 'Por favor, ingresa una cuenta de correo válida',
                'password': {
                    required: 'por favor, ingresa tu contraseña',
                    minlength: 'Tu contraseña debe contener al menos 5 caracteres'
                },
                'password2': {
                    required: 'Por favor, confirma tu contraseña',
                    minlength: 'Tu contraseña debe contener al menos 5 caracteres',
                    equalTo: 'Parece que tus contraseñas no coinciden'
                },
                'terminos': {
                    required: 'Por favor, acepta los términos y condiciones'
                }
            }
        });
    };

    return {
        init: function () {
            // Init Register Form Validation
            initValidationRegister();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BasePagesRegister.init(); });