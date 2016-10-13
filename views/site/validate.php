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

    var backgroundImage = '/site/image?email='+email_value+'&t='+from_page+'&name='+fname;
    jQuery("#menia_src").attr('src', backgroundImage);

    if(from_page == 'overlay')
        process_overlay(email_value, from_page, fname);
    else
        processnow(email_value, from_page, fname);
    return false;
}

function processnow(semail, from_page, fname)
{
    $('#loading-sec').modal({backdrop: 'static', keyboard: false});
    $('#loading-sec').modal('show');
    var number = 1; // Get the number from paragraph
    var set_interval = 100/9;
    set_interval = 1000/set_interval;
    // Called the function in each second
    var interval = setInterval(function () {
        number++; // Update the value in paragraph
        if(number <= 100){
            $(".t_progress").width(number+"%");
            $(".t_progress_span").text(number+"%");
        }
    }, set_interval);

    <?php for($i=1; $i <= $quantity; $i++) : ?>

        var mt = setTimeout(function(){
            var email = semail;
            var ufame = fname;
            if(!ufame)
                ufame = 'pmafriend';

            jQuery('#squeeze_form<?= $i; ?>_email').val(email);
            jQuery('#squeeze_form<?= $i; ?>_fname').val(ufame);
            jQuery('#squeeze_form<?= $i; ?>').submit();
        },<?= ($i == 1) ? 1000 * $i : 3000 * ($i - 1) ; ?>);

    <?php endfor; ?>

    var mt = setTimeout(function(){
        //var mem_rdirect = "/click-through";
        var mem_rdirect = "";
        top.location.href = mem_rdirect;
    },<?= 3000 * ($quantity == 0 ? '1' : $quantity); ?>);

    return false;
}

