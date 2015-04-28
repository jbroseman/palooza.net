$(function () {
    $('#New_Game').on('click', function () {
        $('.popup-new-game').removeClass('hidden');
    });

    $('#Add_Player').on('click', function () {
        $('.popup-add-player').removeClass('hidden');
    });

    function upsertGame() {
        $.ajax({
            url: "upsertgame.php",
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
        $.ajax({
            url: "upsertgameplayer.php",
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