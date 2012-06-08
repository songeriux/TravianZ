<?php
include("GameEngine/Village.php");
include("GameEngine/Inventory.php");
$start = $generator->pageLoadTimeStart();
include "Templates/html.tpl";

if(isset($_GET['inventory'])){
	$uid = $session->uid;
	if(isset($_GET['helmet'])){
		$database->setHeroInventory($uid, "helmet", 0);
		$database->editProcItem($_GET['helmet'], 0);
		$database->modifyHeroFace($uid, "helmet", 0);
		
	}elseif(isset($_GET['leftHand'])){
		$database->setHeroInventory($uid, "leftHand", 0);
		$database->editProcItem($_GET['leftHand'], 0);
		$database->modifyHeroFace($uid, "leftHand", 0);
		
	}elseif(isset($_GET['rightHand'])){
		$database->setHeroInventory($uid, "rightHand", 0);
		$database->editProcItem($_GET['rightHand'], 0);
		$database->modifyHeroFace($uid, "rightHand", 0);
		
	}elseif(isset($_GET['body'])){
		$database->setHeroInventory($uid, "body", 0);
		$database->editProcItem($_GET['body'], 0);
		$database->modifyHeroFace($uid, "body", 0);
		
	}elseif(isset($_GET['horse'])){
		$database->setHeroInventory($uid, "horse", 0);
		$database->editProcItem($_GET['horse'], 0);
		$database->modifyHeroFace($uid, "horse", 0);
		
	}elseif(isset($_GET['bag'])){
		$database->setHeroInventory($uid, "bag", 0);
		$database->editProcItem($_GET['bag'], 0);
		$database->modifyHeroFace($uid, "bag", 0);
		
	}
}

?>
<body class="v35 webkit chrome hero_inventory">
	<div id="wrapper"> 
		<img id="staticElements" src="img/x.gif" alt="" /> 
		<div id="logoutContainer"> 
			<a id="logout" href="logout.php" title="<?php echo LOGOUT; ?>">&nbsp;</a> 
		</div> 
		<div class="bodyWrapper"> 
			<div id="header"> 
				<div id="mtop">
					<a id="logo" href="<?php echo HOMEPAGE; ?>" target="_blank" title="<?php echo SERVER_NAME ?>"></a>
					<ul id="navigation">
						<li id="n1" class="resources">
							<a class="" href="dorf1.php" accesskey="1" title="<?php echo HEADER_DORF1; ?>"></a>
						</li>
						<li id="n2" class="village">
							<a class="" href="dorf2.php" accesskey="2" title="<?php echo HEADER_DORF2; ?>"></a>
						</li>
						<li id="n3" class="map">
							<a class="" href="karte.php" accesskey="3" title="<?php echo HEADER_MAP; ?>"></a>
						</li>
						<li id="n4" class="stats">
							<a class="" href="statistiken.php" accesskey="4" title="<?php echo HEADER_STATS; ?>"></a>
						</li>
<?php
    	if(count($database->getMessage($session->uid,7)) >= 1000) {
			$unmsg = "+1000";
		} else { $unmsg = count($database->getMessage($session->uid,7)); }
		
    	if(count($database->getMessage($session->uid,8)) >= 1000) {
			$unnotice = "+1000";
		} else { $unnotice = count($database->getMessage($session->uid,8)); }
?>
<li id="n5" class="reports"> 
<a href="berichte.php" accesskey="5" title="<?php echo HEADER_NOTICES; ?><?php if($message->nunread){ echo' ('.count($database->getMessage($session->uid,8)).')'; } ?>"></a>
<?php
if($message->nunread){
	echo "<div class=\"ltr bubble\" title=\"".$unnotice." ".HEADER_NOTICES_NEW."\" style=\"display:block\">
			<div class=\"bubble-background-l\"></div>
			<div class=\"bubble-background-r\"></div>
			<div class=\"bubble-content\">".$unnotice."</div></div>";
}
?>
</li>
<li id="n6" class="messages"> 
<a href="nachrichten.php" accesskey="6" title="<?php echo HEADER_MESSAGES; ?><?php if($message->unread){ echo' ('.count($database->getMessage($session->uid,7)).')'; } ?>"></a> 
<?php
if($message->unread) {
	echo "<div class=\"ltr bubble\" title=\"".$unmsg." ".HEADER_MESSAGES_NEW."\" style=\"display:block\">
			<div class=\"bubble-background-l\"></div>
			<div class=\"bubble-background-r\"></div>
			<div class=\"bubble-content\">".$unmsg."</div></div>";
}
?>
</li>

</ul>
<div class="clear"></div> 
</div> 
</div>
					<div id="mid">

												<div class="clear"></div> 
						<div id="contentOuterContainer"> 
							<div class="contentTitle">&nbsp;</div> 

<div class="contentContainer">
								<div id="content" class="hero_inventory"><h1 class="titleInHeader">Hero</h1>
<div class="contentNavi subNavi">
				<div class="container active">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="hero_inventory.php"><span class="tabItem">Attributes</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="hero.php"><span class="tabItem">Appearance</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="hero_adventure.php"><span class="tabItem">Adventures</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="hero_auction.php"><span class="tabItem">Auctions</span></a></div>
				</div><div class="clear"></div>
		</div>
		<script type="text/javascript">
					window.addEvent('domready', function()
					{
						$$('.subNavi').each(function(element)
						{
							new Travian.Game.Menu(element);
						});
					});
</script>
<div class="clear"></div>
<?php
include("Templates/hero.tpl");
?>

<div id="bodyOptions">
	<div id="hero_body_container">
		<div id="hero_body">
			<img class="heroBody" src="hero_body.php?uid=<?php echo $session->uid; ?>&amp;size=inventory&<?php echo $hero['hash']; ?>">
			<div class="clear"></div>
		</div>
		<div id="hero_body_content">
			<div class="content">

<?php
$gi = $database->getHeroInventory($session->uid);
$dis = '';
if($hero['dead']==1){
	$dis = ' disabled';
}
if($gi['helmet']!=0){
	$data = $database->getItemData($gi['helmet']);
	$item = '<a href="?inventory&helmet='.$gi['helmet'].'"><div id="item_'.$gi['helmet'].'" class="item item_'.$data['type'].' onHero'.$dis.'" style="position: relative; left: 0px; top: 0px; "><div class="amount">'.$data['num'].'</div></div></a>';
	echo '<div id="helmet" class="draggable">'.$item.'</div>';
}else{
	echo '<div id="helmet" class="draggable"></div>';
}

if($gi['leftHand']!=0){
	$data = $database->getItemData($gi['leftHand']);
	$item = '<a href="?inventory&leftHand='.$gi['leftHand'].'"><div id="item_'.$gi['leftHand'].'" class="item item_'.$data['type'].' onHero'.$dis.'" style="position: relative; left: 0px; top: 0px; "><div class="amount">'.$data['num'].'</div></div></a>';
	echo '<div id="leftHand" class="draggable">'.$item.'</div>';
}else{
	echo '<div id="leftHand" class="draggable"></div>';
}

if($gi['rightHand']!=0){
	$data = $database->getItemData($gi['rightHand']);
	$item = '<a href="?inventory&rightHand='.$gi['rightHand'].'"><div id="item_'.$gi['rightHand'].'" class="item item_'.$data['type'].' onHero'.$dis.'" style="position: relative; left: 0px; top: 0px; "><div class="amount">'.$data['num'].'</div></div></a>';
	echo '<div id="rightHand" class="draggable">'.$item.'</div>';
}else{
	echo '<div id="rightHand" class="draggable"></div>';
}

if($gi['body']!=0){
	$data = $database->getItemData($gi['body']);
	$item = '<a href="?inventory&body='.$gi['body'].'"><div id="item_'.$gi['body'].'" class="item item_'.$data['type'].' onHero'.$dis.'" style="position: relative; left: 0px; top: 0px; "><div class="amount">'.$data['num'].'</div></div></a>';
	echo '<div id="body" class="draggable">'.$item.'</div>';
}else{
	echo '<div id="body" class="draggable"></div>';
}

if($gi['horse']!=0){
	$data = $database->getItemData($gi['horse']);
	$item = '<a href="?inventory&horse='.$gi['horse'].'"><div id="item_'.$gi['horse'].'" class="item item_'.$data['type'].' onHero'.$dis.'" style="position: relative; left: 0px; top: 0px; "><div class="amount">'.$data['num'].'</div></div></a>';
	echo '<div id="horse" class="draggable">'.$item.'</div>';
}else{
	echo '<div id="horse" class="draggable"></div>';
}

if($gi['bag']!=0){
	$data = $database->getItemData($gi['bag']);
	$item = '<a href="?inventory&bag='.$gi['bag'].'"><div id="item_'.$gi['bag'].'" class="item item_'.$data['type'].' onHero" style="position: relative; left: 0px; top: 0px; "><div class="amount">'.$data['num'].'</div></div></a>';
	echo '<div id="bag" class="draggable">'.$item.'</div>';
}else{
	echo '<div id="bag" class="draggable"></div>';
}
?>
			</div>
		</div>
	</div>
	<div class="heroHidden">
		<input type="checkbox" class="check" name="hideShow" id="heroHideShow" checked="checked" disabled> When checked hero will defend village
	</div>
</div>
<div id="hero_inventory">
	<div class="boxes boxesColor gray"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents cf">
    <div id="itemsToSale"><?php
$prefix = "".TB_PREFIX."heroitems";

$sql = mysql_query("SELECT * FROM ".TB_PREFIX."heroitems WHERE proc = 0 AND uid = $session->uid");
$query = mysql_num_rows($sql);

$outputList = '';

$inv = 1;
while($row = mysql_fetch_array($sql)){ 
$id = $row["id"];$uid = $row["uid"];$btype = $row["btype"];$type = $row["type"];$num = $row["num"];$proc = $row["proc"];
include "Templates/Auction/alt.tpl";
	if($btype<=10 or $btype==11 or $btype==13){
		if($hero['dead']==1){
			$dis = ' disabled';
			$deadTitle = "
			<span class='itemNotMoveable'>قهرمان شما مرده است و یا در دهکده نیست، به این دلیل قادر به استفاده از این جنس نمی‌باشید.</span><br>";
		}else{
			$dis = '';
			$deadTitle = '';
		}
	}else{
		$dis = '';
		$deadTitle = '';
	}
	if($num==1){$amount = '';}else{$amount = '('.$num.') ';}
	$outputList .= "<div id=\"inventory_".$inv."\" class=\"inventory draggable\">";
	$outputList .= "<div id=\"item_".$id."\" title=\"".$amount."".$name."||".$deadTitle."".$title."\" class=\"item item_".$item."".$dis."\" style=\"position:relative;left:0px;top:0px;\">";
	$outputList .= "<div class=\"amount\">".$num."</div>";
	$outputList .= "</div>";
	$outputList .= '</div>';
	$inv++;	
}
	echo $outputList;
	
if($inv <= 12){
	for($i=$inv;$i<=((12+$inv)-$inv);$i++){
		echo '<div id="inventory_'.$i.'" class="inventory draggable"></div>';
	}
}else{
	echo '<div id="inventory_'.$i.'" class="inventory draggable"></div>';
}
?>
			<div class="market">
				<a class="buy arrow" href="hero_auction.php?action=buy">Buy Items</a>
				<a class="sell arrow" href="hero_auction.php?action=sell">Sell Items</a>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
</div>
<div class="clear"></div>
<div id="placeHolder"></div>
<form id="HeroInventory" method="post" action="hero_inventory.php">
	<input type="hidden" name="a" value="inventory">
	<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
	<input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
    <input type="hidden" name="btype" value="<?php echo $_POST['btype']; ?>">
    <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>">
</form>
<script type="text/javascript">
	Travian.Game.Hero.Inventory = new (new Class(
	{
		b10: '<p><div style="color:#F90">Tapasztalat: <?php echo $hero['experience']; ?><br>افزایش تجربه: 10<br>تجربه بعد از استفاده: <?php echo ($hero['experience']+10); ?><br></div>',
		
		b15: '<table id="heroInventoryDataDialog" class="transparent" cellspacing="0" cellpadding="0"><tbody><tr class="rowBeforeUse"><th>Jelenlegi kultúrpont arány</th><td><?php echo $database->getUserField($session->uid, 'cp',0); ?></td></tr><tr class="rowUseValue"><th>امتیاز فرهنگی بدست آمده بعد مصرف اثر هنری:</th><td class="displayUseValue"><?php echo $database->getVSumField($session->uid, 'cp'); ?></td></tr><tr class="rowAfterUse"><th>امتیاز فرهنگی بعد از مصرف اثر هنری:</th><td class="displayAfterUse"><?php echo ($database->getUserField($session->uid, 'cp',0)+$database->getVSumField($session->uid, 'cp')); ?></td></tr></tbody></table>',		
		
		alreadyOpen: false,
		textSingle: 'Do you really want to wear this item?',
		textMulti: 'Total item used: &lt;input class=\"text\" id=\"amount\" type=\"text\" value=\"\" /&gt;'.unescapeHtml(),
		initialize: function() {
			var $this = this;
			
<?php
$sql2 = mysql_query("SELECT * FROM ".TB_PREFIX."heroitems WHERE proc = 0 AND uid = $session->uid");

while($row2 = mysql_fetch_array($sql2)){ 
$id = $row2["id"];$num = $row2["num"];$btype = $row2["btype"];$type = $row2["type"];
	if($btype<=10 or $btype==11 or $btype==13){
		if($hero['dead']==0){
			if($num==1){
?>
$('item_<?php echo $id; ?>').addEvent('click', function() { $this.showItem(<?php echo $id; ?>,<?php echo $num; ?>,<?php echo $btype; ?>,<?php echo $type; ?>);});															   
<?php		}else{ ?>
$('item_<?php echo $id; ?>').addEvent('click', function() { $this.sellItem(<?php echo $id; ?>,<?php echo $num; ?>,<?php echo $btype; ?>,<?php echo $type; ?>);});
<?php
			}
		}
	}else{
?>
$('item_<?php echo $id; ?>').addEvent('click', function() { $this.sellItem(<?php echo $id; ?>,<?php echo $num; ?>,<?php echo $btype; ?>,<?php echo $type; ?>);});
<?php
	}
}
?>
							},
		showItem: function (id, amount, btype, type){
			var $this = this;
			$('HeroInventory').id.value = id;
			$('HeroInventory').amount.value = amount;
			$('HeroInventory').btype.value = btype;
			$('HeroInventory').type.value = type;
			$('HeroInventory').submit();
		},
		sellItem: function (id, amount, btype, type){
			var html = '';
			var $this = this;
			if (this.alreadyOpen){
				return;
			}
			this.alreadyOpen = true;
			$('HeroInventory').id.value = id;
			$('HeroInventory').amount.value = amount;
			$('HeroInventory').btype.value = btype;
			$('HeroInventory').type.value = type;
			if (amount == 1){
				if(btype == 10){
					html = $this.textSingle;
					html += this.b10;
				}else
				if(btype == 15){
					html = $this.textSingle;
					html += this.b15;
				}else{
					html = $this.textSingle;
				}
			}else{
				if(btype == 10){
					exp_a = '<?php echo $hero['experience']; ?>';
					exp_b = amount*10;
					exp_total = <?php echo $hero['experience']; ?>+exp_b;
					html = $this.textMulti;
					html += '<table id="heroInventoryDataDialog" class="transparent" cellspacing="0" cellpadding="0"><tbody><tr class="rowBeforeUse"><th>تجربه‌ی فعلی قهرمان:</th><td>'+exp_a+'</td></tr><tr class="rowUseValue"><th>تجربه‌ی بدست آمده از طریق مصرف کتیبه:</th><td class="displayUseValue">'+exp_b+'</td></tr><tr class="rowAfterUse"><th>تجربه‌ی قهرمان بعد از مصرف کتیبه:</th><td class="displayAfterUse">'+exp_total+'</td></tr></tbody></table>';

				}else
				if(btype == 15){
					cp = '<?php echo $database->getUserField($session->uid, 'cp',0); ?>';
					cp_b = (cp*amount);
					cp_total = <?php echo $database->getUserField($session->uid, 'cp',0); ?>+cp_b;
					html = $this.textMulti;
					html += '<table id="heroInventoryDataDialog" class="transparent" cellspacing="0" cellpadding="0"><tbody><tr class="rowBeforeUse"><th>امتیاز فرهنگی فعلی شما:</th><td>'+cp+'</td></tr><tr class="rowUseValue"><th>امتیاز فرهنگی بدست آمده از طریق مصرف اثر هنری:</th><td class="displayUseValue">'+cp_b+'</td></tr><tr class="rowAfterUse"><th>امتیاز فرهنگی بعد از مصرف اثر هنری:</th><td class="displayAfterUse">'+cp_total+'</td></tr></tbody></table>';
					
				}else{
					html = $this.textMulti;
				}
			}
			html.dialog({
				relativeTo:			$('content'),
				elementFoucs:		'inventoryAmount',
				buttonTextOk:		'Ok',
				buttonTextCancel:	'Cancel',
				title:				'Felhasználás',
				onOpen: function(dialog, contentElement){
					if ($('amount')){
						$('amount').value = amount;
						$('amount').addEvent('change', function(){
							$('HeroInventory').amount.value = $('amount').value;
						});
					}
				},
				onOkay: function(dialog, contentElement){
					if ($('amount')){
						$('HeroInventory').amount.value = $('amount').value;
					}
					$('HeroInventory').submit();
				},
				onClose: function(dialog, contentElement){
					$this.alreadyOpen = false;
				}
			});
		}
	}));
</script>
<div class="clear">&nbsp;</div>
</div>
<div class="clear"></div>
</div>

                        <div class="contentFooter">&nbsp;</div>

					</div>
<?php
include("Templates/sideinfo.tpl"); 
include("Templates/footer.tpl");
include("Templates/header.tpl");
include("Templates/res.tpl");
include("Templates/vname.tpl");
include("Templates/quest.tpl");
?>

</div>
<div id="ce"></div>
</div>
</body>
</html>


