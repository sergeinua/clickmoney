$(document).ready(function(){
    $('#main-form').on('submit', function(){
        var email_value = $('#email').val();
        if (typeof from_page == 'undefined') {
            from_page = 'fp';
        }
        var fname = $('#name').val();
        $('body').append('<img id="menia_src" style="display: none">');
        validateEmail(email_value, from_page, fname);
        window.onbeforeunload = null;
    });

    $('#modal-submit').on('click', function () {
        $('#email').val($('#modal-email').val());
        $('#name').val($('#modal-name').val());
        from_page = 'exit';
        $('#main-form').trigger('submit');
        $(this).parents('.modal').modal('hide');
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
        // wistiaEmbed.pause();
    });

    $('.modal').on('hide.bs.modal', function() {
        // start playing video on modal hiding
        // wistiaEmbed.play();
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
