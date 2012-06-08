<?php

       include ("GameEngine/Village.php");
       include ("GameEngine/Chat.php");
$start = $generator->pageLoadTimeStart();
$alliance->procAlliance($_GET);
include "Templates/html.tpl";
?>
<body class="v35 webkit chrome alliance">
<div id="wrapper"> 
<img id="staticElements" src="img/x.gif" alt="" /> 
<div id="logoutContainer"> 
<a id="logout" href="logout.php" title="<?php echo LOGOUT; ?>">&nbsp;</a> 
</div> 
<div class="bodyWrapper"> 
<img style="filter:chroma();" src="img/x.gif" id="msfilter" alt="" /> 
<div id="header"> 
<div id="mtop">
<a id="logo" href="<?php echo HOMEPAGE; ?>" target="_blank" title="<?php echo SERVER_NAME ?>"></a>					<ul id="navigation">
						<li id="n1" class="resources">
							<a class="" href="dorf1.php" accesskey="1" title="<?php echo HEADER_DORF1; ?>"></a>
						</li>
						<li id="n2" class="village">
							<a class="" href="dorf2.php" accesskey="2" title="<?php echo HEADER_DORF2; ?>"></a>
						</li>
						<li id="n3" class="map">
							<a class="" href="karte.php" accesskey="3" title="<?php echo HEADER_MAP; ?>"></a>
						</li>
						<li id="n4" class="stats">
							<a class="" href="statistiken.php" accesskey="4" title="<?php echo HEADER_STATS; ?>"></a>
						</li>
<?php
    	if(count($database->getMessage($session->uid,7)) >= 1000) {
			$unmsg = "+1000";
		} else { $unmsg = count($database->getMessage($session->uid,7)); }
		
    	if(count($database->getMessage($session->uid,8)) >= 1000) {
			$unnotice = "+1000";
		} else { $unnotice = count($database->getMessage($session->uid,8)); }
?>
<li id="n5" class="reports"> 
<a href="berichte.php" accesskey="5" title="<?php echo HEADER_NOTICES; ?><?php if($message->nunread){ echo' ('.count($database->getMessage($session->uid,8)).')'; } ?>"></a>
<?php
if($message->nunread){
	echo "<div class=\"ltr bubble\" title=\"".$unnotice." ".HEADER_NOTICES_NEW."\" style=\"display:block\">
			<div class=\"bubble-background-l\"></div>
			<div class=\"bubble-background-r\"></div>
			<div class=\"bubble-content\">".$unnotice."</div></div>";
}
?>
</li>
<li id="n6" class="messages"> 
<a href="nachrichten.php" accesskey="6" title="<?php echo HEADER_MESSAGES; ?><?php if($message->unread){ echo' ('.count($database->getMessage($session->uid,7)).')'; } ?>"></a> 
<?php
if($message->unread) {
	echo "<div class=\"ltr bubble\" title=\"".$unmsg." ".HEADER_MESSAGES_NEW."\" style=\"display:block\">
			<div class=\"bubble-background-l\"></div>
			<div class=\"bubble-background-r\"></div>
			<div class=\"bubble-content\">".$unmsg."</div></div>";
}
?>
</li>

</ul>
<div class="clear"></div> 
</div> 
</div>
					<div id="mid">

												<div class="clear"></div> 


<div id="contentOuterContainer">
<div class="contentTitle">&nbsp;</div>
<div class="contentContainer">
<script type="text/javascript">
					window.addEvent('domready', function()
					{
						$$('.subNavi').each(function(element)
						{
							new Travian.Game.Menu(element);
						});
					});
				</script>
<?php

       include ("Templates/menu.tpl");

       if(isset($_GET['s']) && $_GET['s'] == 2) {
       	echo '<div id="content" class="forum">';
       } else {
       	echo '<div id="content" class="alliance">';
       }

       if(isset($_GET['s'])) {
       	switch($_GET['s']) {
       		case 2:
       			include ("Templates/Alliance/forum.tpl");
       			break;
       		case 3:
       			include ("Templates/Alliance/attacks.tpl");
       			break;
       		case 4:
       			include ("Templates/Alliance/news.tpl");
       			break;
       		case 5:
       			include ("Templates/Alliance/option.tpl");
       			break;
       		case 6:
       			include ("Templates/Alliance/chat.tpl");
       			break;
       		case 1:
       		default:
       			include ("Templates/Alliance/overview.tpl");
       			break;
       	}
       	// Options
       } elseif(isset($_POST['o'])) {
       	switch($_POST['o']) {
       		case 1:
       			if(isset($_POST['s']) == 5 && isset($_POST['a_user'])) {
       				$alliance->procAlliForm($_POST);
       				//echo "Funcion para el cambio de nombre de la alianza";
       				include ("Templates/Alliance/changepos.tpl");
       			} else {
       				include ("Templates/Alliance/assignpos.tpl");
       			}
       			break;
       		case 2:
       			if(isset($_POST['s']) == 5 && isset($_POST['a']) == 2) {
       				$alliance->procAlliForm($_POST);
       				include ("Templates/Alliance/kick.tpl");
       			} else {
       				include ("Templates/Alliance/kick.tpl");
       			}
       			break;
       		case 3:
       			if(isset($_POST['s']) == 5 && isset($_POST['a']) == 3) {
       				$alliance->procAlliForm($_POST);
       				//echo "Funcion para el cambio de nombre de la alianza";
       				include ("Templates/Alliance/allidesc.tpl");
       			} else {
       				include ("Templates/Alliance/allidesc.tpl");
       			}
       			break;
       		case 4:
       			if(isset($_POST['s']) == 5 && isset($_POST['a']) == 4) {
       				$alliance->procAlliForm($_POST);
       				//echo "Funcion para el cambio de nombre de la alianza";
       				include ("Templates/Alliance/invite.tpl");
       			} else {
       				include ("Templates/Alliance/invite.tpl");
       			}
       			break;
       		case 5:
       			include ("Templates/Alliance/linkforum.tpl");
       			break;
       		case 6:
       			if(isset($_POST['dipl']) and isset($_POST['a_name'])) {
       				$alliance->procAlliForm($_POST);
       				include ("Templates/Alliance/chgdiplo.tpl");
       			} else {
       				include ("Templates/Alliance/chgdiplo.tpl");
       			}
       			break;
       		case 11:
       			if(isset($_POST['s']) == 5 && isset($_POST['a']) == 11) {
       				$alliance->procAlliForm($_POST);
       				//echo "Funcion para el cambio de nombre de la alianza";
       				include ("Templates/Alliance/quitalli.tpl");
       			} else {
       				include ("Templates/Alliance/quitalli.tpl");
       			}
       			break;
       		default:
       			include ("Templates/Alliance/option.tpl");
       			break;
       		case 100:
       			if(isset($_POST['s']) == 5 && isset($_POST['a']) == 100) {
       				$alliance->procAlliForm($_POST);
       				//echo "Funcion para el cambio de nombre de la alianza";
       				include ("Templates/Alliance/changename.tpl");
       			} else {
       				include ("Templates/Alliance/changename.tpl");
       			}
       			break;
       		case 101:
       			$post = $_POST['id'];
       			$database->diplomacyCancelOffer($post);
       			include ("Templates/Alliance/chgdiplo.tpl");
       			break;
       		case 102:
       			$post = $_POST['id'];
       			$post2 = $_POST['alli2'];
       			$database->diplomacyInviteDenied($post, $post2);
       			include ("Templates/Alliance/chgdiplo.tpl");
       			break;
       		case 103:
       			$post = $_POST['id'];
       			$post2 = $_POST['alli2'];
       			$database->diplomacyInviteAccept($post, $post2);
       			include ("Templates/Alliance/chgdiplo.tpl");
       			break;
       		case 104:
       			$post = $_POST['id'];
       			$post2 = $_POST['alli2'];
       			$database->diplomacyCancelExistingRelationship($post, $post2);
       			include ("Templates/Alliance/chgdiplo.tpl");
       	}
       } else {

       	include ("Templates/Alliance/overview.tpl");
       }

?>



<div class="clear">&nbsp;</div>
</div>
<div class="clear"></div>
</div>
<div class="contentFooter">&nbsp;</div>
</div>                    
<?php
include("Templates/sideinfo.tpl");
include("Templates/footer.tpl");
include("Templates/header.tpl");
include("Templates/res.tpl");
include("Templates/vname.tpl");
include("Templates/quest.tpl");
?>

</div>
<div id="ce"></div>
</div>
</body>
</html>
