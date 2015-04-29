$(function () {
    $('#New_Game').on('click', function () {
        $('.popup-new-game').removeClass('hidden');
    });

    $('#Add_Player').on('click', function () {
        $('.popup-add-player').removeClass('hidden');
    });

    $('#Button_Upsert_Game').on('click', function () {
        upsertGame();
    })

    $('#Button_Upsert_Player').on('click', function () {
        upsertGamePlayer();
    })

    function upsertGame() {
        var data = {
            'Date': $('#Date').val(),
            'BlindIncrementID': $('#BlindIncrementID').val(),
            'BuyInID': $('#BuyinID').val(),
            'BeginningStack': $('#BeginningStack').val()
        };

        $.ajax({
            url: "api/upsertgame.php",
            type: "post",
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function (data) {
                if (data)
                {
                    if (data.message) {
                        $('#result_message').html(data.message);
                    }
                    else {
                        $('.popup-new-game').addClass('hidden');
                        location.reload();
                    }
                }
            }
        });
    }

    function upsertGamePlayer() {
        var $form = $("#Upsert_Player");
        var data = JSON.stringify($form.serializeArray());

        $.ajax({
            url: "upsertgameplayer.php",
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data) {
                    if (data.message.length) {
                        $('#result_message').html(data.message);
                    }
                    else {
                        $('.popup-add-player').addClass('hidden');
                        location.reload();
                    }
                }
            }
        });
    }
});