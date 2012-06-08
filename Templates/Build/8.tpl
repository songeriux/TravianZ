<h1 class="titleInHeader">Grain Mill <span class="level"> Level <?php echo $village->resarray['f'.$id]; ?></span></h1>
<div id="build" class="gid8">
<div class="build_desc">
<a href="#" onClick="return Travian.Game.iPopup(8,4);" class="build_logo">
	<img class="building big white g8" src="img/x.gif" alt="Malom" title="Malom" />
</a>
A malomban a búzát lisztté őrlik. Minél magasabb szintre van kiépítve a búzamalom, annál nagyobb lesz a búzatermesztés növekedési százaléka.

Maximálisan 25 százalékkal növekedhet a búzatermesztés.</div>


	<table cellpadding="1" cellspacing="1" id="build_value">
		<tr>
			<th>Current increase in production:</th>
			<td><b><?php echo $bid8[$village->resarray['f'.$id]]['attri']; ?></b>%</td>
		</tr>
		<tr>
		<?php 
        if(!$building->isMax($village->resarray['f'.$id.'t'],$id)) {
        ?>
			<th>TIncrease in production at level  <?php echo $village->resarray['f'.$id]+1; ?> </th>
			<td><b><?php echo $bid8[$village->resarray['f'.$id]+1]['attri']; ?></b>%</td>
            <?php
            }
            ?>
		</tr>
	</table>
<?php 
include("upgrade.tpl");
?>
</p></div>