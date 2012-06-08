<?php
$_GET['bid'] = 17;
$bid = $_GET['bid'];
$uprequire = $building->resourceRequired($id,$bid);
?>
<h2>بازار</h2>
<div class="build_desc">
	<a href="#" onclick="return Travian.Game.iPopup(17,4);" class="build_logo">
		<img class="building big white g17" src="img/x.gif" alt="دارالفنون">
	</a>
	در بازار می‌توانید منابع را با بازیکنان دیگر معامله کنید. هر قدر سطح بازارتان بالاتر باشد، تعداد تاجر بيشتری خواهيد داشت و منابع بیشتری را می توانید ارسال كنيد.</div>
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
    <a href="#" onclick="return Travian.Game.iPopup(9,4, 'gid');">انبار</a> <span>سطح 1</span></span>, <span class="buildingCondition"><a href="#" onclick="return Travian.Game.iPopup(10,4, 'gid');">انبار غذا</a> <span>سطح 1</span></span>, <span class="buildingCondition"><a href="#" onclick="return Travian.Game.iPopup(15,4, 'gid');">ساختمان اصلی</a> <span>سطح 3</span></span>
    </div>
	<div class="clear"></div>
</div>
<div class="clear"></div><hr>
