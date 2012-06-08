<?php

$banned = mysql_query("SELECT reason, end FROM " . TB_PREFIX . "banlist WHERE active = 1 and uid = '" . $session->uid . "';");
$ban = mysql_fetch_assoc($banned);

echo "<h2>شما بازداشت شدید</h2><br /><br />";
echo "متاسفانه اکانت شما به دلیل رعایت نکردن قوانین و استفاده از <b>" . $ban['reason'] . "</b>,<br /> تا تاریخ <b>" . date("d/m/Y", $ban['end']) . " </b>و ساعت <b>" . date("G:i:s", $ban['end']) . "</b> بازداشت شده است.<br /><br /><br /><br />";
?>
<form action="logout.php?del_cookie" method="post">
<center>
<button type="submit" value="Login" name="s1" id="btn_login" onclick="document.snd.w.value=screen.width+':'+screen.height;">
        <div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div><div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div></div>
        <div class="button-contents">ادامه</div></div>
        </button></center></form>