$(function () {
    if (!$('.game').data('id') || $('.game').data('id') == 0)
    {
        $('#Modal_Overlay').removeClass('hidden');
        $('.popup.main-menu').removeClass('hidden');
    };
    
    $(".blinds li.completed-0").first().addClass('active');
    
    $('#Menu_Expand').on('click', function () {
        $('#Modal_Overlay').removeClass('hidden');
        $('.popup.main-menu').removeClass('hidden');
    });

    $('.menu-collapse').on('click', function () {
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
    
    $('#Configure_Payouts').on('click', function () {
        $('#Modal_Overlay').removeClass('hidden');
        $('.popup.set-payouts').removeClass('hidden');
    });

    $('#Button_Upsert_Payouts').on('click', function () {
        upsertPayouts();
    });

    $('.button.close-popup').on('click', function () {
        $('#Modal_Overlay').addClass('hidden');
        $('.popup').addClass('hidden');
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
        }).done(function (data) {
            if (data)
            {
                if (data.message) {
                    $('#result_message').html(data.message);
                }
                else {
                    $('#modal_overlay').addClass('hidden');
                    $('.popup.new-game').addClass('hidden');
                    location.reload();
                }
            }
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }

    function upsertPayouts(data) {
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
        }).done(function (data) {
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
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }
});