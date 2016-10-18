(function($) {
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.text("00h : " + minutes + "m : " + seconds + "s");

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }
    jQuery(function ($) {
        var fiveMinutes = 60 * 5,
            display = $('#time-exit');
        startTimer(fiveMinutes, display);
    });

    function changeFSize()
    {
        var fsize = (parseInt($("#people_filling").css('font-size')) - 2);
        $("#people_filling").css('font-size', fsize+'px');
    }
    function randomIntFromInterval(min,max)
    {
        return Math.floor(Math.random()*(max-min+1)+min);
        //return rndsc = (Math.random()*(max-min+1)+min);
        //return rndsc.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    var prev_val = randomIntFromInterval(100,200);
    $("#people_filling_nd_spot").html(prev_val);
    $("#try_to_take_spot").html(Math.floor(prev_val/4));
    var changefs = 0;
    var how_many_times_increase = 0;

    function doSomething()
    {
        var z = randomIntFromInterval(5,15);

        var incre_decre = randomIntFromInterval(0,1);
        if(how_many_times_increase < 3 && incre_decre == 0)
            incre_decre = 1;

        if(incre_decre == 0 && (prev_val - z) < 10) //to control negative values
            incre_decre = 1;

        if(incre_decre > 0) //increase the value
        {
            $('#people_filling_nd_spot')
                .prop('number', prev_val)
                .animateNumber(
                    {
                        number: (prev_val + z)
                    },
                    1000
                );
            $('#try_to_take_spot')
                .prop('number', Math.floor(prev_val/4))
                .animateNumber(
                    {
                        number: (Math.floor((prev_val + z)/4))
                    },
                    1000
                );
            prev_val = prev_val + z;
            how_many_times_increase++;
        }
        else
        {
            //decrease the value
            $('#people_filling_nd_spot')
                .prop('number', prev_val)
                .animateNumber(
                    {
                        number: (prev_val - z)
                    },
                    1000
                );
            $('#try_to_take_spot')
                .prop('number', Math.floor(prev_val/4))
                .animateNumber(
                    {
                        number: (Math.floor((prev_val - z)/4))
                    },
                    1000
                );
            prev_val = prev_val - z;

            if(how_many_times_increase > 3)
                how_many_times_increase = 0;
        }

        // $("#people_filling").html(prev_val);

        if(prev_val > 9999 && changefs == 1)
        {
            changeFSize();
            changefs = 2;
        }
        else if(prev_val > 999 && changefs == 0)
        {
            changeFSize();
            changefs = 1;
        }

        if(prev_val > 9999 && changefs == 0)
            changefs = 1;
    }

    function getRandomArbitrary(min, max)
    {
        return Math.random() * (max - min) + min;
    }

    function peopleFilling()
    {
        //doSomething();
        (function loop() {
            var rand =  getRandomArbitrary(4000,9000);
            setTimeout(function() {doSomething(); loop();}, rand);
        }());
    }
    peopleFilling();
})(jQuery);