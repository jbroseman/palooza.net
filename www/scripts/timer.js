$(function () {
    var timer = null;
    var running = false;
    loadTimer();

    $('#start_timer').on('click', function () {
        runTimer();
    });

    $('#stop_timer').on('click', function () {
        var thissound = $("#siren");
        thissound.get(0).pause();
        stopTimer();
    });

    $('#clear_timer').on('click', function () {
        var thissound = $("#siren");
        thissound.get(0).pause();
        loadTimer();
    });

    function loadTimer() {
        var game = {};
        game['gameid'] = $('.game').data('id');

        setTimer(0, 5);

        //$.ajax({
        //    url: "gettimer.php",
        //    data: game,
        //    dataType: 'json',
        //    success: function (data) {
        //        if (data && data.success) {
        //            setTimer(data.minutes, data.seconds);
        //        }
        //    }
        //});
    }

    function setTimer(minutes, seconds) {
        minutes = minutes.toString();
        seconds = seconds.toString();
        while (minutes && minutes.length < 2) {
            minutes = '0' + minutes;
        }
        while (seconds && seconds.length < 2) {
            seconds = '0' + seconds;
        }
        $('.timer .minutes').text(minutes);
        $('.timer .seconds').text(seconds);
    }

    function runTimer() {
        var currentminutes = $('.timer .minutes').text();
        var currentseconds = $('.timer .seconds').text();

        //if there are values
        if (currentminutes && currentseconds) {
            //set a one second interval to run the timer
            timer = setInterval(function () {
                //check to see
                if (currentseconds == 0) {
                    if (currentminutes > 0) {
                        currentminutes--;
                        currentseconds = 60;
                    }
                    else {
                        stopTimer();
                        var thissound = $("#siren");
                        thissound.get(0).play();
                        processEndBlind();
                        return;
                    }
                }

                currentseconds--;
                setTimer(currentminutes, currentseconds);
            }, 1000);
        }
    }

    function stopTimer() {
        clearInterval(timer);
        var time = {};
        time['gameid'] = $('.game').data('id');
        time['min'] = $('.timer .minutes').text();
        time['sec'] = $('.timer .seconds').text();

        $.ajax({
            url: "stoptimer.php",
            data: time,
            dataType: 'json',
            success: function (data) {
                if (data && data.message.length) {
                    $('#result_message').html(data.message);
                }
            }
        });
    }
});