
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

function loadProblem( parametros , url ){
    _Post( parametros , url , fill_problem_form );
}

function deleteUser( parametros , url ){
    _Post( parametros , url , null );
    location.reload();

}


function deleteProblem( parametros , url ){

    var name = "#btndelete" + parametros.id;

    $(name).addClass("fa-spin");
    _Post( parametros , url , null );
    location.reload();

}

function fill_problem_form( response ) {

    console.log( response.categoria );

    $("#ide").val( response.id );
    $("#nombree").val( response.nombre );
    $("#memoriae").val( response.memoria );
    $("#tiempoe").val( response.tiempo );
    $("#categorias").val( response.categoria);

}


function fill_user_form( response ) {

    $("#ide").val( response.id );
    $("#id_team").val( response.id_team );
    $("#nombree").val( response.name );
    $("#apellidope").val( response.apellidop );
    $("#apellidome").val( response.apellidom );
    $("#usernamee").val( response.username );
    $("#role").val( response.rol );
    $("#emaile").val( response.email );
}

function clearProblemsForm( ){
    $("#formedit").trigger('reset');
    $("#formadd").trigger('reset');
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
function showFile( parametros , url ){
    _Post( parametros , url , function( response ){
        window.open( response );
    });
}

function downloadFile( parametros , url ){
    _Post( parametros , url , function( response ){
            window.open(response, '_self');
    });
}


function editarProblema( idProblema ){
    $('#eproblem_id').val(idProblema);
}

function loadRun( $idRun ){
    $("#id_envio").val( $idRun );
}
