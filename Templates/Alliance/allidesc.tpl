<?php  

if(isset($aid)) {
$aid = $aid;
}
else {
$aid = $session->alliance;
} 
$varmedal = $database->getProfileMedalAlly($aid); 
$allianceinfo = $database->getAlliance($aid);
$memberlist = $database->getAllMember($aid);
$totalpop = 0;
foreach($memberlist as $member) {
	$totalpop += $database->getVSumField($member['id'],"pop");
}

echo "<h1>Alliance - ".$allianceinfo['tag']."</h1>";
include("alli_menu.tpl");  
  
?>
<h4 class="round">Description</h4>
<form method="post" action="allianz.php">
<input type="hidden" name="a" value="3">
<input type="hidden" name="o" value="3">
<input type="hidden" name="s" value="5">
		<textarea class="editDescription editDescription1" tabindex="1" name="be1"><?php echo $allianceinfo['desc']; ?></textarea>
		<textarea class="editDescription editDescription2" tabindex="2" name="be2"><?php echo $allianceinfo['notice']; ?></textarea>
		<div class="clear"></div>
    <script type="text/javascript">
	window.addEvent('domready', function()
	{
		if ($('switchMedals'))
		{
			$('switchMedals').addEvent('click', function(e)
			{
				Travian.toggleSwitch($('medals'), $('switchMedals'));
			});
		}
	});


</script>
				<div class="switchWrap">
			<div class="openedClosedSwitch switchClosed" id="switchMedals">Medals</div>
			<div class="clear"></div>
		</div>
<br />
        <table cellpadding="1" cellspacing="1" id="medals" class="hide">
				<tr>
					<td>Category</td>
					<td>Rank</td>
					<td>Week</td>
					<td>(BB) Code </td>
				</tr>
                <?php
/******************************
INDELING CATEGORIEEN:
===============================
== 1. Aanvallers top 10      ==
== 2. Defence top 10         ==
== 3. Klimmers top 10        ==
== 4. Overvallers top 10     ==
== 5. In att en def tegelijk ==
== 6. in top 3 - aanval      ==
== 7. in top 3 - verdediging ==
== 8. in top 3 - klimmers    ==
== 9. in top 3 - overval     ==
******************************/                
                
                
    foreach($varmedal as $medal) {
    $titel="جایزه";
    switch ($medal['categorie']) {
    case "1":
        $titel="مهاجمین هفته";
        break;
    case "2":
        $titel="مدافعین هفته";
        break;
    case "3":
        $titel="پیشرفت کننده های هفته";
        break;
    case "4":
        $titel="غارتگران هفته";
        break;
    case "5":
        $titel="بین 10 نفر مهاجمین و مدافعین هفته";
        break;
    case "6":
        $titel="بین 3 مهاجمین اول با ".$medal['points']." امتیاز";
        break;
    case "7":
        $titel="بین 3 مدافعین اول با ".$medal['points']." امتیاز";
        break;
    case "8":
        $titel="بین 3 پیشرفت کننده اول با ".$medal['points']." امتیاز";
        break;
    case "9":
        $titel="بین 3 غارتگر اول با ".$medal['points']." منابع";
        break;
    case "10":
        $titel="پیشرفت کننده هفته";
        break;
    case "11":
        $titel="بین 3 پیشرفت کننده اول با ".$medal['points']." امتیاز";
        break;
    case "12":
        $titel="بین 3 مهاجمین اول با ".$medal['points']." امتیاز";
        break;
    }            
                 echo"<tr>
                   <td> ".$titel."</td>
                   <td>".$medal['plaats']."</td>
                   <td>".$medal['week']."</td>
                   <td>[#".$medal['id']."]</td>
                  </tr>";
                 } ?>
                 </table></p>

	<p class="btn">
		<button type="submit" value="ذخیره" name="s1" id="btn_save" tabindex="3"><div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div><div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div></div><div class="button-contents">Save</div></div></button>
		</p>
	</form>

<p class="error"><?php echo $form->getError("error"); ?></p>