<?php
if(!isset($_GET['tid'])){ $_GET['tid']='1'; }
?>
<div id="search_navi">
	 	<form method="post" action="statistiken.php?tid=<?php echo isset($_GET['tid'])? $_GET['tid'] : 1; ?>">
	 		<div class="boxes boxesColor gray"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents">
            <table class="transparent">
	 				<tbody><tr>
						<td>
							<span>
								رتبه <input type="text" class="text ra" maxlength="5" name="rank" value="<?php echo ($search == 0)? $start : $search; ?>" />
							</span>
						</td>
						<td>
							<span>
								یا نام: <input type="text" class="text name" maxlength="20" name="name" value="<?php if(!is_numeric($search)) {echo $search; } ?>" />
							</span>

						</td>
						<td>
                        <input type="hidden" name="ft" value="r<?php echo isset($_GET['tid'])? $_GET['tid'] : 1; ?>" />
							<button type="submit" value="submit" name="submit" id="btn_ok" class="dynamic_img" src="img/x.gif">
<div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div><div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div></div><div class="button-contents">تایید</div></div></button>
						</td>
	 				</tr>
	 			</tbody></table>
	 			</div>
				</div>
                </form>
<div class="paginator">                      
<?php
$pranking = count($ranking);

if($start == 1 && $start+20 && count($ranking) <= 20) {
        echo "
        <img alt=\"first page\" src=\"img/x.gif\" class=\"first disabled\"> 
        <img alt=\"previous page\" src=\"img/x.gif\" class=\"previous disabled\"> 
        <span class=\"number currentPage\">1 </span>
        <img alt=\"next page\" src=\"img/x.gif\" class=\"next disabled\">
        <img alt=\"last page\" src=\"img/x.gif\" class=\"last disabled\">
        ";
        
}
else if($start == 1 && $start+20 && count($ranking) <= 40) {
        echo "
        <img alt=\"first page\" src=\"img/x.gif\" class=\"first disabled\"> 
        <img alt=\"previous page\" src=\"img/x.gif\" class=\"previous disabled\"> 
        <span class=\"number currentPage\">1 </span>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=21\">2</a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start+20)."\">
        <img alt=\"next page\" src=\"img/x.gif\" class=\"next\"></a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start+$pranking)."\">
        <img alt=\"last page\" src=\"img/x.gif\" class=\"last\"></a>
        ";
        
}
else if($start == 1 && $start+20 && count($ranking) <= 60) {
        echo "
        <img alt=\"first page\" src=\"img/x.gif\" class=\"first disabled\"> 
        <img alt=\"previous page\" src=\"img/x.gif\" class=\"previous disabled\"> 
        <span class=\"number currentPage\">1 </span>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=21\">2</a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=31\">3</a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start+20)."\">
        <img alt=\"next page\" src=\"img/x.gif\" class=\"next\"></a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start+$pranking)."\">
        <img alt=\"last page\" src=\"img/x.gif\" class=\"last\"></a>
        ";
        
}
else if($start != 1 && $start+20 && count($ranking) <= 40) {
        echo "
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=1\">
        <img alt=\"first page\" src=\"img/x.gif\" class=\"first\"></a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start-20)."\">
        <img alt=\"previous page\" src=\"img/x.gif\" class=\"previous\"></a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=1\">1</a>
        <span class=\"number currentPage\">2 </span>
        <img alt=\"next page\" src=\"img/x.gif\" class=\"next disabled\">
        <img alt=\"last page\" src=\"img/x.gif\" class=\"last disabled\">
        ";
        
}
else if($start != 1 && $start+20 < count($ranking)) {
		echo "
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=1\">
		<img alt=\"first page\" src=\"img/x.gif\" class=\"first\"></a> 
		<a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start-20)."\">
		<img alt=\"previous page\" src=\"img/x.gif\" class=\"previous\"></a> 
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=1\">1</a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=21\">2</a> ... 
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($pranking-40)."\">".round($pranking/20-1)."</a> 
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($pranking-1)."\">".round($pranking/20)."</a>
		<a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start+20)."\">
		<img alt=\"next page\" src=\"img/x.gif\" class=\"next\"></a> 
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start+$pranking)."\">
		<img alt=\"last page\" src=\"img/x.gif\" class=\"last\"></a>
        ";
}

else if($start == 1 && $start+20 < count($ranking)) {
        echo "
        <img alt=\"first page\" src=\"img/x.gif\" class=\"first disabled\"> 
        <img alt=\"previous page\" src=\"img/x.gif\" class=\"previous disabled\"> 
        <span class=\"number currentPage\">1 </span>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=21\">2</a> ...
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($pranking-40)."\">".round($pranking/20-1)."</a> 
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($pranking-1)."\">".round($pranking/20)."</a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start+20)."\">
        <img alt=\"next page\" src=\"img/x.gif\" class=\"next\"></a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start+$pranking)."\">
        <img alt=\"last page\" src=\"img/x.gif\" class=\"last\"></a>
        ";
        
    }
    else if($start != 1 && $start-20 < count($ranking)) {
        echo "
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=1\">
        <img alt=\"first page\" src=\"img/x.gif\" class=\"first\"></a> 
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($start-20)."\">
        <img alt=\"previous page\" src=\"img/x.gif\" class=\"previous\"></a>
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=1\">1</a> 
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=21\">2</a> ...
        <a href=\"statistiken.php?tid=".$_GET['tid']."&amp;rank=".($pranking-20)."\">".round($pranking/20-1)."</a> 
        <span class=\"number currentPage\">".round($pranking/20)."</span>
        <img alt=\"next page\" src=\"img/x.gif\" class=\"next disabled\">
        <img alt=\"last page\" src=\"img/x.gif\" class=\"last disabled\">
        ";
    }
    else {
    	echo "
        <img alt=\"first page\" src=\"img/x.gif\" class=\"first disabled\"> 
        <img alt=\"previous page\" src=\"img/x.gif\" class=\"previous disabled\">
        <span class=\"number currentPage\">1</span>
        <img alt=\"next page\" src=\"img/x.gif\" class=\"next disabled\">
        <img alt=\"last page\" src=\"img/x.gif\" class=\"last disabled\">
        ";
    }
    ?>
</div></div>
<div class="clear">&nbsp;</div>