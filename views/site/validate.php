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

    switch (from_page) {
        case 'fe':
        case 'fe_mobile':
            prefix = '';
            break;
        case 'overlay':
        case 'overlay_mobile':
            prefix = 'overlay';
            break;
        case 'exit':
        case 'exit_mobile':
            prefix = 'exit';
            break;
        default:
            prefix = '';
            break;
    }

    processnow(email_value, prefix, fname);
    return false;
}

function processnow(semail, prefix, fname)
{
    $('.modal').modal('hide');
    $('#loading_sec').modal('show');

    <?php foreach ($forms as $form) : ?>

        <?php $prefix = (empty($form['prefix']) ? '' : $form['prefix']); ?>
        <?php $i = 1; ?>
        <?php $time = 1000; ?>
        <?php $step = 3000; ?>
        if (prefix == '<?= $prefix; ?>') {

            <?php foreach ($form['forms'] as $key => $value) : ?>

                    var mt = setTimeout(function(){
                        var email = semail;
                        var ufame = fname;
                        if(!ufame)
                        ufame = 'cmfriend';

                        jQuery('#squeeze_form<?= $i; ?><?= $prefix ? '_'.$prefix : ''; ?>_email').val(email);
                        jQuery('#squeeze_form<?= $i; ?><?= $prefix ? '_'.$prefix : ''; ?>_name').val(ufame);
                        jQuery('#squeeze_form<?= $i; ?><?= $prefix ? '_'.$prefix : ''; ?>').submit();
                        },<?= $time; ?>);
                    <?php $time += $step; ?>
                <?php $i++; ?>

            <?php endforeach; ?>

            var mt = setTimeout(function(){
                var mem_rdirect = "/accessapproved";
                top.location.href = mem_rdirect;
            }, <?= $time; ?>);

            return false;
        }

    <?php endforeach; ?>
}