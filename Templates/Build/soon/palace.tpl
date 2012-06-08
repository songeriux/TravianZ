<?php
$_GET['bid'] = 26;
$bid = $_GET['bid'];
$uprequire = $building->resourceRequired($id,$bid);
?>
<h2>قصر</h2>
<div class="build_desc">
	<a href="#" onclick="return Travian.Game.iPopup(26,4);" class="build_logo">
		<img class="building big white g26" src="img/x.gif" alt="قصر">
	</a>
	در قصر شاه و ملکه امپراطوری زندگی می کنند. شما در کل امپراطوری فقط یک قصر می توانید داشته باشید. فقط دهکده ای که قصر شما در آن است را می توانید به پایتخت خود تبدیل کنید (شما نمی توانید در یک دهکده قصر و اقامتگاه را با هم داشته باشید).</div>
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
    <a href="#" onclick="return Travian.Game.iPopup(18,4, 'gid');">سفارت</a> <span>سطح 1</span></span>, <span class="buildingCondition"><a href="#" onclick="return Travian.Game.iPopup(15,4, 'gid');">ساختمان اصلی</a> <span>سطح 3</span></span>, <span class="buildingCondition"><a href="#" onclick="return Travian.Game.iPopup(25,4, 'gid');"><strike>اقامتگاه</strike></a></span>
    </div>
	<div class="clear"></div>
</div>
<div class="clear"></div><hr>