$(function () {
    var payouts = {};
    
    $('#Configure_Payouts').on('click', function () {
        $('#Modal_Overlay').removeClass('hidden');
        $('.popup.set-payouts').removeClass('hidden');
    });

    $('#Button_Accept_Suggested_Payout').on('click', function () {
        payouts = $('#Suggested-Payouts').val();
        upsertPayouts(payouts);
    });

    $('#Button_Upsert_Custom_Payout').on('click', function () {
        payouts = $('#Suggested-Payouts').val();
        if (payouts.length && $('#Pot_Total').val() == 0) {
            upsertPayouts(payouts);
        }
        else {
            alert('You must assign all of the monies before you can save. Hit back to accept suggested payout.');
        }
    });

    $('#Button_Custom_Payout').on('click', function () {
        $('.suggested-payout').addClass('hidden');
        $('.custom-payout').removeClass('hidden');
    });

    $('#Button_Suggested_Payout').on('click', function () {
        $('.custom-payout').addClass('hidden');
        $('.suggested-payout').removeClass('hidden');
    });

    $('#Button_Add_Custom_Payout').on('click', function () {
        var place = $('#PlaceValue').val();
        var amount = $('#Amount').val();
        payouts[place] = amount;
    });

    function upsertPayouts(data) {
        $.each(data, function() {
          $.each(this, function(name, value) {
            upsertPayout(name, value);
          });
        });
    }

    function upsertPayout(place, amount) {
        var data = {
            'GameID': $('.game').data('id'),
            'PlaceValue': place,
            'Amount': amount
        };

        $.ajax({
            url: "api/upsertpayout.php",
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
                    $('.popup.set-payouts').addClass('hidden');
                    location.reload();
                }
            }
        })
        .error(function (e) {
            alert(e.responseText);
        });
    }
});