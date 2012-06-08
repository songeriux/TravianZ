 <?php
if(isset($aid)) {
$aid = $aid;
}
else {
$aid = $session->alliance;
}
$allianceinfo = $database->getAlliance($aid);
echo "<h1>Alliance - ".$allianceinfo['tag']."</h1>";
include("alli_menu.tpl");
?>
<div class="boxes boxesColor gray reportFilter offDef"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents">
<button type="button" value="att_all" <?php if(isset($_GET['f']) && $_GET['f'] == '31') { echo "class=\"iconFilter iconFilterActive\""; } else { echo "class=\"iconFilter\""; } ?> onclick="window.location.href = 'allianz.php?s=3&f=31'; return false;"><img src="img/x.gif" class="att_all" alt="att_all"></button>
<button type="button" value="def_all" <?php if(isset($_GET['f']) && $_GET['f'] == '32') { echo "class=\"iconFilter iconFilterActive\""; } else { echo "class=\"iconFilter\""; } ?> onclick="window.location.href = 'allianz.php?s=3&f=32'; return false;"><img src="img/x.gif" class="def_all" alt="def_all"></button>
</div>
				</div>
                <div class="clear"></div>
<h4 class="chartHeadline">Attacks</h4>
<?php
	if($_GET['f']==31){
		include "Templates/Alliance/attack-attacker.tpl";
    }elseif($_GET['f']==32){
		include "Templates/Alliance/attack-defender.tpl";
    }else{

$prefix = "".TB_PREFIX."ndata";
$limit = "ntype!=8 AND ntype!=9 AND ntype!=10 AND ntype!=11 AND ntype!=12 AND ntype!=13 AND ntype!=15";
$sql = mysql_query("SELECT * FROM $prefix WHERE ally = $session->alliance AND $limit ORDER BY time DESC LIMIT 20");
$query = mysql_num_rows($sql);

$noticeClass = array("گزارش جاسوسی","پیروزی در حمله بدون تلفات.","پیروزی در حمله با تلفات.","شکست در حمله با تلفات.","پیروزی در دفاع بدون تلفات.","پیروزی در دفاع با تلفات.","شکست در دفاع با تلفات.","شکست در دفاع بدون تلفات","نیروی کمکی","","تاجران بیشتر چوب مبادله کردند.","تاجران بیشتر خشت مبادله کردند.","تاجران بیشتر آهن مبادله کردند.","تاجران بیشتر گندم مبادله کردند.","","حمله به نیروی کمکی");

$outputList = '';
$name = 1;
if($query == 0) {        
    $outputList .= "<td colspan=\"4\" class=\"none\">No Attacks</td>";
}else{
while($row = mysql_fetch_array($sql)){ 
	$dataarray = explode(",",$row['data']);
    $id = $row["id"];
    $toWref = $row["toWref"];
    $ally = $row["ally"];
    $topic = $row["topic"];
    $ntype = $row["ntype"];
    $data = $row["data"];
    $time = $row["time"];
    $viewed = $row["viewed"];
    $archive = $row["archive"];
	
    $outputList .= "<tr>";
	$outputList .= "<td class=\"sub\">";
if($ntype==4 || $ntype==5 || $ntype==6 || $ntype==7){
    $type2 = '32';
}else{
    $type2 = '31';
}
	$outputList .= "<a href=\"allianz.php?s=3&f=".$type2."\">";
    $type = (isset($_GET['t']) && $_GET['t'] == 5)? $archive : $ntype;
    $outputList .= "<img src=\"img/x.gif\" class=\"iReport iReport$type\" title=\"".$noticeClass[$type]."\">";
    $outputList .= "</a>";
    $outputList .= "<div><a href=\"berichte.php?id=".$id."&aid=".$ally."\">";
    if($ntype==0){ $to = " از "; $nn = " جاسوسی ﻣﻰﻛﻨﺪ "; }else{ $to = " به "; $nn = " حمله ﻣﻰﻛﻨﺪ "; }

    $outputList .= $database->getUserField($dataarray[0],username,0);
    $outputList .= $to;
    
    $getUser = $database->getUserField($dataarray['30'],username,0);
    if($getUser==Nature){ $nnn = "طبیعت"; }elseif($getUser==Natars){ $nnn = "ناتارها"; } else { $nnn = $getUser; }
    
    $outputList .= $nnn;
    $outputList .= $nn;
    $outputList .= "</a></div></td>";
    if($ntype==0 or $ntype==1 or $ntype==2 or $ntype==3){ 
    	$getUserAlly = $database->getUserField($dataarray[0],alliance,0);
    }else{
    	$getUserAlly = $database->getUserField($dataarray[30],alliance,0);
    }
    $getAllyName = $database->getAllianceName($getUserAlly);
    
    if($getUserAlly==$session->alliance || !$getUserAlly){
    	$allyName = "-";
    }else{
    	$allyName = "<a href=\"allianz.php?aid=".$getUserAlly."\">".$getAllyName."</a>";
    }
    
    $outputList .= "<td class=\"al\">".$allyName."</td>";
    $date = $generator->procMtime($time);
    $outputList .= "<td class=\"dat\">".$date[0]." ".date('H:i',$time)."</td>";
	$outputList .= "</tr>";
    
	$name++;
}
 }
?>
<table cellpadding="1" cellspacing="1" id="offs">
<thead>
<tr>
<td>Player</td>
<td>Alliance</td>
<td>Date</td>
</tr>
</thead>

<tbody>
<?php echo $outputList; ?>
</tbody>
</table>
<?php } ?>

