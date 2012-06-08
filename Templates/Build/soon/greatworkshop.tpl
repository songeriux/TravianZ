<?php
$_GET['bid'] = 42;
$bid = $_GET['bid'];
$uprequire = $building->resourceRequired($id,$bid);
?>
<h2>کارگاه بزرگ</h2>
<div class="build_desc">
	<a href="#" onclick="return Travian.Game.iPopup(42,4);" class="build_logo">
		<img class="building big white g42" src="img/x.gif" alt="کارگاه بزرگ">
	</a>
	در کارگاه بزرگ شما می توانید ماشینهای جنگی مثل دژكوب و منجنیق را تولید کنید. هرچقدر سطح کارگاه بیشتر باشد تولید آن سریعتر است.</div>
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
    <a href="#" onclick="return Travian.Game.iPopup(19,4, 'gid');">سربازخانه</a> <span>سطح 20</span></span>
    </div>
	<div class="clear"></div>
</div>
<div class="clear"></div><hr>
