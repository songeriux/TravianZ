<?php

#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       Generator.php                                               ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2011. All rights reserved.                ##
##                                                                             ##
#################################################################################

class Generator {
	
	public function generateRandID(){
		return md5($this->generateRandStr(16));
		}

   public function generateRandStr($length){
      $randstr = "";
      for($i=0; $i<$length; $i++){
         $randnum = mt_rand(0,61);
         if($randnum < 10){
            $randstr .= chr($randnum+48);
         }else if($randnum < 36){
            $randstr .= chr($randnum+55);
         }else{
            $randstr .= chr($randnum+61);
         }
      }
      return $randstr;
   }
   
   public function encodeStr($str,$length) {
	   $encode = md5($str);
	   return substr($encode,0,$length);
   }
   
   public function procDistanceTime($coor,$thiscoor,$ref,$mode) {
		global $bid28,$bid14,$building;
		$xdistance = ABS($thiscoor['y'] - $coor['x']);
		if($xdistance > WORLD_MAX) {
			$xdistance = (2 * WORLD_MAX + 1) - $xdistance;
		}
		$ydistance = ABS($thiscoor['x'] - $coor['y']);
		if($ydistance > WORLD_MAX) {
			$ydistance = (2 * WORLD_MAX + 1) - $ydistance;
		}
		$distance = SQRT(POW($xdistance,2)+POW($ydistance,2));
		if(!$mode) {
			if($ref == 1) {
				$speed = 16;
			}
			else if($ref == 2) {
				$speed = 12;
			}
			else if($ref == 3) {
				$speed = 24; 
			}
			else if($ref == 300) {
				$speed = 5;
			}
			else {
				$speed = 1;
			}
		}
		else {
				$speed = $ref;
				if($building->getTypeLevel(14) != 0) {
					//$speed = $distance <= TS_THRESHOLD ? $speed : $speed * ( ( TS_THRESHOLD + ( $distance - TS_THRESHOLD ) * $bid14[$this->getsort_typeLevel(14,$resarray)]['attri'] / 100 ) / $distance ) ;
			}
		}
		return round(($distance/$speed) * 3600 / INCREASE_SPEED);
	}
   
   public function getTimeFormat($sec) {
	   /*if ($time%10 < 5) {
			$time = $time-($time%10);
		}
		else {
			$time = $time + (10 - $time%10);
		}*/
	   $min = 0;
	   $hr = 0;
	   $days = 0;
	   
	   while($sec >= 60) :
		   $sec -= 60;
		   $min += 1;
	   endwhile;
	   while($sec >= 60) :
		   $sec -= 60;
		   $min += 1;
	   endwhile;
	   
	   while ($min >= 60) :
		   $min -= 60;
		   $hr += 1;
	   endwhile;
	   
	   if ($min < 10) {
		   $min = "0".$min;
	   }
	   if($sec < 10) {
		   $sec = "0".$sec;
	   }
	   
		return $hr.":".$min.":".$sec;
   }

	public function procMtime($time) {
		/*$timezone = 7;
		switch($timezone) {
			case 7:
			$time -= 3600;
			break;
		}*/
		$today = date('d',time())-1;
		$todayy = date('d',time())-2;
		
		if (date('Y/m/d',time()) == date('Y/m/d',$time)) {
		//if ((time()-$time) < 24*60*60 && (time()-$time) > 0) {
			$day = "Ma";
		}elseif($today == date('d',$time)){
			$day = "Tegnap";
		}elseif($todayy == date('d',$time)){
			$day = "Tegnapelőtt";
		}
		else {
			$pref = 3;
			switch($pref) {
			case 1:
			$day = date("m/j/y",$time);
			break;
			case 2:
			$day = date("j/m/y",$time);
			break;
			case 3:
			$day = date("j/m/y",$time);
			break;
			default:
			$day = date("y/m/j",$time);
			break;
			}
		}
		$new = date("H:i:s",$time);
		return array($day,$new);
	}
   
	public function getBaseID($x,$y) {
	return ((WORLD_MAX-$y) * (WORLD_MAX*2+1)) + (WORLD_MAX +$x + 1);
	}
   
	public function getMapCheck($wref) {
		return substr(md5($wref),5,2);
	}
   
	public function pageLoadTimeStart() {
		$starttime = microtime();
		$startarray = explode(" ", $starttime);
		//$starttime = $startarray[1] + $startarray[0];
		return $startarray[0];
	}

	public function pageLoadTimeEnd() {
		$endtime = microtime();
		$endarray = explode(" ", $endtime);
		//$endtime = $endarray[1] + $endarray[0];
		return $endarray[0];
	}
	
};
$generator = new Generator;
