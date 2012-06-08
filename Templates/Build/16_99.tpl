<h1 class="titleInHeader">Gyülekezőtér <span class="level">szint <?php echo $village->resarray['f'.$id]; ?></span></h1>
<div id="build" class="gid16">
<div class="build_desc">
<a href="#" onClick="return Travian.Game.iPopup(16,4);" class="build_logo">
<img class="g16 big white" src="img/x.gif" alt="Gyülekezőtér" title="Gyülekezőtér" />
</a>
A falvad harcosai gyülekeznek itt. Várnak hogy mehessenek hódítani, harcolni, rabolni, vagy éppen támogatni szövetséges falvakat..</div>
<?php include("upgrade.tpl"); ?>
<div class="contentNavi tabNavi">
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="build.php?id=<?php echo $id; ?>"><span class="tabItem">Nézet</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="a2b.php"><span class="tabItem">Egységek kiküldése</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="warsim.php"><span class="tabItem">Harc-Szimulátor</span></a></div>
				</div>
                <div class="container active">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="build.php?id=39&amp;t=99"><span class="tabItem">Farmlista</span></a></div>
				</div>
</div>

		<div id="raidList">
	<?php if(!$session->goldclub) { ?>
	<div class="options">
					<div id="spaceUsed">
				<div class="boxes boxesColor gray"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents">				A farmlista ingyenes, az aranyklubon belül érhető el.					</div>
				</div>
                <div class="clear"></div>
			</div>

			<a class="arrow" href="plus.php?id=3#goldclub">Arany Klub</a>
			</div>
            <?php
            }else{ include "Templates/goldClub/farmlist.tpl"; }
            
            ?>
</div>

</div>
