<?php
$_GET['bid'] = 35;
$bid = $_GET['bid'];
$uprequire = $building->resourceRequired($id,$bid);
?>
<h2>قهوه خانه</h2>
<div class="build_desc">
	<a href="#" onclick="return Travian.Game.iPopup(35,4);" class="build_logo">
		<img class="building big white g35" src="img/x.gif" alt="قهوه خانه">
	</a>
	قهوه و چایی در قهوه خانه تولید می شود که بعد از تولید از طرف سربازان در جشن ها مصرف می شود. این باعث افزایش قدرت سربازان در جنگ خواهد شد، ولی متاسفانه باعث کاهش قدرت چیف (رئیس) خواهد شد و منجنیق ها تنها قادر به هدفگیری تصادفی خواهند بود. قادر به ساخت این ساختمان تنها در پایتخت خود می باشید ولی تاثیر آن به کل امپراطوری خواهد بود.</div>
<div id="contract" class="contract contractNew contractWrapper">
	<div class="contractText">هزینه:</div>
	<div class="contractCosts">
    <div class="showCosts">
    <span class="resources r1 little_res"><img class="r1" src="img/x.gif" alt="چوب"><?php echo $uprequire['wood']; ?></span>
    <span class="resources r2 little_res"><img class="r2" src="img/x.gif" alt="خشت"><?php echo $uprequire['clay']; ?></span>
    <span class="resources r3 little_res"><img class="r3" src="img/x.gif" alt="آهن"><?php echo $uprequire['iron']; ?></span>
    <span class="resources r4"><img class="r4" src="img/x.gif" alt="گندم"><?php echo $uprequire['crop']; ?></span>
    <span class="resources r5"><img class="r5" src="img/x.gif" alt="مصرف گندم"><?php echo $uprequire['pop']; ?></span>
    <div class="clear"></div>
    <span class="clocks"><img class="clock" src="img/x.gif" alt="مدت زمان">
    <?php echo $generator->getTimeFormat($uprequire['time']); ?>
	</span>
    <div class="clear"></div>
    </div></div>
	<div class="contractLink">
    <div class="contractText">پیش نیازها:</div>
    <span class="buildingCondition">
    <a href="#" onclick="return Travian.Game.iPopup(11,4, 'gid');">انبار غذا</a> <span>سطح 20</span></span>, <span class="buildingCondition"><a href="#" onclick="return Travian.Game.iPopup(16,4, 'gid');">اردوگاه</a> <span>سطح 10</span></span>
    </div>
	<div class="clear"></div>
</div>
<div class="clear"></div><hr>