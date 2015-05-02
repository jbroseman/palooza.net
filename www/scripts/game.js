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

    $('.players li').on('click', function () {
        $('.player-menu:not(.hidden)').addClass('hidden');
        $(this).find('.player-menu').removeClass('hidden');
    });

    $('.player-menu-collapse').on('click', function (e) {
        e.stopImmediatePropagation();
        $('#Modal_Overlay').addClass('hidden');
        $(this).closest('.player-menu').addClass('hidden');
    });

    $('#Button_Buy_In').on('click', function (e) {
        e.stopImmediatePropagation();
        upsertPlayerBuyin($(this).closest('li').data('gameplayerid'), false);
    });

    $('#Button_Rebuy').on('click', function (e) {
        e.stopImmediatePropagation();
        upsertPlayerBuyin($(this).closest('li').data('gameplayerid'), true);
    });

    $('#Button_Place').on('click', function (e) {
        e.stopImmediatePropagation();
        upsertPlayerPlacing();
    });

    $('#Button_Remove_Player').on('click', function (e) {
        e.stopImmediatePropagation();
        removePlayer();
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
                    $('.popup-new-game').addClass('hidden');
                    location.reload();
                }
            }
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }

    function upsertGamePlayer() {
        var data = {
            'GameID': $('.game').data('id'),
            'PlayerID': $('#PlayerID').val(),
            'FirstName': $('#FirstName').val(),
            'LastName': $('#LastName').val(),
            'Phone': $('#Phone').val(),
            'Email': $('#Email').val()
        };

        $.ajax({
            url: "api/upsertgameplayer.php",
            type: "post",
            data: JSON.stringify(data),
            dataType: 'json'
        })
        .done(function (data) {
            if (data) {
                if (data.message) {
                    $('#result_message').html(data.message);
                }
                else {
                    $('#modal_overlay').addClass('hidden');
                    $('.popup-add-player').addClass('hidden');
                    location.reload();
                }
            }
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }

    function upsertPlayerBuyin(gpid, isrebuy) {
        var data = {
            'GamePlayerID': gpid,
            'IsRebuy': isrebuy
        };

        $.ajax({
            url: "api/upsertbuyin.php",
            type: "post",
            data: JSON.stringify(data),
            dataType: 'json'
        })
        .done(function (data) {
            if (data) {
                if (data.message) {
                    $('#result_message').html(data.message);
                }
                else {
                    $('#modal_overlay').addClass('hidden');
                    $('.popup player-menu').addClass('hidden');
                    location.reload();
                }
            }
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }

    function upsertPlayerPlacing() {
        var data = {
            'GamePlayerID': $('#GamePlayerID').val()
        };

        $.ajax({
            url: "api/upsertbuyin.php",
            type: "post",
            data: JSON.stringify(data),
            dataType: 'json'
        })
        .done(function (data) {
            if (data) {
                if (data.message) {
                    $('#result_message').html(data.message);
                }
                else {
                    $('#modal_overlay').addClass('hidden');
                    $('.popup player-menu').addClass('hidden');
                    location.reload();
                }
            }
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }
});