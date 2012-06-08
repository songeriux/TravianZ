<?php
$_GET['bid'] = 14;
$bid = $_GET['bid'];
$uprequire = $building->resourceRequired($id,$bid);
?>
<h2>میدان تمرین</h2>
<div class="build_desc">
	<a href="#" onclick="return Travian.Game.iPopup(14,4);" class="build_logo">
		<img class="building big white g14" src="img/x.gif" alt="میدان تمرین">
	</a>
	در میدان تمرین لشکریان شما تربیت شده و استقامت آنها افزایش می‌یابد. هر قدر سطح آن بیشتر باشد به همان اندازه سرعت حرکت لشکریان شما بعد از 20 خانه بیشتر خواهد شد.</div>
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
    <a href="#" onclick="return Travian.Game.iPopup(15,4, 'gid');">اردوگاه</a> <span>سطح 15</span></span>
    </div>
	<div class="clear"></div>
</div>
<div class="clear"></div><hr>