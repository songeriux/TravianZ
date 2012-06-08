<?php
if(!is_numeric($_SESSION['search'])) {
	echo "<p class=\"error\">بازیکن <b>".$_SESSION['search']."</b> وجود ندارد.</p>";
    $search = 0;
}
else {
$search = $_SESSION['search'];
}
?>
<div class="contentNavi tabNavi">
				<div class="container active">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="statistiken.php?tid=1"><span class="tabItem">دیدکلی</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="statistiken.php?tid=31"><span class="tabItem">مهاجم</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="statistiken.php?tid=32"><span class="tabItem">مدافع</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="statistiken.php?tid=7"><span class="tabItem">تاپ 10</span></a></div>
				</div><div class="clear"></div>
</div>
<h4 class="round">بزرگترین بازیکن ها</h4>
<table cellpadding="1" cellspacing="1" id="player" class="row_table_data">
	<thead>
		<tr><td></td><td>بازیکن</td><td>اتحاد</td><td>جمعیت</td><td>دهکده</td></tr>
		</thead>
        
     <tbody>
             <?php
        if(isset($_GET['rank'])){
		$multiplier = 1;
			if(is_numeric($_GET['rank'])) {
				if($_GET['rank'] > count($ranking->getRank())) {
				$_GET['rank'] = count($ranking->getRank())-1;
				}
				while($_GET['rank'] > (20*$multiplier)) {
					$multiplier +=1;
				}
			$start = 20*$multiplier-19;
			} else { $start = ($_SESSION['start']+1); }
		} else { $start = ($_SESSION['start']+1); }
        if(count($ranking->getRank()) > 0) {
        	$ranking = $ranking->getRank();
            for($i=$start;$i<($start+20);$i++) {
            	if(isset($ranking[$i]['username']) && $ranking[$i] != "pad") {
                	if($i == $search) {
                    echo "<tr class=\"hl\"><td class=\"ra fc\" >";
                    }
                    else {
                    echo "<tr class=\"hover\"><td class=\"ra \" >";
                    }
                    echo $i.".</td><td class=\"pla \" >";
					echo"<a href=\"spieler.php?uid=".$ranking[$i]['userid']."\">".$ranking[$i]['username']."</a>";
                    
                    echo"</td><td class=\"al\" >";
                    if($ranking[$i]['aname'] != "") {
                    echo "<a href=\"allianz.php?aid=".$ranking[$i]['alliance']."\">".$ranking[$i]['aname']."</a>";
                    }
                    else {
                    echo "-";
                    }
                    echo "</td><td class=\"pop\" >".$ranking[$i]['totalpop']."</td><td class=\"vil\">".$ranking[$i]['totalvillage']."</td></tr>";
                }
            }
        }
        else {
        	echo "<td class=\"none\" colspan=\"5\">بازیکنی یافت نشد</td>";
        }
       ?>


 </tbody>
</table>

<?php
include("ranksearch.tpl");
?>