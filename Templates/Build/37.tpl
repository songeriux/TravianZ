<h1 class="titleInHeader">Heros Mansion <span class="level"> Level <?php echo $village->resarray['f'.$id]; ?></span></h1>

    <div id="build" class="gid37">
    <div class="build_desc">
        <a href="#" onClick="return Travian.Game.iPopup(37,4);" class="build_logo">
        <img class="building big white g37" src="img/x.gif" alt="Hősök háza" title="Hősök háza"></a>
        In the hero's mansion, you can get an overview of the surrounding oasis. Starting with building level 10, you can occupy oases with your hero and increase the resource production of your village..</div>
        
       <?php           
            include ("upgrade.tpl");             
            include("37_heromansion.tpl");
        ?>
        
    </div>
