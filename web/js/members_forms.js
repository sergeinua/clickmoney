function formModifcation(fname, email) {
    setTimeout(function() {
        if (forms_modified == false) {
            $('input[name="firstname"]').addClass('email-reg-name email-Reg0').val(fname);
            $('input[name="lastname"]').addClass('email-reg-name email-Reg0 email-Reg2');
            $('select[name="countryabbr"]').addClass('bfh-countries select-register email-reg-name email-Reg0');
            $('.form-control.bfh-phone').addClass('email-reg-name email-Reg0 email-Reg4');
            $('input[name="email"]').addClass('email-Reg0 email-reg-bestem').val(email);
            $('input[name="password"]').addClass('col-xs-12 email-Reg0 email-Reg6 email-reg-name');
            $('label.control-label').css('display', 'none');
            $('div.checkbox').css('display', 'none');
            $('button.btn.btn-danger.btn-lg.tradeBtn').remove();
            $('div.checkbox').parent().append(button);
            $('#gaff.gaff form').find('.row').eq(2).addClass('register-last-row');
            var first_row = $('.gaff.middle-form').find('.row').eq(0);
            var second_row = $('.gaff.middle-form').find('.row').eq(1);
            var third_row = $('.gaff.middle-form').find('.row').eq(2);
            third_row.addClass('register-last-row');
            first_row.prepend(left_top_arrow);
            first_row.find('.col-md-6.form-group').removeClass('col-md-6').addClass('col-md-2 col-sm-6 form-group');
            first_row.append(right_top_arrow);
            second_row.prepend(left_middle_arrow);
            second_row.find('.col-md-6.form-group').removeClass('col-md-6').addClass('col-md-2 col-sm-6 form-group');
            second_row.append(right_middle_arrow);
            third_row.prepend(left_bottom_arrow);
            third_row.find('.col-md-6.form-group').removeClass('col-md-6').addClass('col-md-2 col-sm-6 form-group');
            third_row.append(right_bottom_arrow);
            forms_modified = true;
            $('.gaff, .gaff.middle-form').css('display', 'block');
            $('.membership-header .row.text-center.icons-block').show();
            $('.membership-header .membership-block-text').show();
            $('.last-chace-register .membership-block-text').show();
            $('.last-chace-register .icons-block.text-center').show();
        }
    }, 500);
}