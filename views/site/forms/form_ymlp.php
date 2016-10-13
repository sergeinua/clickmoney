<form target="squeeze_iframe<?= $item; ?>" id="squeeze_form<?= $item; ?>" name="squeeze_form<?= $item; ?>"
      method="post" action="<?= $params['action']; ?>" style="display: none;">
    <input name="name" id="squeeze_form<?= $item; ?>_name" value="pmafriend" size="20" type="text">
    <table align="center" cellspacing="0" cellpadding="5" border="0">
        <tbody>
            <tr>
                <td colspan="2"><font size="2" face="verdana,geneva">Fill out your e-mail address<br>to receive our newsletter!</font>
                </td>
            </tr>
            <tr>
                <td valign="top"><font size="2" face="verdana,geneva">E-mail address:</font></td>
                <td valign="top">
                    <input id="squeeze_form<?= $item; ?>_email" name="YMP0" size="20" type="text">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input value="Submit" type="submit">&nbsp
                </td>
            </tr>
        </tbody>
    </table>
</form>
<iframe name="squeeze_iframe<?= $item; ?>" style="display:none"></iframe>