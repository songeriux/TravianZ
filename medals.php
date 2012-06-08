<?php
include_once("GameEngine/Account.php");
include_once("GameEngine/Village.php");
mysql_connect(SQL_SERVER, SQL_USER, SQL_PASS);
mysql_select_db(SQL_DB);

if (mysql_num_rows(mysql_query("SELECT id FROM ".TB_PREFIX."users WHERE access = 9 AND id = ".$session->uid)) != '1') die("Hacking attemp!");

		//bepaal welke week we zitten
		$q = "SELECT * FROM ".TB_PREFIX."medal order by week DESC LIMIT 0, 1";
		$result = mysql_query($q);
		if(mysql_num_rows($result)) {
			$row=mysql_fetch_assoc($result);
			$week=($row['week']+1);
		} else {
			$week='1';
		}
        
        //Do same for ally week
        $q = "SELECT * FROM ".TB_PREFIX."allimedal order by week DESC LIMIT 0, 1";
        $result = mysql_query($q);
        if(mysql_num_rows($result)) {
            $row=mysql_fetch_assoc($result);
            $allyweek=($row['week']+1);
        } else {
            $allyweek='1';
        }

	//we mogen de lintjes weggeven
	if(isset($_GET['giveout'])){


	//Aanvallers v/d Week
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY ap DESC Limit 10");
    $i=0; 	while($row = mysql_fetch_array($result)){
	$i++;	$img="t2_".($i)."";
	$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '1', '".($i)."', '".$week."', '".$row['ap']."', '".$img."')";
	$resul=mysql_query($quer);	  
	}

	//Verdediger v/d Week
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY dp DESC Limit 10");
    $i=0; 	while($row = mysql_fetch_array($result)){
	$i++;	$img="t3_".($i)."";
	$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '2', '".($i)."', '".$week."', '".$row['dp']."', '".$img."')";
	$resul=mysql_query($quer);	  
	}	
    
    //Rank climbers of the week
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY clp DESC Limit 10");
    $i=0;     while($row = mysql_fetch_array($result)){
    $i++;    $img="t1_".($i)."";
    $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '10', '".($i)."', '".$week."', '".$row['clp']."', '".$img."')";
    $resul=mysql_query($quer);      
    }    

	//Overvallers v/d Week
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY RR DESC Limit 10");
    $i=0; 	while($row = mysql_fetch_array($result)){
	$i++;	$img="t4_".($i)."";
	$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '4', '".($i)."', '".$week."', '".$row['RR']."', '".$img."')";
	$resul=mysql_query($quer);	  
	}	

	//deel de bonus voor aanval+defence top 10 uit
	//Pak de top10 aanvallers
        $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY ap DESC Limit 10");
    while($row = mysql_fetch_array($result)){
    
         //Pak de top10 verdedigers
        $result2 = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY dp DESC Limit 10");
        while($row2 = mysql_fetch_array($result2)){
            if($row['id']==$row2['id']){
            
            $query3="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 5";
            $result3=mysql_query($query3);
             $row3=mysql_fetch_row($result3);
        
                //kijk welke kleur het lintje moet hebben
                if($row3[0]<='2'){
                    $img="t22".$row3[0]."_1";
                        switch ($row3[0]) {
                            case "0":
                                $tekst="";
                                break;
                            case "1":
                                $tekst="twice ";
                                break;
                            case "2":
                                $tekst="three times ";
                                break;
                        }
                    $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '5', '0', '".$week."', '".$tekst."', '".$img."')";
                    $resul=mysql_query($quer);
                }
            }
        }    
    }

	//je staat voor 3e / 5e / 10e keer in de top 3 aanvallers 
	//Pak de top10 aanvallers
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY ap DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 

			$query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 1 AND plaats<=3";
			$result1=mysql_query($query1);
	 		$row1=mysql_fetch_row($result1);
 

		//2x in gestaan, dit is 3e dus lintje (brons)
		if($row1[0]=='3'){	
			$img="t120_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '6', '0', '".$week."', 'Three', '".$img."')";
			$resul=mysql_query($quer);
		}
		//4x in gestaan, dit is 5e dus lintje (zilver)
		if($row1[0]=='5'){	
			$img="t121_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '6', '0', '".$week."', 'Five', '".$img."')";
			$resul=mysql_query($quer);
		}		
		//9x in gestaan, dit is 10e dus lintje (goud)
		if($row1[0]=='10'){	
			$img="t122_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '6', '0', '".$week."', 'Ten', '".$img."')";
			$resul=mysql_query($quer);
		}

	}
	//je staat voor 3e / 5e / 10e keer in de top 10 aanvallers 
    //Pak de top10 aanvallers
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY ap DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 
    
            $query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 1 AND plaats<=10";
            $result1=mysql_query($query1);
             $row1=mysql_fetch_row($result1);
 
        
        //2x in gestaan, dit is 3e dus lintje (brons)
        if($row1[0]=='3'){    
            $img="t130_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '12', '0', '".$week."', 'Three', '".$img."')";
            $resul=mysql_query($quer);
        }
        //4x in gestaan, dit is 5e dus lintje (zilver)
        if($row1[0]=='5'){    
            $img="t131_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '12', '0', '".$week."', 'Five', '".$img."')";
            $resul=mysql_query($quer);
        }        
        //9x in gestaan, dit is 10e dus lintje (goud)
        if($row1[0]=='10'){    
            $img="t132_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '12', '0', '".$week."', 'Ten', '".$img."')";
            $resul=mysql_query($quer);
        }
        
    }
	//je staat voor 3e / 5e / 10e keer in de top 3 verdedigers 
	//Pak de top10 verdedigers
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY dp DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 

			$query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 2 AND plaats<=3";
			$result1=mysql_query($query1);
	 		$row1=mysql_fetch_row($result1);
 

		//2x in gestaan, dit is 3e dus lintje (brons)
		if($row1[0]=='3'){	
			$img="t140_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '7', '0', '".$week."', 'Three', '".$img."')";
			$resul=mysql_query($quer);
		}
		//4x in gestaan, dit is 5e dus lintje (zilver)
		if($row1[0]=='5'){	
			$img="t141_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '7', '0', '".$week."', 'Five', '".$img."')";
			$resul=mysql_query($quer);
		}		
		//9x in gestaan, dit is 10e dus lintje (goud)
		if($row1[0]=='10'){	
			$img="t142_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '7', '0', '".$week."', 'Ten', '".$img."')";
			$resul=mysql_query($quer);
		}

	}
    //je staat voor 3e / 5e / 10e keer in de top 3 verdedigers 
    //Pak de top10 verdedigers
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY dp DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 
    
            $query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 2 AND plaats<=10";
            $result1=mysql_query($query1);
             $row1=mysql_fetch_row($result1);
 
        
        //2x in gestaan, dit is 3e dus lintje (brons)
        if($row1[0]=='3'){    
            $img="t150_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '13', '0', '".$week."', 'Three', '".$img."')";
            $resul=mysql_query($quer);
        }
        //4x in gestaan, dit is 5e dus lintje (zilver)
        if($row1[0]=='5'){    
            $img="t151_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '13', '0', '".$week."', 'Five', '".$img."')";
            $resul=mysql_query($quer);
        }        
        //9x in gestaan, dit is 10e dus lintje (goud)
        if($row1[0]=='10'){    
            $img="t152_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '13', '0', '".$week."', 'Ten', '".$img."')";
            $resul=mysql_query($quer);
        }
        
    }	

	//je staat voor 3e / 5e / 10e keer in de top 3 klimmers 
	//Pak de top10 klimmers
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY Rc DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 

			$query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 3 AND plaats<=3";
			$result1=mysql_query($query1);
	 		$row1=mysql_fetch_row($result1);
 

		//2x in gestaan, dit is 3e dus lintje (brons)
		if($row1[0]=='3'){	
			$img="t100_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '8', '0', '".$week."', 'Three', '".$img."')";
			$resul=mysql_query($quer);
		}
		//4x in gestaan, dit is 5e dus lintje (zilver)
		if($row1[0]=='5'){	
			$img="t101_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '8', '0', '".$week."', 'Five', '".$img."')";
			$resul=mysql_query($quer);
		}		
		//9x in gestaan, dit is 10e dus lintje (goud)
		if($row1[0]=='10'){	
			$img="t102_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '8', '0', '".$week."', 'Ten', '".$img."')";
			$resul=mysql_query($quer);
		}
	}//je staat voor 3e / 5e / 10e keer in de top 3 klimmers 
    //Pak de top10 klimmers
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY Rc DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 
    
            $query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 3 AND plaats<=10";
            $result1=mysql_query($query1);
             $row1=mysql_fetch_row($result1);
 
        
        //2x in gestaan, dit is 3e dus lintje (brons)
        if($row1[0]=='3'){    
            $img="t110_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '14', '0', '".$week."', 'Three', '".$img."')";
            $resul=mysql_query($quer);
        }
        //4x in gestaan, dit is 5e dus lintje (zilver)
        if($row1[0]=='5'){    
            $img="t111_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '14', '0', '".$week."', 'Five', '".$img."')";
            $resul=mysql_query($quer);
        }        
        //9x in gestaan, dit is 10e dus lintje (goud)
        if($row1[0]=='10'){    
            $img="t112_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '14', '0', '".$week."', 'Ten', '".$img."')";
            $resul=mysql_query($quer);
        }
    }
    
    //je staat voor 3e / 5e / 10e keer in de top 3 klimmers 
    //Pak de top3 rank climbers 
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY clp DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 
    
            $query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 10 AND plaats<=3";
            $result1=mysql_query($query1);
             $row1=mysql_fetch_row($result1);
 
        
        //2x in gestaan, dit is 3e dus lintje (brons)
        if($row1[0]=='3'){    
            $img="t200_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '11', '0', '".$week."', 'Three', '".$img."')";
            $resul=mysql_query($quer);
        }
        //4x in gestaan, dit is 5e dus lintje (zilver)
        if($row1[0]=='5'){    
            $img="t201_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '11', '0', '".$week."', 'Five', '".$img."')";
            $resul=mysql_query($quer);
        }        
        //9x in gestaan, dit is 10e dus lintje (goud)
        if($row1[0]=='10'){    
            $img="t202_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '11', '0', '".$week."', 'Ten', '".$img."')";
            $resul=mysql_query($quer);
        }
    }
    //je staat voor 3e / 5e / 10e keer in de top 10klimmers 
    //Pak de top3 rank climbers 
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY clp DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 
    
            $query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 10 AND plaats<=10";
            $result1=mysql_query($query1);
             $row1=mysql_fetch_row($result1);
 
        
        //2x in gestaan, dit is 3e dus lintje (brons)
        if($row1[0]=='3'){    
            $img="t210_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '16', '0', '".$week."', 'Three', '".$img."')";
            $resul=mysql_query($quer);
        }
        //4x in gestaan, dit is 5e dus lintje (zilver)
        if($row1[0]=='5'){    
            $img="t211_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '16', '0', '".$week."', 'Five', '".$img."')";
            $resul=mysql_query($quer);
        }        
        //9x in gestaan, dit is 10e dus lintje (goud)
        if($row1[0]=='10'){    
            $img="t212_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '16', '0', '".$week."', 'Ten', '".$img."')";
            $resul=mysql_query($quer);
        }
    }    	

	//je staat voor 3e / 5e / 10e keer in de top 10 overvallers 
	//Pak de top10 overvallers
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY RR DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 

			$query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 4 AND plaats<=3";
			$result1=mysql_query($query1);
	 		$row1=mysql_fetch_row($result1);
 

		//2x in gestaan, dit is 3e dus lintje (brons)
		if($row1[0]=='3'){	
			$img="t160_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '9', '0', '".$week."', 'Three', '".$img."')";
			$resul=mysql_query($quer);
		}
		//4x in gestaan, dit is 5e dus lintje (zilver)
		if($row1[0]=='5'){	
			$img="t161_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '9', '0', '".$week."', 'Five', '".$img."')";
			$resul=mysql_query($quer);
		}		
		//9x in gestaan, dit is 10e dus lintje (goud)
		if($row1[0]=='10'){	
			$img="t162_1";
			$quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '9', '0', '".$week."', 'Ten', '".$img."')";
			$resul=mysql_query($quer);
		}
	} //je staat voor 3e / 5e / 10e keer in de top 10 overvallers 
    //Pak de top10 overvallers
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY RR DESC Limit 10");
    while($row = mysql_fetch_array($result)){ 
    
            $query1="SELECT count(*) FROM ".TB_PREFIX."medal WHERE userid='".$row['id']."' AND categorie = 4 AND plaats<=10";
            $result1=mysql_query($query1);
             $row1=mysql_fetch_row($result1);
 
        
        //2x in gestaan, dit is 3e dus lintje (brons)
        if($row1[0]=='3'){    
            $img="t170_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '15', '0', '".$week."', 'Three', '".$img."')";
            $resul=mysql_query($quer);
        }
        //4x in gestaan, dit is 5e dus lintje (zilver)
        if($row1[0]=='5'){    
            $img="t171_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '15', '0', '".$week."', 'Five', '".$img."')";
            $resul=mysql_query($quer);
        }        
        //9x in gestaan, dit is 10e dus lintje (goud)
        if($row1[0]=='10'){    
            $img="t172_1";
            $quer="insert into ".TB_PREFIX."medal(userid, categorie, plaats, week, points, img) values('".$row['id']."', '15', '0', '".$week."', 'Ten', '".$img."')";
            $resul=mysql_query($quer);
        }
    }

	//Zet alle waardens weer op 0
	 $query="SELECT * FROM ".TB_PREFIX."users WHERE id > 3 ORDER BY id+0 DESC";
	 $result=mysql_query($query);
	 for ($i=0; $row=mysql_fetch_row($result); $i++){
	 mysql_query("UPDATE ".TB_PREFIX."users SET ap=0, dp=0,Rc=0,clp=0, RR=0 WHERE id = ".$row[0]."");
	}
    
    //Start alliance Medals wooot
    
	//Aanvallers v/d Week
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."alidata ORDER BY ap DESC Limit 10");
    $i=0;     while($row = mysql_fetch_array($result)){
    $i++;    $img="a2_".($i)."";
    $quer="insert into ".TB_PREFIX."allimedal(allyid, categorie, plaats, week, points, img) values('".$row['id']."', '1', '".($i)."', '".$allyweek."', '".$row['ap']."', '".$img."')";
    $resul=mysql_query($quer);      
    }

    //Verdediger v/d Week
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."alidata ORDER BY dp DESC Limit 10");
    $i=0;     while($row = mysql_fetch_array($result)){
    $i++;    $img="a3_".($i)."";
    $quer="insert into ".TB_PREFIX."allimedal(allyid, categorie, plaats, week, points, img) values('".$row['id']."', '2', '".($i)."', '".$allyweek."', '".$row['dp']."', '".$img."')";
    $resul=mysql_query($quer);      
    }    
    
      //Overvallers v/d Week
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."alidata ORDER BY RR DESC Limit 10");
    $i=0;     while($row = mysql_fetch_array($result)){
    $i++;    $img="a4_".($i)."";
    $quer="insert into ".TB_PREFIX."allimedal(allyid, categorie, plaats, week, points, img) values('".$row['id']."', '4', '".($i)."', '".$allyweek."', '".$row['RR']."', '".$img."')";
    $resul=mysql_query($quer);      
    }
    
    //Rank climbers of the week
    $result = mysql_query("SELECT * FROM ".TB_PREFIX."alidata ORDER BY clp DESC Limit 10");
    $i=0;     while($row = mysql_fetch_array($result)){
    $i++;    $img="a1_".($i)."";
    $quer="insert into ".TB_PREFIX."allimedal(allyid, categorie, plaats, week, points, img) values('".$row['id']."', '3', '".($i)."', '".$allyweek."', '".$row['clp']."', '".$img."')";
    $resul=mysql_query($quer);      
    }
 
    
     $query="SELECT * FROM ".TB_PREFIX."alidata ORDER BY id+0 DESC";
     $result=mysql_query($query);
     for ($i=0; $row=mysql_fetch_row($result); $i++){
     mysql_query("UPDATE ".TB_PREFIX."alidata SET ap=0, dp=0, RR=0, clp=0 WHERE id = ".$row[0]."");
    }    
	}
include "Templates/html.tpl";
?>
<body class="v35 webkit chrome map">
	<div id="wrapper"> 
		<img id="staticElements" src="img/x.gif" alt="" /> 
		<div id="logoutContainer"> 
			<a id="logout" href="logout.php" title="<?php echo LOGOUT; ?>">&nbsp;</a> 
		</div> 
		<div class="bodyWrapper"> 
			<img style="filter:chroma();" src="img/x.gif" id="msfilter" alt="" /> 
			<div id="header"> 
				<div id="mtop">
					<a id="logo" href="<?php echo HOMEPAGE; ?>" target="_blank" title="<?php echo SERVER_NAME ?>"></a>
					<ul id="navigation">
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
<div id="content"  class="login">
<h1 class="titleInHeader">TOP 10 Medals</h1>
<?php
if(isset($_GET['giveout'])){?>
<h1><br/>Top 10 Medals</h1><br />
Done:<br />
-Top 10 Attacker<br />
-Top 10 Defender<br />
-Top 10 Robbers<br />
-Top 10 Alliance Attacker<br />
-Top 10 Alliance Defencer<br />
-Top 10 Alliance Robbers<br />
-Top 10 Alliance Climbers(Rank)<br />
-Top 10 Pop Climbers<br />
-Top 10 Rank Climbers<br />
-Bonus: Attacker AND Defender<br />
-Bonus: 3/5/10 times in a row top 3 Pop Climbers<br />
-Bonus: 3/5/10 times in a row top 3 Rank Climbers<br />
-Bonus: 3/5/10 times top 3 Attack<br />
-Bonus: 3/5/10 times top 3 Defence<br />
-Bonus: 3/5/10 times top 3 Robber<br />

-Bonus: 3/5/10 times in a row top 10 Attack<br />
-Bonus: 3/5/10 times in a row top 10 Defence<br />
-Bonus: 3/5/10 times in a row top 10 Pop Climbers<br />
-Bonus: 3/5/10 times in a row top 10 Rank Climbers<br />
-Bonus: 3/5/10 times in a row top 10 Robber<br />



<?php
} else{ ?>
<h3>مدال های هفتۀ <?php echo $week; ?></h3><Br /><Br />
برای دادن مدال های این هفته به بازیکن ها لطفا تایید کنید --> <a href="?giveout">تایید</a><br/><font color="#FF0000">نکته: این عملیات کمی طول خواهد کشید</font>
<?php } ?></div>
<div class="clear">&nbsp;</div>

<div class="clear"></div>
</div>
<div class="contentFooter">&nbsp;</div>
</div>
<?php include("Templates/sideinfo.tpl"); ?>
<div class="clear"></div>

				</div>

<?php
include("Templates/footer.tpl");
include("Templates/header.tpl");
include("Templates/res.tpl");
?>
<script type="text/javascript"> 
	resources.production = {
'l1': <?php echo $village->getProd("wood"); ?>,'l2': <?php echo $village->getProd("clay"); ?>,'l3': <?php echo $village->getProd("iron"); ?>,'l4': <?php echo $village->getProd("crop"); ?>			};
</script>

<?php
include("Templates/vname.tpl");
include("Templates/quest.tpl");
?>
</div>
<div id="ce"></div>
</div>
</body>
</html>
<?php mysql_close(); ?>
