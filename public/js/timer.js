

function timer ( inicio , fin ) {

        
    var mytimer = function( ){
      
        var actual = new Date();

        if( actual.getTime() - inicio.getTime() < 0  ) // aun no inicia
            document.getElementById("timer").innerHTML = '<p class="text-success">Por Comenzar</p>';
        else if( actual.getTime() - fin.getTime() > 0 )
            document.getElementById("timer").innerHTML = '<p class="text-danger">Finalizado</p>';
        else
            setTimer( fin );
    };

    setInterval( mytimer , 1000 );
}

function setTimer ( fin  ) {


    var _second = 1000;
    var _minute = _second * 60;
    var _hour 	= _minute * 60;
    var _day 	= _hour *24;


    
    var actual = new Date();

    var diferencia = fin.getTime() - actual.getTime();

    var horas 		= Math.floor( (diferencia % _day ) / _hour );
    var minutos 	= Math.floor( (diferencia % _hour) / _minute );
    var segundos 	= Math.floor( (diferencia % _minute) / _second );

    document.getElementById("timer").innerHTML = horas + " : " + minutos + " : " + segundos;
}
