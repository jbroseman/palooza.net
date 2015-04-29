$(function () {
    $('#New_Game').on('click', function () {
        $('.popup-new-game').removeClass('hidden');
    });

    $('#Add_Player').on('click', function () {
        $('.popup-add-player').removeClass('hidden');
    });

    function upsertGame() {
        var $form = $("#Upsert_Game");
        var data = JSON.stringify($form.serializeArray());

        $.ajax({
            url: "upsertgame.php",
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data)
                {
                    if (data.message.length) {
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