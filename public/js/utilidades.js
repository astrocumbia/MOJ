
function _Post( parametros , url , targetFunction ) {

    request = $.ajax({
        data:  parametros,
        url:   url,
        type:  'post',
        beforeSend: function () {
        },
        success:  function (e) {
            if( targetFunction != null ) {
                targetFunction( e );
            }
        },
        error: function( e ) {
            error = e;
        }
    });
}

function loadUser( parametros , url ){
    _Post( parametros , url , fill_user_form );
}


function fill_user_form( response ) {

    $("#ide").val( response.id );
    $("#nombree").val( response.name );
    $("#apellidope").val( response.apellidop );
    $("#apellidome").val( response.apellidom );
    $("#usernamee").val( response.username );
    $("#role").val( response.rol );
    $("#emaile").val( response.email );
}

function clearForm( ){
    $("#editUserForm").trigger('reset');
    $("#addUserForm").trigger('reset');
}

