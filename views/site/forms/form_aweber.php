<form target="squeeze_iframe<?= $item; ?>" method="post" id="squeeze_form<?= $item; ?>" class="af-form-wrapper" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl" style="display: none;" >
    <div style="display: none;">
        <input type="hidden" name="meta_web_form_id" value="<?= $params['meta_web_form_id']; ?>" />
        <input type="hidden" name="meta_split_id" value="" />
        <input type="hidden" name="listname" value="<?= $params['listname']; ?>" />
        <input type="hidden" name="redirect" value="<?= $params['redirect_url']; ?>" id="<?= $params['redirect_id']; ?>" />

        <input type="hidden" name="meta_adtracking" value="<?= $params['meta_adtracking']; ?>" />
        <input type="hidden" name="meta_message" value="<?= $params['meta_message']; ?>" />
        <input type="hidden" name="meta_required" value="name,email" />

        <input type="hidden" name="meta_tooltip" value="" />
    </div>
    <input name="name" id="squeeze_form<?= $item; ?>_name" value="cfoverlayfriend" type="text">
    <input class="text" name="email" id="squeeze_form<?= $item; ?>_email" value="" type="text">
    <div style="display: none;"><img src="<?= $params['img_url']; ?>" alt="" /></div>
</form>
<iframe name="squeeze_iframe<?= $item; ?>" style="display:none"></iframe>

