<?php
        class Ranking {
			
			public function getUserRank($username) {
        		$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, (

				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id != 0 and id != 2 and id != 3
				ORDER BY totalpop DESC, userid ASC";
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['username'] == $username){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			public function getUserAttRank($username) {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.apall apall
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY apall DESC, userid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['username'] == $username){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			public function getUserDefRank($username) {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.dpall dpall
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY dpall DESC, userid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['username'] == $username){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			public function getAllianceRank($id) {
        		$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.alliance alliance, (

				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.alliance > 0
				ORDER BY totalpop DESC, userid ASC";
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['username'] == $username){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			public function getAllianceAttRank($id) {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.alliance alliance, (
				
				SELECT SUM( " . TB_PREFIX . "alidata.Aap ) 
				FROM " . TB_PREFIX . "alidata
				WHERE " . TB_PREFIX . "alidata.id = alliance
				)totalpoint
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.alliance > 0
				ORDER BY totalpoint DESC, alliance ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['alliance'] == $id){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			public function getAllianceDefRank($id) {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.alliance alliance, (
				
				SELECT SUM( " . TB_PREFIX . "alidata.Adp ) 
				FROM " . TB_PREFIX . "alidata
				WHERE " . TB_PREFIX . "alidata.id = alliance
				)totalpoint
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.alliance > 0
				ORDER BY totalpoint DESC, alliance ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['alliance'] == $id){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			
			
			
			public function procUsersRanking($limit="") {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username," . TB_PREFIX . "users.alliance alliance, (
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (

				SELECT SUM( " . TB_PREFIX . "users.RR ) 
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id = userid
				)totalraid, (
				
				SELECT COUNT( " . TB_PREFIX . "vdata.wref ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid AND type != 99
				)totalvillages, (
		
				SELECT " . TB_PREFIX . "alidata.tag
				FROM " . TB_PREFIX . "alidata, " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "alidata.id = " . TB_PREFIX . "users.alliance
				AND " . TB_PREFIX . "users.id = userid
				)allitag
					
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id !=0 AND id !=2 AND id !=3
				ORDER BY totalpop DESC, totalraid DESC, userid ASC $limit";
				return mysql_query($q);
			}
						
			public function procUsersAttRanking($limit="") {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.apall apall, (
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (
					
				SELECT COUNT( " . TB_PREFIX . "vdata.wref ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid AND type != 99
				)totalvillages
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY apall DESC, userid ASC $limit";
				return mysql_query($q);
			}
			
			
			public function procUsersDefRanking($limit="") {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.dpall dpall, (
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (
						
				SELECT COUNT( " . TB_PREFIX . "vdata.wref ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid AND type != 99
				)totalvillages
					
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY dpall DESC, userid ASC $limit";
				return mysql_query($q);
			}
						
			
			
			
			
			public function procAllianceRanking($limit="") {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.alliance allyid, (
				
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (
						
				SELECT COUNT( " . TB_PREFIX . "users.alliance ) 
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.alliance = allyid
				)totalusers
					
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.alliance > 0
				ORDER BY totalpop DESC, allyid ASC $limit";
				return mysql_query($q);
			}
			
			
			public function procAllianceAttRanking($limit="") {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.alliance allyid, (
				
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (
				
				SELECT SUM( " . TB_PREFIX . "alidata.Aap ) 
				FROM " . TB_PREFIX . "alidata
				WHERE " . TB_PREFIX . "alidata.id = allyid
				)totalpoint, (
						
				SELECT COUNT( " . TB_PREFIX . "users.alliance ) 
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.alliance = allyid
				)totalusers
					
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.alliance > 0
				ORDER BY totalpoint DESC, allyid ASC $limit";
				return mysql_query($q);
			}
			
			public function procAllianceDefRanking($limit="") {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.alliance allyid, (
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (
				
				SELECT SUM( " . TB_PREFIX . "alidata.Adp ) 
				FROM " . TB_PREFIX . "alidata
				WHERE " . TB_PREFIX . "alidata.id = allyid
				)totalpoint, (
						
				SELECT COUNT( " . TB_PREFIX . "users.alliance ) 
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.alliance = allyid
				)totalusers
					
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.alliance > 0
				ORDER BY totalpoint DESC, allyid ASC $limit";
				return mysql_query($q);
			}
						
			public function getATop10AttRank($id) {
				$q = "SELECT " . TB_PREFIX . "alidata.id allyid, " . TB_PREFIX . "alidata.ap ap
				FROM " . TB_PREFIX . "alidata
				WHERE " . TB_PREFIX . "alidata.id > 0
				ORDER BY ap DESC, allyid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['allyid'] == $id){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			
			public function getATop10DefRank($id) {
				$q = "SELECT " . TB_PREFIX . "alidata.id allyid, " . TB_PREFIX . "alidata.dp dp
				FROM " . TB_PREFIX . "alidata
				WHERE " . TB_PREFIX . "alidata.id > 0
				ORDER BY dp DESC, allyid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['allyid'] == $id){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			
			public function getATop10ClpRank($id) {
				$q = "SELECT " . TB_PREFIX . "alidata.id allyid, " . TB_PREFIX . "alidata.clp clp
				FROM " . TB_PREFIX . "alidata
				WHERE " . TB_PREFIX . "alidata.id > 0
				ORDER BY clp DESC, allyid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['allyid'] == $id){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			public function getATop10RobbersRank($id) {
				$q = "SELECT " . TB_PREFIX . "alidata.id allyid, " . TB_PREFIX . "alidata.RR RR
				FROM " . TB_PREFIX . "alidata
				WHERE " . TB_PREFIX . "alidata.id > 0
				ORDER BY RR DESC, allyid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['allyid'] == $id){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			
			
			
			
			public function getVillageRank($wid) {
        		$q = "SELECT * FROM ".TB_PREFIX."vdata WHERE wref != 0 AND owner != 2 ORDER BY pop DESC, name ASC, lastupdate DESC";
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['wref'] == $wid){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			public function procVillagesRanking($limit="") {				
				$q = "SELECT * FROM ".TB_PREFIX."vdata WHERE wref != 0 AND owner != 2 ORDER BY pop DESC, name ASC, lastupdate DESC $limit";
				return mysql_query($q);
			}
			
			
			
			
			
			public function getHeroRank($uid) {
        		$q = "SELECT " . TB_PREFIX . "users.id userid, (
				
				SELECT SUM( " . TB_PREFIX . "hero.experience ) 
				FROM " . TB_PREFIX . "hero
				WHERE " . TB_PREFIX . "hero.uid = userid
				)experience, (
				
				SELECT SUM( " . TB_PREFIX . "hero.level ) 
				FROM " . TB_PREFIX . "hero
				WHERE " . TB_PREFIX . "hero.uid = userid
				)hlevel, (
				
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid AND type != 99
				)totalpop
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY experience DESC, totalpop ASC, userid ASC";
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['userid'] == $uid){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			public function procHeroesRanking($limit="") {
				$q = "SELECT " . TB_PREFIX . "users.id userid, (
				
				SELECT SUM( " . TB_PREFIX . "hero.experience ) 
				FROM " . TB_PREFIX . "hero
				WHERE " . TB_PREFIX . "hero.uid = userid
				)experience, (
				
				SELECT SUM( " . TB_PREFIX . "hero.level ) 
				FROM " . TB_PREFIX . "hero
				WHERE " . TB_PREFIX . "hero.uid = userid
				)hlevel, (
				
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid AND type != 99
				)totalpop
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY experience DESC, totalpop ASC, userid ASC $limit";
				
				return mysql_query($q);
			}



			
			public function getTop10AttRank($username) {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.ap ap, (
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (
					
				SELECT COUNT( " . TB_PREFIX . "vdata.wref ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid AND type != 99
				)totalvillages
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY ap DESC, userid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['username'] == $username){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			
			public function getTop10DefRank($username) {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.dp dp, (
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (
					
				SELECT COUNT( " . TB_PREFIX . "vdata.wref ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid AND type != 99
				)totalvillages
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY dp DESC, userid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['username'] == $username){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			
			public function getTop10ClpRank($username) {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.clp clp, (
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (
					
				SELECT COUNT( " . TB_PREFIX . "vdata.wref ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid AND type != 99
				)totalvillages
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY clp DESC, userid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['username'] == $username){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
			
			public function getTop10RobbersRank($username) {
				$q = "SELECT " . TB_PREFIX . "users.id userid, " . TB_PREFIX . "users.username username, " . TB_PREFIX . "users.RR RR, (
				SELECT SUM( " . TB_PREFIX . "vdata.pop ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid
				)totalpop, (
					
				SELECT COUNT( " . TB_PREFIX . "vdata.wref ) 
				FROM " . TB_PREFIX . "vdata
				WHERE " . TB_PREFIX . "vdata.owner = userid AND type != 99
				)totalvillages
				
				FROM " . TB_PREFIX . "users
				WHERE " . TB_PREFIX . "users.id > 3
				ORDER BY RR DESC, userid ASC";
					
				$result = mysql_query($q);
				$i = 1;
				$myrank = 0;
				while($row = mysql_fetch_array($result)) {
					if($row['username'] == $username){
						$myrank = $i;
					}
					$i++;
				}
				return $myrank;
        	}
        }
        ;

        $ranking = new Ranking;

?>