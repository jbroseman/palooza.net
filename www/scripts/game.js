$(function () {

    $('#Menu_Expand').on('click', function () {
        $('#Modal_Overlay').removeClass('hidden');
        $('.popup').addClass('hidden');
        $('.popup.main-menu').removeClass('hidden');
    });

    $('#menu_collapse').on('click', function () {
        $('#Modal_Overlay').addClass('hidden');
        $('.popup.main-menu').addClass('hidden');
    });
    
    $('#New_Game').on('click', function () {
        if ($(this).hasClass('disabled'))
        {
            return false;
        }
        $('#Modal_Overlay').removeClass('hidden');
        $('.popup').addClass('hidden');
        $('.popup.new-game').removeClass('hidden');
    });

    $('#Button_Upsert_Game').on('click', function () {
        upsertGame();
    });

    $('#Button_Cancel_Upsert_Game').on('click', function () {
        $('#Modal_Overlay').addClass('hidden');
        $('.popup.new-game').addClass('hidden');
    });

    $('#Add_Player').on('click', function () {
        $('#Modal_Overlay').removeClass('hidden');
        $('.popup').addClass('hidden');
        $('.popup.add-player').removeClass('hidden');
    });

    $('#Button_Upsert_Player').on('click', function () {
        upsertGamePlayer();
    });

    $('#Button_Cancel_Upsert_Player').on('click', function () {
        $('#Modal_Overlay').addClass('hidden');
        $('.popup-add-player').addClass('hidden');
    });

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
                        $('#modal_overlay').addClass('hidden');
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
            url: "api/upsertgameplayer.php",
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data) {
                    if (data.message.length) {
                        $('#result_message').html(data.message);
                    }
                    else {
                        $('#modal_overlay').addClass('hidden');
                        $('.popup-add-player').addClass('hidden');
                        location.reload();
                    }
                }
            }
        });
    }
});