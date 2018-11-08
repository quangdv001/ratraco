$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    // disable button after click
    // $('.has-spinner').click(function () {
    //     var btn = $(this);
    //     $(btn).buttonLoader('start');
    //     setTimeout(function () {
    //         $(btn).buttonLoader('stop');
    //     }, 3000);
    // });

    //preloader
    setTimeout(function () {
        init.hideLoader();
    }, 1000);
    $('.forms-sample').submit(function () {
        $('.has-spinner').buttonLoader('start');
    });

    // data table
    $('.myTable').DataTable();

    // show alert after redirect
    var success_message = $('.success_message').val();
    var error_message = $('.error_message').val();
    if (success_message) {
        global.notyPopup(success_message, 'success', 2500);
    }
    if (error_message) {
        init.notyPopup(error_message, 'error', 2500);
    }
});

var init = {
    notyPopup: function (text, type, time) {
        var icon = '';
        if (type === 'success') {
            icon = '<i class="fa fas fa-check"></i>';
        }
        if (type === 'error') {
            icon = '<i class="fa fas fa-times"></i>';
        }
        var txt = "<span class='noty-text'>" + icon + " " + text + "</span>";
        new Noty({
            theme: 'bootstrap-v4',
            type: type,
            timeout: time,
            layout: 'topRight',
            text: txt
        }).show();
    },
    showLoader: function () {
        $('#loader-wrapper, #loader').show();
        $('.container-scroller').hide();
    },
    hideLoader: function () {
        $('#loader-wrapper, #loader').hide();
        $('.container-scroller').show();
    }

};