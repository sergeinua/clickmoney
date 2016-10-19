var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
var PreventExitSplash = true;
function validateEmail(email_value, from_page, fname)
{
    var def_value = document.getElementById("email").defaultValue;
    if(email_value == '' || email_value == def_value)
    {
        alert('Please Enter Email Address');
        return false;
    }
    else if(!email_value.match(emailExp))
    {
        alert('Please Enter Valid Email Address');
        return false;
    }

    if(!from_page)
    from_page = 'fe';

    $('body').append('<img id="menia_src" style="display: none">');
    var backgroundImage = '/site/image?email='+email_value+'&t='+from_page+'&name='+fname;
    jQuery("#menia_src").attr('src', backgroundImage);

    if(from_page == 'overlay')
        process_overlay(email_value, from_page, fname);
    else
        processnow(email_value, from_page, fname);
    return false;
}

<?php if ($esp_forms): ?>
function processnow(semail, from_page, fname)
{
    $('.modal').modal('hide');
    $('#loading_sec').modal('show');

    <?php $time = 1000; ?>
    <?php $step = 3000; ?>
    <?php for($i=1; $i <= sizeof($esp_forms); $i++) : ?>

        var mt = setTimeout(function(){
            var email = semail;
            var ufame = fname;
            if(!ufame)
                ufame = 'cmfriend';

            jQuery('#squeeze_form<?= $i; ?>_email').val(email);
            jQuery('#squeeze_form<?= $i; ?>_fname').val(ufame);
            jQuery('#squeeze_form<?= $i; ?>').submit();
        },<?= $time; ?>);
    <?php $time += $step; ?>

    <?php endfor; ?>

    var mt = setTimeout(function(){
        var mem_rdirect = "/click-through";
        top.location.href = mem_rdirect;
    },<?= $time; ?>);

    return false;
}
<?php endif; ?>

<?php if ($esp_forms_exit): ?>
function process_overlay(semail, from_page, fname)
{
    $('.modal').modal('hide');
    $('#loading_sec').modal('show');

    <?php $time = 1000; ?>
    <?php $step = 3000; ?>
    <?php for($i=1; $i <= sizeof($esp_forms_exit); $i++) : ?>

        var mt = setTimeout(function(){
            var email = semail;
            var ufame = fname;
            if(!ufame)
                ufame = 'cmoverlayfriend';

            jQuery('#squeeze_form<?= $i; ?>_exit_email').val(email);
            jQuery('#squeeze_form<?= $i; ?>_exit_fname').val(ufame);
            jQuery('#squeeze_form<?= $i; ?>_exit').submit();
        }, <?= $time; ?>);
        <?php $time += $step; ?>

    <?php endfor; ?>

    var mt = setTimeout(function(){
        var mem_rdirect = "/click-through";
        top.location.href = mem_rdirect;
    }, <?= $time; ?>);

    return false;
    }
<?php endif; ?>
