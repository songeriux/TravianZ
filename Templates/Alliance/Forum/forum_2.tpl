<?php
//////////////// made by TTMTT ////////////////

$displayarray = $database->getUserArray($session->uid,1);
$forumcat = $database->ForumCat(htmlspecialchars($displayarray['alliance']));
?>
<h4 class="round">Alliance forum</h4>
<table cellpadding="1" cellspacing="1" id="alliance"><thead>
		<tr>
			<td></td>
			<td>Name of forum</td>
			<td>&nbsp;Thread&nbsp;</td>
			<td>&nbsp;Posts&nbsp;</td>
		</tr></thead><tbody>
<?php
foreach($forumcat as $arr) {
	$countop = $database->CountCat($arr['id']);
	$ltopic = $database->LastTopic($arr['id']);
	foreach($ltopic as $las) {
	}
	$lpos = $database->LastPost($las['id']);
	foreach($lpos as $pos) {
	}
	if($database->CheckLastTopic($arr['id'])){
		if($database->CheckLastPost($las['id'])){
			$lpost = date('y/m/d H:i ساعت',$pos['date']);
			$owner = $database->getUserArray($pos['owner'],1);
		}else{
			$lpost = date('y/m/d H:i ساعت',$las[date]);
			$owner = $database->getUserArray($las['owner'],1);
		}
	}else{
		$lpost = "";
		$owner = "";
	}
echo	'<tr><td class="ico">';
if($database->CheckEditRes($aid)=="1"){
	echo '<a class="up_arr" href="allianz.php?s=2&fid='.$arr['id'].'&bid=0&admin=pos&res=-1" title="To top"><img src="img/x.gif" alt="برو بالا" /></a>
    <a class="edit" href="allianz.php?s=2&idf='.$arr['id'].'&admin=editforum" title="edit"><img src="img/x.gif" alt="ویرایش" /></a>
    <br />
    <a class="down_arr" href="allianz.php?s=2&fid='.$arr['id'].'&bid=0&admin=pos&res=1" title="برو پایین"><img src="img/x.gif" alt="To bottom" /></a>
    <a class="fdel" href="allianz.php?s=2&idf='.$arr['id'].'&admin=delforum" onClick="return confirm(\'آیا مطمئن هستی؟\');" title="delete"><img src="img/x.gif" alt="حذف" /></a>';
}else{
	echo '<img class="folder" src="img/x.gif" title="موضوع بدون پست های جدید" alt="موضوع بدون پست های جدید">';
}		
echo '</td><td class="tit"><a href="allianz.php?s=2&fid='.$arr['id'].'&pid='.$aid.'" title="'.$arr['forum_name'].'">'.$arr['forum_name'].'</a><br />'.$arr['forum_des'].'</td>
			<td class="cou">'.$countop.'</td>
			<td class="last">'.$lpost.'</span><span><br /><a href="spieler.php?uid='.$owner['id'].'">'.$owner['username'].'</a> <img class="latest_reply" src="img/x.gif" alt="نمایش آخرین پست" title="نمایش آخرین پست" /></td>
		</tr>';
		
}
?>
		</tbody></table><p>
		<?php
			$opt = $database->getAlliPermissions($session->uid, $aid);
			if($opt['opt5'] == 1){
				echo "<button type=\"button\" value=\"فروم جدید\" class=\"build\" onclick=\"window.location.href = 'allianz.php?s=2&admin=newforum'; return false;\">
<div class=\"button-container\"><div class=\"button-position\"><div class=\"btl\"><div class=\"btr\"><div class=\"btc\"></div></div></div>
<div class=\"bml\"><div class=\"bmr\"><div class=\"bmc\"></div></div></div><div class=\"bbl\"><div class=\"bbr\"><div class=\"bbc\"></div></div></div>
</div><div class=\"button-contents\">New forum</div></div></button>

<button type=\"button\" value=\"تنظیمات\" class=\"build\" onclick=\"window.location.href = 'allianz.php?s=".$ids."&admin=switch_admin'; return false;\">
<div class=\"button-container\"><div class=\"button-position\"><div class=\"btl\"><div class=\"btr\"><div class=\"btc\"></div></div></div>
<div class=\"bml\"><div class=\"bmr\"><div class=\"bmc\"></div></div></div><div class=\"bbl\"><div class=\"bbr\"><div class=\"bbc\"></div></div></div>
</div><div class=\"button-contents\">Options</div></div></button>";
			}
		?>
</p>