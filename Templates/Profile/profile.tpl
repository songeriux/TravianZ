<?php 
$varmedal = $database->getProfileMedal($session->uid);  ?>
<form action="spieler.php" method="POST">
    <input type="hidden" name="ft" value="p1" />
    <input type="hidden" name="uid" value="<?php echo $session->uid; ?>" />
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
		<h4 class="round">Edit Profile</h4>
	<table cellpadding="1" cellspacing="1" id="editDetails" class="transparent">
		<tbody>
			<tr>
                <?php 
    if($session->userinfo['birthday'] != 0) {
   $bday = explode("-",$session->userinfo['birthday']);
   }
   else {
   $bday = array('','','');
   }
   ?>

				<th class="birth">Birthday</th>
				<td class="birth">
					
					<input tabindex="3" type="text" name="jahr" value="<?php echo $bday[0]; ?>" maxlength="4" class="text year">
                    <select tabindex="2" name="monat" class="dropdown">
<option value="0"></option><option value="1" <?php if($bday[1] == 1) { echo "selected"; } ?>>January</option><option value="2"<?php if($bday[1] == 2) { echo "selected"; } ?>>Febuary</option><option value="3"<?php if($bday[1] == 3) { echo "selected"; } ?>>Március</option><option value="4"<?php if($bday[1] == 4) { echo "selected"; } ?>>Ápril</option><option value="5"<?php if($bday[1] == 5) { echo "selected"; } ?>>May</option><option value="6"<?php if($bday[1] == 6) { echo "selected"; } ?>>June</option><option value="7"<?php if($bday[1] == 7) { echo "selected"; } ?>>July</option><option value="8"<?php if($bday[1] == 8) { echo "selected"; } ?>>August</option><option value="9"<?php if($bday[1] == 9) { echo "selected"; } ?>>September</option><option value="10"<?php if($bday[1] == 10) { echo "selected"; } ?>>October</option><option value="11"<?php if($bday[1] == 11) { echo "selected"; } ?>>November</option><option value="12"<?php if($bday[1] == 12) { echo "selected"; } ?>>December</option>                	</select>
                    <input tabindex="1" class="text day" type="text" name="tag" value="<?php echo $bday[2]; ?>" maxlength="2">
                    </td>
				<th class="gender" rowspan="2">Gender</th>
				<td class="gender" rowspan="2">
					<label>
						<input class="radio" type="radio" name="mw" value="0" <?php if($session->userinfo['gender'] == 0) { echo "checked"; } ?>> Not Specified</label><br>
					<label>
						<input class="radio" type="radio" name="mw" value="1" tabindex="5" <?php if($session->userinfo['gender'] == 1) { echo "checked"; } ?>> Male</label><br>
					<label>
						<input class="radio" type="radio" name="mw" value="2" <?php if($session->userinfo['gender'] == 2) { echo "checked"; } ?>>Female</label>
				</td>
			</tr>
			<tr>
				<th>Location</th>
				<td><input tabindex="4" type="text" name="ort" value="<?php echo $session->userinfo['location']; ?>" maxlength="30" class="text">
				</td>
			</tr>
		</tbody>
	</table>

		<h4 class="round spacer">Description</h4>
	<textarea tabindex="6" style="text-align:center;" class="editDescription editDescription1" name="be1"><?php echo $session->userinfo['desc2']; ?></textarea>
	<textarea tabindex="7" style="text-align:center;" class="editDescription editDescription2" name="be2"><?php echo $session->userinfo['desc1']; ?></textarea>
	<div class="clear"></div>

				<div class="switchWrap">
			<div class="openedClosedSwitch switchClosed" id="switchMedals">Medals</div>
			<div class="clear"></div>
		</div>

		<table cellpadding="1" cellspacing="1" id="medals" class="hide">
			<thead>
				<tr>
					<td>Category/td>
					<td>Rank</td>
					<td>Week</td>
					<td>BB-code</td>
				</tr>
			</thead>
			<tbody>
									<tr>
													<td class="typ">Kezdővédelem</td>
													<td class="ra"></td>
													<td class="we"></td>
													<td class="bb">[#0]</td>
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
	$titel="Medál";
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
        $titel="تاپ10 مهاجمین و مدافعین";
        break;
    case "6":
        $titel="مهاجمین هفته با ".$medal['points']." امتیاز بین 3 نفر اول.";
        break;
    case "7":
        $titel="مدافعین هفته با ".$medal['points']." امتیاز بین 3 نفر اول.";
        break;
    case "8":
        $titel="پیشرفت کننده های هفته با ".$medal['points']." امتیاز بین 3 نفر اول.";
        break;
    case "9":
        $titel="غارتگران هفته با ".$medal['points']." امتیاز بین 3 نفر اول.";
        break;
    case "10":
        $titel="پیشرفت کننده های هفته";
        break;
    case "11":
        $titel="پیشرفت کننده های هفته با ".$medal['points']." امتیاز بین 3 نفر اول.";
        break;
    case "12":
        $titel="مهاجمین هفته با ".$medal['points']." امتیاز بین 10 نفر اول.";
        break;
	}			
				 echo"<tr>
				   <td class=\"typ\"> ".$titel."</td>
				   <td class=\"ra\">".$medal['plaats']."</td>
				   <td class=\"we\">".$medal['week']."</td>
				   <td class=\"bb\">[#".$medal['id']."]</td>
			 	 </tr>";
				 } ?>				
				

			</tbody>
		</table>
	
		<h4 class="round spacer">Villages</h4>

	<table cellpadding="1" cellspacing="1" id="villages">
		<thead>
			<tr>
				<th class="name">Name</th>
                <th>Oasis</th>
				<th>Popualtion</th>
                <th>Coordiantes</th>
			</tr>
		</thead>
		<tbody>
<?php
$prefix = "".TB_PREFIX."vdata";
	$sql = mysql_query("SELECT * FROM $prefix WHERE owner = $session->uid ORDER BY pop DESC");
    $name = 0;

	while($row = mysql_fetch_array($sql)){ 
    echo "<tr>";
    echo "<td class=\"name\"><input tabindex=\"6\" type=\"text\" name=\"dname$name\" value=\"".$row['name']."\" maxlength=\"20\" class=\"text\"> ";
    if($row['capital'] == 1) {
        echo "<span class=\"mainVillage\">(Capital)</span>";
    }
    echo "</td>";
    echo "<td class=\"oases\">";
$prefix = "".TB_PREFIX."odata";
$sql2 = mysql_query("SELECT * FROM $prefix WHERE owner = ".$session->uid." AND conqured = ".$row['wref']."");
while($row2 = mysql_fetch_array($sql2)){
$type = $row2["type"];
switch($type) {
case 1:
case 2:
echo  "<img class='r1' src='img/x.gif' title='Fa'>";
break;
case 3:
echo  "<img class='r1' src='img/x.gif' title='Fa'> <img class='r4' src='img/x.gif' title='Búza'>";
break;
case 4:
case 5:
echo  "<img class='r2' src='img/x.gif' title='Agyag'>";
break;
case 6:
echo  "<img class='r2' src='img/x.gif' title='Agyag'> <img class='r4' src='img/x.gif' title='Búza'>";
case 7:
case 8:
echo  "<img class='r3' src='img/x.gif' title='Vasérc'>";
break;
case 9:
echo  "<img class='r3' src='img/x.gif' title='Vasérc'> <img class='r4' src='img/x.gif' title='Búza'>";
break;
case 10:
case 11:
case 12:
echo  "<img class='r4' src='img/x.gif' title='Búza'>";
break;
}
}
    echo "</td>";
    echo "<td class=\"inhabitants\"> ".$row['pop']." </td>";
    $prefix = "".TB_PREFIX."wdata";
    $sql2 = mysql_query("SELECT * FROM $prefix WHERE id = ".$row['wref']."");
    $coords = mysql_fetch_array($sql2);
    echo "<td class=\"coords\"><a href=\"karte.php?x=".$coords['y']."&y=".$coords['x']."\">
    	  <span class=\"coordinates coordinatesAligned\">
          	<span class=\"coordinatesWrapper\">
          		<span class=\"coordinateY\">(".$coords['y']."</span>
          		<span class=\"coordinatePipe\">|</span>
          		<span class=\"coordinateX\">".$coords['x'].")</span>
          	</span>
          </span></td>";
    echo "</tr>";
    $name++;
    }
    ?>
					</tbody>
	</table>

	<div class="submitButtonContainer">
		<button type="submit" value="Mentés" name="s1" id="btn_ok"><div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div><div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div></div><div class="button-contents">Save</div></div></button>	</div>
</form><script type="text/javascript">
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