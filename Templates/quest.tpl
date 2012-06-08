<?php 
if ($_SESSION['qst']!=25 && $_SESSION['fqst']!=35 && QUEST==true){
?>

<div class="questMaster">
<div id="anm" style="width:120px; height:140px; visibility:hidden;"></div>
			<div id="qge">
				<?php if ($_SESSION['qst'] == 0){ ?>
				<img onclick="qst_handle();" src="img/x.gif" id="qgei" style="width:160px;height:195px;cursor:pointer;" class="q_l<?php echo $session->userinfo['tribe'];?>" title="A küldetéshez...">
				<?php }else{ ?>
				<img onclick="qst_handle();" src="img/x.gif" id="qgei" style="width:160px;height:195px;cursor:pointer;" class="q_l<?php echo $session->userinfo['tribe'];?>g" title="A küldetéshez...">
				<?php } ?>
			</div>
			<script type="text/javascript">
				<?php if ($_SESSION['qst']==0){ ?>
				quest.number=null;
				<?php }else{ ?>
				quest.number=0;
				<?php } ?>
				quest.last = 25;
			</script>						
</div>
<?php } ?>
<script type="text/javascript"> 
	Travian.Translation.add(
	{
		'close' : 'Bezárás'
	});
</script>
<?php
$timestamp = $database->isDeleting($session->uid);
$displayarray = $database->getUserArray($session->uid,1);
if($displayarray['protect'] > time()){
echo "<div id=\"sideInfoCountdown\"><div class=\"head\"></div>";
echo "<div class=\"content\">";

		$uurover=$generator->getTimeFormat($displayarray['protect']-time());
        echo "Még van <b><span
		id=\"timer1\">".$uurover."</span></b> óráig kezdővédelmed.</div></div>";
} elseif($timestamp) {
echo "<div id=\"sideInfoCountdown\"><div class=\"head\"></div>";
echo "<div class=\"content\">";
		$time=$generator->getTimeFormat(($timestamp-time()));
        echo "Törlés <span id=\"timer1\">".$time."</span> .</div></div>";
}
?>