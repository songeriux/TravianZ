<?php
include "Data/hero_full.php";
$hero_levels = $GLOBALS["hero_levels"];
if($_POST && $_POST['a']=='inventory'){
	$data = $_POST;
	$uid = $session->uid;
	$hero = $database->HeroFace($uid);
	$heroData = $database->getHeroData($uid);
	$itemData = $database->getItemData($data['id']);
	
	if($data['btype']==1){
		$database->editProcItem($data['id'], 1);
		$database->setHeroInventory($uid, 'helmet', $data['id']);
		if($hero['helmet']!=0){
			$database->modifyHeroFace($uid, 'helmet', $data['type']);
			$id = $database->getHeroItemID2($uid, 1, $hero['helmet']);
			$database->editProcItem($id, 0);
		}else{
			$database->modifyHeroFace($uid, 'helmet', $data['type']);
		}
	}
	
	/*elseif($data['btype']==2){
		//$database->editProcItem($data['id'], 1);
		if($hero['helmet']!=0){
			
		}else{
			
		}
	}*/
	
	elseif($data['btype']==3){
		$database->editProcItem($data['id'], 1);
		$database->setHeroInventory($uid, 'leftHand', $data['id']);
		if($hero['leftHand']!=0){
			$database->modifyHeroFace($uid, 'leftHand', $data['type']);
			$id = $database->getHeroItemID2($uid, 3, $hero['leftHand']);
			$database->editProcItem($id, 0);
		}else{
			$database->modifyHeroFace($uid, 'leftHand', $data['type']);
		}
	}
	
	elseif($data['btype']==4){
		$database->editProcItem($data['id'], 1);
		$database->setHeroInventory($uid, 'rightHand', $data['id']);
		if($date['type']==16){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==17){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==18){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==19){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==20){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==21){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==22){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==23){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==24){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==25){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==26){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==27){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==28){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==29){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==30){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==31){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==32){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==33){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==34){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==35){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==36){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==37){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==38){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==39){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==40){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==41){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==42){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==43){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==44){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==45){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==46){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==47){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==48){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==49){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==50){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==51){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==52){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==53){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==54){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==55){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==56){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==57){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($date['type']==58){
		$database->modifyHero2("itempower",500,$uid,1);
		}
		if($date['type']==59){
		$database->modifyHero2("itempower",1000,$uid,1);
		}
		if($date['type']==60){
		$database->modifyHero2("itempower",1500,$uid,1);
		}
		if($hero['rightHand']!=0){
			$database->modifyHeroFace($uid, 'rightHand', $data['type']);
			$id = $database->getHeroItemID2($uid, 4, $hero['rightHand']);
			$database->editProcItem($id, 0);
		}else{
			$database->modifyHeroFace($uid, 'rightHand', $data['type']);
		}
	}
	
	elseif($data['btype']==5){
		$database->editProcItem($data['id'], 1);
		$database->setHeroInventory($uid, 'shoes', $data['id']);
		if($hero['foot']!=0){
			$database->modifyHeroFace($uid, 'foot', $data['type']);
			$id = $database->getHeroItemID2($uid, 5, $hero['foot']);
			$database->editProcItem($id, 0);
		}else{
			$database->modifyHeroFace($uid, 'foot', $data['type']);
		}
	}
	
	elseif($data['btype']==6){
		$database->editProcItem($data['id'], 1);
		$database->setHeroInventory($uid, 'horse', $data['id']);
		if($hero['horse']!=0){

		}else{
			if($data['type']==103){
				$value = 7*INCREASE_SPEED;
			}elseif($data['type']==104){
				$value = 10*INCREASE_SPEED;
			}elseif($data['type']==105){
				$value = 13*INCREASE_SPEED;
			}
			$database->modifyHeroFace($uid, 'horse', $data['type']);
			$database->modifyHero2('speed', $value, $uid, 1);
		}
	}
	
	/*elseif($data['btype']==7){
		$database->editProcItem($data['id'], 1);
		if($hero['bag']!=0){
			$database->modifyHeroFace($uid, 'bag', $data['type']);
			$id = $database->getHeroItemID2($uid, 7, $hero['bag']);
			$database->editProcItem($id, 0);
		}else{
			$database->modifyHeroFace($uid, 'bag', $data['type']);
		}
	}*/
	
	/*elseif($data['btype']==8){
		$database->editProcItem($data['id'], 1);
		if($hero['bag']!=0){
			$database->modifyHeroFace($uid, 'bag', $data['type']);
			$id = $database->getHeroItemID2($uid, 8, $hero['bag']);
			$database->editProcItem($id, 0);
		}else{
			$database->modifyHeroFace($uid, 'bag', $data['type']);
		}
	}*/
	
	/*elseif($data['btype']==9){
		$database->editProcItem($data['id'], 1);
		if($hero['bag']!=0){
			$database->modifyHeroFace($uid, 'bag', $data['type']);
			$id = $database->getHeroItemID2($uid, 9, $hero['bag']);
			$database->editProcItem($id, 0);
		}else{
			$database->modifyHeroFace($uid, 'bag', $data['type']);
		}
	}*/
	
	elseif($data['btype']==10){
		if($data['amount'] <= $itemData['num']){
			$value = ($data['amount']*10);
			if($data['amount'] < $itemData['num']){
				$database->modifyHero2('experience', $value, $uid, 1);
				$database->editHeroNum($data['id'], $data['amount'], 0);
				if($heroData['experience']>=$hero_levels[$heroData['level']+1]){
					$database->modifyHero2("level",1,$uid,1);
					$database->modifyHero2("points",4,$uid,1);
				}
			}else{
				$database->editProcItem($data['id'], 1);
				$database->modifyHero2('experience', $value, $uid, 1);
				if($heroData['experience']>=$hero_levels[$heroData['level']+1]){
					$database->modifyHero2("level",1,$uid,1);
					$database->modifyHero2("points",4,$uid,1);
				}
			}
		}
		header("Location: hero_inventory.php");
	}
	
	elseif($data['btype']==11){
		if($heroData['health']<100){
			if($data['amount'] <= $itemData['num']){
				$health = round($heroData['health']);
				if(($health+$data['amount'])>100){
					$database->modifyHero2('health', 100, $uid, 0);
					$newAmount = intval(100-$health);
					$database->editHeroNum($data['id'], $newAmount, 0);
				}	
				else{
					if($data['amount'] < $itemData['num']){
						$database->modifyHero2('health', $data['amount'], $uid, 1);
						$database->editHeroNum($data['id'], $data['amount'], 0);
					}else{
						$database->editProcItem($data['id'], 1);
						$database->modifyHero2('health', $data['amount'], $uid, 1);
					}
				}
			}
		}
	}
	
	elseif($data['btype']==12){
		if($heroData['dead']!=0){
			$database->modifyHero2('dead', 0, $uid, 0);
			$database->modifyHero2('health', 100, $uid, 0);
			$database->modifyHero2('wref', $village->wid, $uid, 0);
			$database->editProcItem($data['id'], 1);
		}
	}
	
	elseif($data['btype']==13){
		if($session->tribe == 1){ $tp = 100; }else{ $tp = 80; }
		$rp = 30;
		$powerPoints = $heroData['power'];
		$offPoints = $heroData['offBonus'];
		$defPoints = $heroData['defBonus'];
		$productPoints = $heroData['product'];
		
		$AllPoints = ($powerPoints+$offPoints+$defPoints+$productPoints);
		
		$database->modifyHero2('points', $AllPoints, $uid, 0);
		$database->modifyHero2('power', 0, $uid, 0);
		$database->modifyHero2('offBonus', 0, $uid, 0);
		$database->modifyHero2('defBonus', 0, $uid, 0);
		$database->modifyHero2('product', 0, $uid, 0);
		for($i=0;$i<=4;$i++){
			$database->modifyHero2('r'.$i, 0, $uid, 0);
		}
		$database->editProcItem($data['id'], 1);
	}
	
	elseif($data['btype']==14){
		if($village->loyalty<=125){
			if($data['amount'] <= $itemData['num']){
				if(($village->loyalty+$data['amount'])>125){
					$database->setVillageField($village->wid, 'loyalty', 125);
					$newAmount = intval(125-$village->loyalty);
					$database->editHeroNum($data['id'], $newAmount, 0);
				}	
				else{
					if($data['amount'] < $itemData['num']){
						$database->setVillageField($village->wid, 'loyalty', ($village->loyalty+$data['amount']));
						$database->editHeroNum($data['id'], $data['amount'], 0);
					}else{
						$database->editProcItem($data['id'], 1);
						$database->setVillageField($village->wid, 'loyalty', ($village->loyalty+$data['amount']));
					}
				}
			}
		}
		header("Location: hero_inventory.php");
	}
	
	elseif($data['btype']==15){
		if($data['amount'] <= $itemData['num']){
			$value = ($data['amount']*$database->getVSumField($uid, 'cp'));
			if($data['amount'] < $itemData['num']){
				$database->updateUserField($uid, 'cp', $value, 2);
				$database->editHeroNum($data['id'], $data['amount'], 0);
			}else{
				$database->editProcItem($data['id'], 1);
				$database->updateUserField($uid, 'cp', $value, 2);
			}
		}
	}
	
}
?>