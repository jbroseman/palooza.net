$(function () {
    var timer = null;
    var flash = null;
    
    $('#add_time').click(function() {
        stopTimer();
        var mins = parseInt($('.timer .minutes').text()) + 1;
        var secs = parseInt($('.timer .seconds').text());
        setTimer(mins, secs);
    });
    
    $('#remove_time').click(function() {
        stopTimer();
        var mins = parseInt($('.timer .minutes').text()) - 1;
        var secs = parseInt($('.timer .seconds').text());
        setTimer(mins, secs);
    });
    
    setTimer(
        $('.timer .minutes').text(),
        $('.timer .seconds').text()
    );

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
        clearTimer();
    });

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
        $('.timer').removeClass('hidden');
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
                        clearInterval(timer);
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
            url: "api/stoptimer.php",
            type: "post",
            data: JSON.stringify(time),
            dataType: 'json',
        }).done(function (data) {
            if (data && data.message.length) {
                $('#result_message').html(data.message);
            }
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }

    function clearTimer() {
        clearInterval(timer);
        var data = {};
        data['gameid'] = $('.game').data('id');

        $.ajax({
            url: "api/cleartimer.php",
            type: "post",
            data: JSON.stringify(data),
            dataType: 'json',
        }).done(function (data) {
            if (data && data.message.length) {
                $('#result_message').html(data.message);
            }
            else {
                location.reload();
            }
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }

    function processEndBlind() {
        var $blind = $(".blinds li.completed-0").first();
        var data = {
            'GameID': $('.game').data('id'),
            'BlindID': $blind.data('id')
        };

        $.ajax({
            url: "api/upsertcompletedblind.php",
            type: "post",
            data: JSON.stringify(data),
            dataType: 'json',
        }).done(function (data) {
            if (data && data.message.length) {
                $('#result_message').html(data.message);
            }
            else {
                flash = setInterval(function () {
                    $('body').toggleClass('flashing');
                }, 200);
                
                setTimeout(function() {
                    clearInterval(flash);
                    location.reload();
                }, 60000);
            }
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }
});