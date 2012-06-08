<?php			   
	//gp link
	if($session->gpack == null || GP_ENABLE == false) {
	$gpack= GP_LOCATE;
	} else {
	$gpack= $session->gpack;
	}

	
//de bird
if($displayarray['protect'] > time()){
$uurover=date('H:i:s', ($displayarray['protect'] - time()));
$profiel = preg_replace("/\[#0]/is",'<img src="'.$gpack.'img/t/tn.gif" border="0" title="این بازیکن تا '.$uurover.' ساعت دیگر تحت حمایت است." >', $profiel, 1);
} else {
$geregistreerd=date('Y/m/d', ($displayarray['timestamp']));
$tregistreerd=date('H:i', ($displayarray['timestamp']));
$profiel = preg_replace("/\[#0]/is",'<img src="'.$gpack.'img/t/tnd.gif" border="0" title="این بازیکن در تاریخ '.$geregistreerd.' '.$tregistreerd.' ثبت نام کرده است.">', $profiel, 1);
}

//natar image
if($displayarray['username'] == "Natars"){
$profiel = preg_replace("/\[#natars]/is",'<img src="gpack/travian_Travian_4.0_41/img/t/t10_2.jpg" border="0">', $profiel, 1);
$profiel = preg_replace("/\[#natars]/is",'<img src="gpack/travian_Travian_4.0_41/img/t/t10_2.jpg" border="0">', $profiel, 1);
}

//de lintjes
/******************************
INDELING CATEGORIEEN:
===============================
== 1. Attackers top 10       ==
== 2. Defence top 10         ==
== 3. Climbers top 10        ==
== 4. Raiders top 10 	     ==
== 5. attackers and defences ==
== 6. in top 3 - Attackers   ==
== 7. in top 3 - Defence 	 ==
== 8. in top 3 - Climbers    ==
== 9. in top 3 - Raiders     ==
******************************/

foreach($varmedal as $medal) {

switch ($medal['categorie']) {
    case "1":
        $titel="مهاجمین هفته";
		$woord="امتیاز";
        break;
    case "2":
        $titel="مدافعین هفته";
 		$woord="امتیاز";
       break;
    case "3":
        $titel="پیشرفت کننده های هفته";
 		$woord="جمعیت";
       break;
    case "4":
        $titel="دزدان هفته";
		$woord="منابع";
        break;
	 case "5":
        $titel="دريافت اين مدال نشان می‌دهد كه شما براي یک هفته، هم در ميان مهاجمين و هم در ميان مدافعين هفته بين 10 نفر اول بوده‌ايد.";
        $bonus[$medal['id']]=1;
		break;
	 case "6":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ مهاجمین هفته با ".$medal['points']." امتیاز بین 3 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
		break;
	 case "7":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ مدافعین هفته با ".$medal['points']." امتیاز بین 3 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
		break;
	 case "8":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ پیشرفت کننده های هفته با ".$medal['points']." امتیاز بین 3 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
		break;
	 case "9":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ دزدان هفته با ".$medal['points']." امتیاز بین 3 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
		break;
     case "10":
        $titel="پیشرفت کننده های هفته";
        $woord="رتبه"; 
        break;
         case "11":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ پیشرفت کننده های هفته با ".$medal['points']." امتیاز بین 3 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
        break;
         case "12":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ مهاجمین هفته با ".$medal['points']." امتیاز بین 10 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
        break;
        case "13":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ مدافعین هفته با ".$medal['points']." امتیاز بین 10 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
        break;
        case "14":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ پیشرفت کننده های هفته با ".$medal['points']." امتیاز بین 10 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
        break;
        case "15":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ دزدان هفته با ".$medal['points']." امتیاز بین 10 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
        break;
        case "16":
        $titel="دریافت این مدال نشان میدهد که شما در تاپ پیشرفت کننده های هفته با ".$medal['points']." امتیاز بین 10 نفر اول بوده اید.";
        $bonus[$medal['id']]=1;
        break;
        

}

if(isset($bonus[$medal['id']])){

	$profiel = preg_replace("/\[#".$medal['id']."]/is",'<img class="medal '.$medal['img'].'" src="img/x.gif" title="'.$titel.'
<br />دريافت در هفته‌ی '.$medal['week'].'">', $profiel, 1);
} else {
	$profiel = preg_replace("/\[#".$medal['id']."]/is",'<img class="medal '.$medal['img'].'" src="img/x.gif" title="دسته: '.$titel.'<br />هفته: '.$medal['week'].'<br />رتبه: '.$medal['plaats'].'<br />'.$woord.': '.$medal['points'].'<br />">', $profiel, 1);
}
}



?>

