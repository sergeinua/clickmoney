$(document).ready(function(){
    $('#main-form').on('submit', function(){
        var email_value = $('#email').val();
        if (typeof from_page == 'undefined') {
            from_page = 'fe';
        }
        if (from_page == 'mobile') {
            from_page = 'fe_mobile';
        }
        var fname = $('#name').val();
        validateEmail(email_value, from_page, fname);
        window.onbeforeunload = null;
    });

    $('#freereport-form').on('submit', function () {
        var email = $('#freereport-form #email').val(),
            name = $('#freereport-form #name').val();
        if (typeof from_page == 'undefined') {
            from_page = 'exit';
        }
        if (from_page == 'mobile') {
            from_page = 'exit_mobile';
        }
        validateEmail(email, from_page, name);
        window.onbeforeunload = null;
    });

    $('#exit-popup-form').on('submit', function () {
        var name = $('#exitpopup #name').val(),
            email = $('#exitpopup #email').val();
        if (typeof from_page == 'undefined') {
            from_page = 'overlay';
        }
        if (from_page == 'mobile') {
            from_page = 'overlay_mobile';
        }
        validateEmail(email, from_page, name);
        window.onbeforeunload = null;
    });

    $('#fe-2-form').on('submit', function () {
        var name = $('#fe-2-form #name').val(),
            email = $('#fe-2-form #email').val();
        if (typeof from_page == 'undefined') {
            from_page = 'fe';
        }
        if (from_page == 'mobile') {
            from_page = 'fe_mobile';
        }
        validateEmail(email, from_page, name);
        window.onbeforeunload = null;
    });



    var is_shown = false;
    //
    // window.onbeforeunload = function () {
    //     if (!is_shown) {
    //         $("#myModal").modal('show');
    //     }
    //     return false;
    // };

    var iframe = $('#vim-video');
    var player = new Vimeo.Player(iframe);
    // setTimeout(function(){player.pause()}, 3000);

    setTimeout(function(){
        //console.log("times up");
        $(document).mousemove(function (e) {
            if (e.pageY <= 20 && !is_shown) {
                $("#exitpopup").modal('show');
            }
        });
    }, 10000);

    $('.modal').on('show.bs.modal', function() {
        // stop playing video on modal showing
        player.pause();
    });

    $('.modal').on('hide.bs.modal', function() {
        // start playing video on modal hiding
        player.play();
    });

    $('.modal').on('shown.bs.modal', function() {
        // set flag when modal is shown
        is_shown = true;
    });

    $('.modal').on('hidden.bs.modal', function() {
        // reset flag when modal is hidden
        is_shown = false;
    });



});
