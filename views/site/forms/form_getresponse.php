<form id="squeeze_form<?= $item; ?>" name="squeeze_form<?= $item; ?>" target="squeeze_iframe<?= $item; ?>" action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
    <div style="display: none;">
        email: <input name="email" id="squeeze_form<?= $item; ?>_email" type="text"><br>
        <input name="first_name" id="squeeze_form<?= $item; ?>_fname" type="text"><br>
        <input name="campaign_token" value="<?= $params['campaign_token']; ?>" type="hidden">
        <input name="start_day" value="0" type="hidden">
        <input value="Subscribe" type="submit">
    </div>
</form>
<iframe name="squeeze_iframe<?= $item; ?>" style="display:none"></iframe>