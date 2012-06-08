<?php
	if($btype==1){
    
    	if($type==1){
        	$name = "A felismerés sisakja";
        	$title = "+15 százalékkal több tapasztalat a hősnek.";
            $item = "1";
            $effect = "15";
		}elseif($type==2){
        	$name = "A megvilágosodás sisakja";
        	$title = "+20 százalékkal több tapasztalat a hősnek.";
            $item = "2";
            $effect = "20";
		}elseif($type==3){
        	$name = "A bölcsesség sisakja";
        	$title = "+25% százalékkal több tapasztalat a hősnek.";
            $item = "3";
            $effect = "25";
		}
        if($type==4){
        	$name = "A regeneráció sisakja";
        	$title = "+10 egészség pont naponta";
            $item = "4";
            $effect = "10";
        }elseif($type==5){
        	$name = "Az egészség sisakja";
        	$title = "15+ egészség pont naponta";
            $item = "5";
            $effect = "15";
        }elseif($type==6){
        	$name = "A gyógyulás sisakja";
        	$title = "20+ egészség pont naponta";
            $item = "6";
            $effect = "20";
        }
        if($type==7){
        	$name = "A Gladiátor sisakja";
			$title = "+100 kulturális pont naponta";
            $item = "7";
            $effect = "100";
		}elseif($type==8){
        	$name = "A szószék sisakja";
			$title = "+400 kulturális pont naponta";
            $item = "8";
            $effect = "400";
		}elseif($type==9){
        	$name = "A Konzul sisakja";
			$title = "+800 kulturális pont naponta";
            $item = "9";
            $effect = "800";
		}
        if($type==10){
        	$name = "A lovaglás sisakja";
			$title = "10%-al rövidebb kiképzési idő az istállóban az adott faulban";
            $item = "10";
            $effect = "10";
		}elseif($type==11){
        	$name = "A lovasság sisakja";
			$title = "15%-al rövidebb kiképzési idő az istállóban az adott faulban";
            $item = "11";
            $effect = "15";
		}elseif($type==12){
        	$name = "A nehézlovasság sisakja";
			$title = "20%-al rövidebb kiképzési idő az istállóban az adott faulban";
            $item = "12";
            $effect = "20";
		}
        if($type==13){
        	$name = "A Zsoldos sisakja";
			$title = "10%-al rövidebb kiképzési idő a kaszárnyában az adott faulban";
            $item = "13";
            $effect = "10";
		}elseif($type==14){
        	$name = "A Harcos sisakja";
			$title = "15%-al rövidebb kiképzési idő a kaszárnyában az adott faulban";
            $item = "14";
            $effect = "15";
		}elseif($type==15){
        	$name = "A Vezér sisakja";
			$title = "20%-al rövidebb kiképzési idő a kaszárnyában az adott faulban";
            $item = "15";
            $effect = "20";
		}
        
	}elseif($btype==2){
    
		if($type==82){
        	$name = "A Regeneráció könnyű vértje";
        	$title = "20+ egészség pont naponta";
            $item = "82";
            $effect = "20";
		}elseif($type==83){
        	$name = "A Regeneráció vértje";
        	$title = "30+ egészség pont naponta";
            $item = "83";
            $effect = "30";
		}elseif($type==84){
        	$name = "A Regeneráció nehéz páncélja";
        	$title = "40+ egészség pont naponta";
            $item = "84";
            $effect = "40";
		}
        if($type==85){
        	$name = "Könnyű pikkelypáncél ";
        	$title = "Az életerő veszteség 4 ponttal csökken +10 egészségpont naponta";
            $item = "85";
            $effect = "10";
        }elseif($type==86){
        	$name = "Pikkelypáncél";
        	$title = "Az életerő veszteség 6 ponttal csökken +15 egészségpont naponta";
            $item = "86";
            $effect = "15";
        }elseif($type==87){
        	$name = "Nehéz pikkelypáncél";
        	$title = "Az életerő veszteség 8 ponttal csökken +20 egészségpont naponta";
            $item = "87";
            $effect = "20";
        }
        if($type==88){
        	$name = "Könnyű mellvért";
			$title = "+500 harci erő a hősnek";
            $item = "88";
            $effect = "500";
		}elseif($type==89){
        	$name = "Mellvért";
			$title = "+1000 harci erő a hősnek";
            $item = "89";
            $effect = "1000";
		}elseif($type==90){
        	$name = "Nehéz mellvért";
			$title = "+1500 harci erő a hősnek";
            $item = "90";
            $effect = "1500";
		}
        if($type==91){
        	$name = "Könnyű tagolt páncél";
			$title = "Az életerő veszteség 3 ponttal csökken +250 harci erő a hősnek";
            $item = "91";
            $effect = "3";
		}elseif($type==92){
        	$name = "Tagolt páncél";
			$title = "Az életerő veszteség 4 ponttal csökken +500 harci erő a hősnek";
            $item = "92";
            $effect = "4";
		}elseif($type==93){
        	$name = "Nehéz tagolt páncél";
			$title = "Az életerő veszteség 5 ponttal csökken +750 harci erő a hősnek";
            $item = "93";
            $effect = "5";
		}
        
	}elseif($btype==3){
    
		if($type==61){
        	$name = "Kis térkép";
        	$title = "30%-al gyorsabb hazatérés a hősnek és csapatának";
            $item = "61";
            $effect = "30";
		}elseif($type==62){
        	$name = "Térkép";
        	$title = "40%-al gyorsabb hazatérés a hősnek és csapatának";
            $item = "62";
            $effect = "40";
		}elseif($type==63){
        	$name = "Nagy térkép";
        	$title = "50%-al gyorsabb hazatérés a hősnek és csapatának";
            $item = "63";
            $effect = "50";
		}
        if($type==64){
        	$name = "A Nép kis zászlaja";
        	$title = "30%-al gyorsabb csapatmozgás saját falvak között";
            $item = "64";
            $effect = "30";
		}elseif($type==65){
        	$name = "A Nép zászlaja";
        	$title = "40%-al gyorsabb csapatmozgás saját falvak között";
            $item = "65";
            $effect = "40";
		}elseif($type==66){
        	$name = "A Nép nagy lobogója";
        	$title = "50%-al gyorsabb csapatmozgás saját falvak között";
            $item = "66";
            $effect = "50";
		}
        if($type==67){
        	$name = "A Szövetség kis zászlaja";
			$title = "15%-al gyorsabb csapatmozgás klántagok között.";
            $item = "67";
            $effect = "15";
		}elseif($type==68){
        	$name = "A Szövetség zászlaja";
			$title = "20%-al gyorsabb csapatmozgás klántagok között.";
            $item = "68";
            $effect = "20";
		}elseif($type==69){
        	$name = "A Szövetség nagy lobogója";
			$title = "25%-al gyorsabb csapatmozgás klántagok között.";
            $item = "69";
            $effect = "25";
		}
        if($type==73){
        	$name = "A tolvaj batyuja";
			$title = "%10+ fosztogató bónusz a rejtekhellyel szemben";
            $item = "73";
            $effect = "10";
		}elseif($type==74){
        	$name = "A tolvaj zsákja";
			$title = "%15+ fosztogató bónusz a rejtekhellyel szemben";
            $item = "74";
            $effect = "15";
		}elseif($type==75){
        	$name = "A tolvaj nagy zsákja";
			$title = "%20+ fosztogató bónusz a rejtekhellyel szemben";
            $item = "75";
            $effect = "20";
		}
        if($type==76){
        	$name = "Kis harci pajzs";
        	$title = "+500 harci erő a hősnek";
            $item = "76";
            $effect = "500";
        }elseif($type==77){
        	$name = "Harci pajzs";
        	$title = "+1000 harci erő a hősnek";
            $item = "77";
            $effect = "1000";
        }elseif($type==78){
        	$name = "Nagy harci pajzs";
        	$title = "+1500 harci erő a hősnek";
            $item = "78";
            $effect = "1500";
        }
        if($type==79){
        	$name = "A Natar kis harci tülke";
			$title = "+20% harci erő a Natar ellen támadás esetén";
            $item = "79";
            $effect = "20";
		}elseif($type==80){
        	$name = "A Natar kis harci tülke";
			$title = "+25% harci erő a Natar ellen támadás esetén";
            $item = "80";
            $effect = "25";
		}elseif($type==81){
        	$name = "A Natar nagy harci kürtje";
			$title = "+30% harci erő a Natar ellen támadás esetén";
            $item = "81";
            $effect = "30";
		}
        
	}elseif($btype==4){
    
		if($type==16){
        	$name = "A Légiós rövid kardja";
        	$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Légiós: 3+ támadóérték és + 3+ védelmi érték";
            $item = "16";
            $effect = "500";
		}elseif($type==17){
        	$name = "A Légiós kardja";
        	$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Légiós: 4+ támadóérték és + 4+ védelmi érték";
            $item = "17";
            $effect = "1000";
		}elseif($type==18){
        	$name = "A Légiós hosszú kardja";
        	$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Légiós: 5+ támadóérték és + 5+ védelmi érték";
            $item = "18";
            $effect = "1500";
		}
        if($type==19){
        	$name = "Testőrség rövid kardja";
        	$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Testőrség: 3+ támadóérték és + 3+ védelmi érték";
            $item = "19";
            $effect = "500";
        }elseif($type==20){
        	$name = "Testőrség kardja";
        	$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Testőrség: 4+ támadóérték és + 4+ védelmi érték";
            $item = "20";
            $effect = "1000";
        }elseif($type==21){
        	$name = "Testőrség hosszú kardja";
        	$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Testőrség: 5+ támadóérték és + 5+ védelmi érték";
            $item = "21";
            $effect = "1500";
        }
        if($type==22){
        	$name = "Az Birodalmi rövid kardja";
			$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Birodalmi: 3+ támadóérték és + 3+ védelmi érték";
            $item = "22";
            $effect = "500";
		}elseif($type==23){
        	$name = "Az Birodalmi kardja";
			$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Birodalmi: 4+ támadóérték és + 4+ védelmi érték";
            $item = "23";
            $effect = "1000";
		}elseif($type==24){
        	$name = "A Birodalmi hosszú kardja";
			$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Birodalmi: 5+ támadóérték és + 5+ védelmi érték";
            $item = "24";
            $effect = "1500";
		}
        if($type==25){
        	$name = "Az Imperatoris rövid kardja";
			$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Equites Imperatoris: 9+ támadóérték és + 9+ védelmi érték";
            $item = "25";
            $effect = "500";
		}elseif($type==26){
        	$name = "Az Imperatoris kardja";
			$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Equites Imperatoris: 12+ támadóérték és + 12+ védelmi érték";
            $item = "26";
            $effect = "1000";
		}elseif($type==27){
        	$name = "Az Imperatoris hosszú kardja";
			$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Equites Imperatoris: 15+ támadóérték és + 15+ védelmi érték";
            $item = "27";
            $effect = "1500";
		}
        if($type==28){
        	$name = "A Caesaris könnyű lándzsája";
        	$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Equites Caesaris: 12+ támadóérték és + 12+ védelmi érték";
            $item = "28";
            $effect = "500";
        }elseif($type==29){
        	$name = "A Caesaris lándzsája";
        	$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Equites Caesaris: 16+ támadóérték és + 16+ védelmi érték";
            $item = "29";
            $effect = "1000";
        }elseif($type==30){
        	$name = "A Caesaris nehéz lándzsája";
        	$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Equites Caesaris: 20+ támadóérték és + 20+ védelmi érték";
            $item = "30";
            $effect = "1500";
        }
        if($type==31){
        	$name = "A Phalanx dárdája";
			$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Phalanx: 3+ támadóérték és + 3+ védelmi érték";
            $item = "31";
            $effect = "500";
		}elseif($type==32){
        	$name = "A Phalanx kopjája";
			$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Phalanx: 4+ támadóérték és + 4+ védelmi érték";
            $item = "32";
            $effect = "1000";
		}elseif($type==33){
        	$name = "A Phalanx lándzsája";
			$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Phalanx: 5+ támadóérték és + 5+ védelmi érték";
            $item = "33";
            $effect = "1500";
		}
        if($type==34){
        	$name = "A Kardos rövid kardja";
        	$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Kardos: 3+ támadóérték és + 3+ védelmi érték";
            $item = "34";
            $effect = "500";
        }elseif($type==35){
        	$name = "A Kardos kardja";
        	$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Kardos: 4+ támadóérték és + 4+ védelmi érték";
            $item = "35";
            $effect = "1000";
        }elseif($type==36){
        	$name = "A Kardos hosszú kardja";
        	$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Kardos: 5+ támadóérték és + 5+ védelmi érték";
            $item = "36";
            $effect = "1500";
        }
        if($type==37){
        	$name = "A Theutat rövid íja";
			$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Theutates Villám: 6+ támadóérték és + 6+ védelmi érték";
            $item = "37";
            $effect = "500";
		}elseif($type==38){
        	$name = "A Theutat íja";
			$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Theutates Villám: 8+ támadóérték és + 8+ védelmi érték";
            $item = "38";
            $effect = "1000";
		}elseif($type==39){
        	$name = "A Theutat vadász-íja";
			$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Theutates Villám: 10+ támadóérték és + 10+ védelmi érték";
            $item = "39";
            $effect = "1500";
		}
        if($type==40){
        	$name = "A Druida vándorbotja";
			$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Druidának: 6+ támadóérték és + 6+ védelmi érték";
            $item = "40";
            $effect = "500";
		}elseif($type==41){
        	$name = "A Druida botja";
			$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Druidának: 8+ támadóérték és + 8+ védelmi érték";
            $item = "41";
            $effect = "1000";
		}elseif($type==42){
        	$name = "A Druida harci botja";
			$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Druidának: 10+ támadóérték és + 10+ védelmi érték";
            $item = "42";
            $effect = "1500";
		}
        if($type==43){
        	$name = "A Haeduan könnyű lándzsája";
        	$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Haeduan: 9+ támadóérték és + 9+ védelmi érték";
            $item = "43";
            $effect = "500";
        }elseif($type==44){
        	$name = "A Haeduan lándzsája";
        	$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Haeduan: 12+ támadóérték és + 12+ védelmi érték";
            $item = "44";
            $effect = "1000";
        }elseif($type==45){
        	$name = "A Haeduan nehéz lándzsája";
        	$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Haeduan: 15+ támadóérték és + 15+ védelmi érték";
            $item = "45";
            $effect = "1500";
        }
        if($type==46){
        	$name = "A Buzogányos bunkója";
			$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Buzogányos: 3+ támadóérték és + 3+ védelmi érték";
            $item = "46";
            $effect = "500";
		}elseif($type==47){
        	$name = "A Buzogányos harci bunkója";
			$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Buzogányos: 4+ támadóérték és + 4+ védelmi érték";
            $item = "47";
            $effect = "1000";
		}elseif($type==48){
        	$name = "A Buzogányos szöges buzogánya";
			$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Buzogányos: 5+ támadóérték és + 5+ védelmi érték";
            $item = "48";
            $effect = "1500";
		}
        if($type==49){
        	$name = "A Lándzsás dárdája";
        	$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Lándzsás: 3+ támadóérték és + 3+ védelmi érték";
            $item = "49";
            $effect = "500";
        }elseif($type==50){
        	$name = "A Lándzsás kopjája";
        	$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Lándzsás: 4+ támadóérték és + 4+ védelmi érték";
            $item = "50";
            $effect = "1000";
        }elseif($type==51){
        	$name = "A Lándzsás lándzsája";
        	$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Lándzsás: 5+ támadóérték és + 5+ védelmi érték";
            $item = "51";
            $effect = "1500";
        }
        if($type==52){
        	$name = "A Csatabárdos baltája";
			$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Csatabárdos: 3+ támadóérték és + 3+ védelmi érték";
            $item = "52";
            $effect = "500";
		}elseif($type==53){
        	$name = "A Csatabárdos fejszéje";
			$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Csatabárdos: 4+ támadóérték és + 4+ védelmi érték";
            $item = "53";
            $effect = "1000";
		}elseif($type==54){
        	$name = "A Csatabárdos harci bárdja";
			$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Csatabárdos: 5+ támadóérték és + 5+ védelmi érték";
            $item = "54";
            $effect = "1500";
		}
        if($type==55){
        	$name = "A Paladin könnyű kalapácsa";
			$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Paladin: 6+ támadóérték és + 6+ védelmi érték";
            $item = "55";
		}elseif($type==56){
        	$name = "A Paladin kalapácsa";
			$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Paladin: 8+ támadóérték és + 8+ védelmi érték";
            $item = "56";
		}elseif($type==57){
        	$name = "A Paladin nehéz kalapácsa";
			$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Paladin: 10+ támadóérték és + 10+ védelmi érték";
            $item = "57";
		}
        if($type==58){
        	$name = "A Teuton lovag rövid kardja";
        	$title = "500+ harci erő a hősnek&lt;br /&gt;minden egyes Teuton lovag: 9+ támadóérték és + 9+ védelmi érték";
            $item = "58";
            $effect = "500";
        }elseif($type==59){
        	$name = "A Teuton lovag kardja";
        	$title = "1000+ harci erő a hősnek&lt;br /&gt;minden egyes Teuton lovag: 12+ támadóérték és + 12+ védelmi érték";
            $item = "59";
            $effect = "1000";
        }elseif($type==60){
        	$name = "A Teuton lovag hosszú kardja";
        	$title = "1500+ harci erő a hősnek&lt;br /&gt;minden egyes Teuton lovag: 15+ támadóérték és + 15+ védelmi érték";
            $item = "60";
            $effect = "1500";
        }
        
	}elseif($btype==5){
    
		if($type==94){
        	$name = "A Regeneráció cipője";
        	$title = "10+ egészség pont naponta";
            $item = "94";
            $effect = "10";
		}elseif($type==95){
        	$name = "Az Egészség cipője";
        	$title = "15+ egészség pont naponta";
            $item = "95";
            $effect = "15";
		}elseif($type==96){
        	$name = "A Gyógyulás cipője";
        	$title = "20+ egészség pont naponta";
            $item = "96";
            $effect = "20";
		}
        if($type==97){
        	$name = "A Zsoldos cipője";
        	$title = "+25% sebességnövekedés a sereg alapértékéhez képest, ahol a távolság  > 20 mező";
            $item = "97";
            $effect = "25";
        }elseif($type==98){
        	$name = "A Katona bakancsa";
        	$title = "+50% sebességnövekedés a sereg alapértékéhez képest, ahol a távolság  > 20 mező";
            $item = "98";
            $effect = "30";
        }elseif($type==99){
        	$name = "A Vezér csizmája";
        	$title = "+75% sebességnövekedés a sereg alapértékéhez képest, ahol a távolság  > 20 mező";
            $item = "99";
            $effect = "35";
        }
        if($type==100){
        	$name = "Kis sarkantyú";
			$title = "+3 mező óránként a hősnek";
            $item = "100";
            $effect = "3";
		}elseif($type==101){
        	$name = "Sarkantyú";
			$title = "+4 mező óránként a hősnek";
            $item = "101";
            $effect = "4";
		}elseif($type==102){
        	$name = "Tüskés sarkantyú";
			$title = "+5 mező óránként a hősnek";
            $item = "102";
            $effect = "5";
		}
        
	}elseif($btype==6){
    	if($type==103){
        	$name = "Hátasló";
			$title = "A hős sebessége 14 mezőre növekszik óránként";
            $item = "103";
            $effect = "14";
		}elseif($type==104){
        	$name = "Nemes mén";
			$title = "A hős sebessége 17 mezőre növekszik óránként";
            $item = "104";
            $effect = "17";
		}elseif($type==105){
        	$name = "Harci paripa";
			$title = "A hős sebessége 20 mezőre növekszik óránként";
            $item = "105";
            $effect = "20";
		}
        
	}elseif($btype==7){
    	$name = "Kis sebkötöző";
		$title = "A 25s kötszerek maximálisan az elesett sereg 25 százalékát képes meggyógyítani. Csak annyi egység gyógyítható meg, ahány darabos a kötszer. A gyógyulás ideje a kiinduló faluba való visszaérkezés időtartama, legalább 24 óra.&lt;br /&gt;A tárgy halmozható..&lt;br /&gt;A tárgyat fel kell venni harc előtt, hogy annak hatása érvényesüljön. ";
		$item = "112";
	}elseif($btype==8){
    	$name = "Sebkötöző";
		$title = "A 33s kötszerek maximálisan az elesett sereg 33 százalékát képes meggyógyítani. Csak annyi egység gyógyítható meg, ahány darabos a kötszer. A gyógyulás ideje a kiinduló faluba való visszaérkezés időtartama, legalább 24 óra.&lt;br /&gt;A tárgy halmozható.&lt;br /&gt;A tárgyat fel kell venni harc előtt, hogy annak hatása érvényesüljön.";
		$item = "113";
	}elseif($btype==9){
    	$name = "Ketrec";
		$title = "Az oázisokban talált állatok ezzel megszelidíthetőek és a faluba vihetőek. Ott aztán a falu védelmére kelnek. Az elfogott állatok nem fogyasztanak búzát. &lt;br /&gt;A tárgy halmozható.&lt;br /&gt;Amennyiben ez a tárgy a hősöd felszereléséhez tartozik, egy szabad oázisban nem kerül harcra a sor.";
		$item = "114";
	}elseif($btype==10){
    	$name = "Papírtekercs";
		$title = "Felvételkor azonnal hat és a hősnek 10 tapasztalati pontot ad tekercsenként &lt;br /&gt;Felvételkor aktiválódik.&lt;br /&gt;A tárgy halmozható.";
		$item = "107";
	}elseif($btype==11){
    	$name = "Gyógykenőcs";
		$title = "Helyreállítja a hős egészségét. A felhasznált kenőcsök száma határozza meg a helyreállítás mértékét (max. 100%). &lt;br /&gt;Felvételkor aktiválódik. &lt;br /&gt;A tárgy halmozható.";
		$item = "106";
	}elseif($btype==12){
    	$name = "Vizesvödör";
		$title = "Feléleszti a hőst azonnal és ingyenesen. Amikor a hős él, nem rakható a hős táskájába a vizesvödör. A vödör felhasználás után eltűnik.&lt;br /&gt;Felvételkor aktiválódik.";
        $item = "108";
	}elseif($btype==13){
    	$name = "A Bölcsességek könyve";
		$title = "Az összes hős tulajdonságot visszaállítja és így lehetőséged nyílik azokat újra elosztani.&lt;br /&gt;Felvételkor aktiválódik.";
        $item = "110";
	}elseif($btype==14){
    	$name = "Törvénytáblák";
		$title = "Azonnali hatállyal megnöveli a hős otthonául szolgáló falu hűségét 1 százalékkal táblánként, maximum 125 százalékkal. &lt;br /&gt;Felvételkor aktiválódik.&lt;br /&gt;A tárgy halmozható.";
		$item = "109";
	}elseif($btype==15){
    	$name = "Műalkotás";
		$title = "Ha a műalkotást felhasználod, az összes falud kultúrpont termelése alapján kultúrpontokat kapsz (+3 kultúrpont),de csak maximálisan 5000 KP (3x szerveren 2500) műalkotásonként.&lt;br /&gt;Felvételkor aktiválódik.&lt;br /&gt;A tárgy halmozható.";
        $item = "111";
	}

?>