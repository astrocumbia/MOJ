

function timer ( ) {

    setInterval( function(){


        var inicio = new Date('2015/12/12 15:21:00'); //esta fecha debe venir de la BD
        var fin = new Date('2015/12/12 15:23:00'); //esta fecha debe venir de la BD
        var actual = new Date();

        if( actual.getTime() - inicio.getTime() < 0  ) // aun no inicia
            document.getElementById("timer").innerHTML = '<p class="text-success">Por Comenzar</p>';
        else if( actual.getTime() - fin.getTime() > 0 )
            document.getElementById("timer").innerHTML = '<p class="text-danger">Finalizado</p>';
        else
            setTimer();

    }, 1000 );
}

function setTimer (  ) {


    var _second = 1000;
    var _minute = _second * 60;
    var _hour 	= _minute * 60;
    var _day 	= _hour *24;


    var fin = new Date('2015/12/12 15:23:00'); //esta fecha debe venir de la BD
    var actual = new Date();

    var diferencia = fin.getTime() - actual.getTime();

    var horas 		= Math.floor( (diferencia % _day ) / _hour );
    var minutos 	= Math.floor( (diferencia % _hour) / _minute );
    var segundos 	= Math.floor( (diferencia % _minute) / _second );

    document.getElementById("timer").innerHTML = horas + " : " + minutos + " : " + segundos;
}
