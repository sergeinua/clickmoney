$(document).ready(function(){
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
});
