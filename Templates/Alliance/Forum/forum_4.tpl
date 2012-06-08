<?php
//////////////// made by TTMTT ////////////////

$cat_id = $_GET['fid'];
$CatName = $database->ForumCatName($cat_id);
$ChckTopic = $database->CheckCatTopic($cat_id);
$Topics = $database->ForumCatTopic($cat_id);
$TopicsStick = $database->ForumCatTopicStick($cat_id);
?>

<h4><a href="allianz.php?s=2">اتحاد</a> <a class="arrowForum" href="allianz.php?s=2&pid=<?php echo $_GET['pid']; ?>&fid=<?php echo $cat_id; ?>"><?php echo $CatName; ?></a></h4>
<h4 class="round"><?php echo $CatName; ?></h4>
<table cellpadding="1" cellspacing="1" id="topics"><thead>
	<tr>
		<td></td>
		<td>موضوعات</td>
		<td>پاسخ ها</td>
		<td>آخرین پست</td>
	</tr></thead><tbody>
<?php
if($ChckTopic){
	foreach($TopicsStick as $arrs) {
		$CountPosts = $database->CountPost($arrs['id']);
		$lposts = $database->LastPost($arrs['id']);
			foreach($lposts as $post) {
			}
		if($database->CheckLastPost($arrs[id])){
			$post_dates = date('y/m/d, H:i ساعت',$post['date']);
			$owner_topics = $database->getUserArray($post['owner'],1);
		}else{
			$post_dates = date('y/m/d, H:i ساعت',$arrs['date']);
			$owner_topics = $database->getUserArray($arrs['owner'],1);
		}
		
		echo '<tr><td class="ico">';
		if($database->CheckEditRes($aid)=="1"){
			if($database->CheckCloseTopic($arrs['id']) == 1){
				$locks = '<a class="unlock" href="?s=2&fid='.$_GET['fid'].'&idt='.$arrs['id'].'&admin=unlock" title="باز کردن تاپیک"><img src="img/x.gif" alt="باز کردن تاپیک" /></a>';
			}else{
				$locks = '<a class="lock" href="?s=2&fid='.$_GET['fid'].'&idt='.$arrs['id'].'&admin=lock" title="قفل کردن تاپیک"><img src="img/x.gif" alt="قفل کردن تاپیک" /></a>';
			}
			echo ''.$locks.'<a class="edit" href="?s=2&idf='.$_GET['fid'].'&idt='.$arrs['id'].'&admin=edittopic" title="ویرایش"><img src="img/x.gif" alt="ویرایش" /></a><br /><a class="unpin" href="?s=2&fid='.$_GET['fid'].'&idt='.$arrs['id'].'&admin=unpin" title="stick topic"><img src="img/x.gif" alt="stick topic" /></a><a class="fdel" href="?s=2&fid='.$_GET['fid'].'&idt='.$arrs['id'].'&admin=deltopic" title="حذف"><img src="img/x.gif" alt="حذف" onClick="return confirm(\'آیا مطمئن هستی؟\');" /></a>';
		}elseif($arrs['close']=="1"){
			echo '<img class="folder_sticky_lock" src="img/x.gif" alt="تاپیک بسته بدون پست جدید" title="تاپیک بسته بدون پست جدید" />';
		}else{
			echo '<img class="folder_sticky" src="img/x.gif" alt="موضوع مهم بدون پست جدید" title="موضوع مهم بدون پست جدید" />';
		}
		echo '</td>
		<td class="tit"><a href="allianz.php?s=2&pid='.$aid.'&tid='.$arrs['id'].'">'.$arrs['title'].'</a><br></td>
		<td class="cou">'.$CountPosts.'</td>
		<td class="last">'.$post_dates.'<br /><a href="spieler.php?uid='.$arrs[owner].'">'.$owner_topics['username'].'</a> <a href="allianz.php?s=2&pid='.$aid.'&tid='.$arrs['id'].'&seite=max"><img class="latest_reply" src="img/x.gif" alt="نمایش آخرین پست" title="نمایش آخرین پست" /></a>
		</td></tr>';
	
	}

	foreach($Topics as $arr) {
		$CountPost = $database->CountPost($arr['id']);
		$lpost = $database->LastPost($arr['id']);
			foreach($lpost as $pos) {
			}
		if($database->CheckLastPost($arr['id'])){
			$post_date = date('y/m/d, H:i ساعت',$pos['date']);
			$owner_topic = $database->getUserArray($pos['owner'],1);
		}else{
			$post_date = date('y/m/d, H:i ساعت',$arr['date']);
			$owner_topic = $database->getUserArray($arr['owner'],1);
		}
		
		echo '<tr><td class="ico">';
		if($database->CheckEditRes($aid)=="1"){
			if($database->CheckCloseTopic($arr['id']) == 1){
				$lock = '<a class="unlock" href="?s=2&fid='.$_GET['fid'].'&idt='.$arr['id'].'&admin=unlock" title="باز کردن"><img src="img/x.gif" alt="باز کردن" /></a>';
			}else{
				$lock = '<a class="lock" href="?s=2&fid='.$_GET['fid'].'&idt='.$arr['id'].'&admin=lock" title="قفل کردن"><img src="img/x.gif" alt="قفل کردن" /></a>';
			}
			echo ''.$lock.'<a class="edit" href="?s=2&idf='.$_GET['fid'].'&idt='.$arr['id'].'&admin=edittopic" title="ویرایش"><img src="img/x.gif" alt="ویرایش" /></a><br /><a class="pin" href="?s=2&fid='.$_GET['fid'].'&idt='.$arr['id'].'&admin=pin" title="stick topic"><img src="img/x.gif" alt="stick topic" /></a><a class="fdel" href="?s=2&fid='.$_GET['fid'].'&idt='.$arr['id'].'&admin=deltopic" title="حذف"><img src="img/x.gif" alt="حذف" onClick="return confirm(\'آیا مطمئن هستی؟\');" /></a>';
		}elseif($arr['close']=="1"){
			echo '<img class="folder_lock" src="img/x.gif" alt="تاپیک بسته بدون پست جدید" title="تاپیک بسته بدون پست جدید" />';
		}else{
			echo '<img class="folder" src="img/x.gif" title="موضوع بدون پست جدید" alt="موضوع بدون پست جدید">';
		}
		echo '</td>
		<td class="tit"><a href="allianz.php?s=2&pid='.$aid.'&tid='.$arr['id'].'">'.$arr['title'].'</a><br></td>
		<td class="cou">'.$CountPost.'</td>
		<td class="last">'.$post_date.'<br /><a href="spieler.php?uid='.$arr['owner'].'">'.$owner_topic['username'].'</a> <a href="allianz.php?s=2&aid='.$aid.'&tid='.$arr['id'].'&seite=max"><img class="latest_reply" src="img/x.gif" alt="نمایش آخرین پست" title="نمایش آخرین پست" /></a>
		</td></tr>';
	
	}
}else{
echo '<tr>
		<td class="none" colspan="4">موضوعی موجود نیست</td>
	</tr>';
}
?>
	</tbody></table><p>
    <button type="button" value="موضوع جدید" class="build" onclick="window.location.href = 'allianz.php?s=2&pid=<?php echo $aid; ?>&fid=<?php echo $cat_id; ?>&ac=newtopic'; return false;">
<div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div>
<div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div>
</div><div class="button-contents">موضوع جدید</div></div></button>
<?php
	$opt = $database->getAlliPermissions($session->uid, $aid);
	if($opt[opt5] == 1){
		echo "<button type=\"button\" value=\"تنظیمات\" class=\"build\" onclick=\"window.location.href = 'allianz.php?s=2&fid=".$cat_id."&seite=1&admin=switch_admin'; return false;\">
<div class=\"button-container\"><div class=\"button-position\"><div class=\"btl\"><div class=\"btr\"><div class=\"btc\"></div></div></div>
<div class=\"bml\"><div class=\"bmr\"><div class=\"bmc\"></div></div></div><div class=\"bbl\"><div class=\"bbr\"><div class=\"bbc\"></div></div></div>
</div><div class=\"button-contents\">تنظیمات</div></div></button>";
	}
?>
	</p>