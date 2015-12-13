/**
 *
 * @param Los parametros con los que mandas la petición post
 * @param la url a la que irá por los datos
 * @param si es diferente de null, ejecuta la función cuando retorna...
 * @private
 */

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
};


function edituser( parametros , url ){

    _Post( parametros , url , fill_user_form );

}



function fill_user_form( response ) {

    console.log( response );

    /*$("#DatosJNombre")[0].innerHTML = nombre;
    $("#DatosJInst")[0].innerHTML = institucion;
    var DatosJCat = []
    DatosJCat[0] = $("#DatosJCat1")[0];
    DatosJCat[1] = $("#DatosJCat2")[0];
    var lastItem = "";
    //*
    DatosJCat[0].innerHTML = "<p>";
    DatosJCat[1].innerHTML = "<p>";
    for (var i = 0, j = -1; i < response.length; i++) {
        if( lastItem != response[i].nombre ) {
            lastItem = response[i].nombre;
            j++;
            if( i != 0 &&  i != 1) {
                DatosJCat[j%2].innerHTML += "<br>";
            }
            DatosJCat[j%2].innerHTML += "</p><h4>" + (j+1) + ". " + response[i].nombre + "</h4> <p>";
        }

        var str = normalize( response[i].nombre );
        str  = str.toLocaleLowerCase()

        if(  str == "carrera individual" ||  str == "carrera de relevos" ) {
            DatosJCat[j%2].innerHTML += "Carril: " + response[i].pivot.carril;
            if( i < response.length -1 && response[i].nombre == response[i+1].nombre ) {
                DatosJCat[j%2].innerHTML += " - ";
            }
        }
        else if(  str == "resolucion de laberinto" ) {
            DatosJCat[j%2].innerHTML += "Laberinto: " + response[i].pivot.carril;
            if( i < response.length -1 && response[i].nombre == response[i+1].nombre ) {
                DatosJCat[j%2].innerHTML += " - ";
            }
        }

    }
    //*/
}