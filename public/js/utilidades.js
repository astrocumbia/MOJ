
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

function loadContest( parametros , url ){
    _Post( parametros , url , fill_contest_form );
}

function fill_contest_form( response ) {
    $("#ide").val( response.id );
    $("#nombree").val( response.nombre );
    $("#descripcione").val( response.descripcion );
    $("#fecha_inie").val( response.fecha_inicio );
    $("#hora_inie").val( response.hora_inicio );
    $("#fecha_fine").val( response.fecha_fin );
    $("#hora_fine").val( response.hora_fin );
}


function loadTeam( parametros , url ){
    _Post( parametros , url , fill_team_form );
}

function fill_team_form( response ) {
    $("#ide").val( response.id );
    $("#nombree").val( response.nombre );
    $("#universidade").val( response.universidad );
    $("#categoriae").val( response.categoria );
}