<?php
$_GET['bid'] = 41;
$bid = $_GET['bid'];
$uprequire = $building->resourceRequired($id,$bid);
?>
<h2>آبخوری اسب ها</h2>
<div class="build_desc">
	<a href="#" onclick="return Travian.Game.iPopup(41,4);" class="build_logo">
		<img class="building big white g19" src="img/x.gif" alt="آبخوری اسب ها">
	</a>
	با بنا کردن آبخوری اسب ها مصرف گندم کمتر میشود.</div>
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
    <div class="contractText">یش نیازها:</div>
    <span class="buildingCondition">
    <a href="#" onclick="return Travian.Game.iPopup(20,4, 'gid');">اصطبل</a> <span>سطح 20</span></span>, <span class="buildingCondition"><a href="#" onclick="return Travian.Game.iPopup(16,4, 'gid');">اردوگاه</a> <span>سطح 10</span></span>
    </div>
	<div class="clear"></div>
</div>
<div class="clear"></div><hr>
