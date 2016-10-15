<form target="squeeze_iframe<?= $item; ?>" id="squeeze_form<?= $item; ?>" name="squeeze_form<?= $item; ?>"
      class="ck_subscribe_form" method="post" action="<?= $params['action']; ?>"
      accept-charset="utf-8" style="display:none">
    <input name="FNAME" id="squeeze_form<?= $item; ?>_fname" value="fpmafriend" size="20" type="text">
    <input name="LNAME" id="squeeze_form<?= $item; ?>_lname" value="lpmafriend" size="20" type="text">
    <table align="center" cellspacing="0" cellpadding="5" border="0">
        <tbody>
            <tr>
                <td valign="top"><font size="2" face="verdana,geneva">E-mail address:</font></td>
                <td valign="top"><input id="squeeze_form<?= $item; ?>_email" name="EMAIL" size="20" type="text"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input value="Submit" type="submit">&nbsp;
                </td>
            </tr>
        </tbody>
    </table>
</form>
<iframe name="squeeze_iframe<?= $item; ?>" style="display:none"></iframe>
