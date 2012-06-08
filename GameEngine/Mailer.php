<?php

#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       Mailer.php                                                  ##
##  Developed by:  Dixie                                                       ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2011. All rights reserved.                ##
##                                                                             ##
#################################################################################

class Mailer {
	
	function sendActivate($email,$username,$pass,$act) {
		
	$subject = "Üdvözöljük a  ".SERVER_NAME." világban";
	$message = "Szia ".$username."

Köszönjük a regisztrációját

----------------------------
Név: ".$username."
Jelszó: ".$pass."
Aktivációs kód: ".$act."
----------------------------

Kattintson ide, hogy aktiválja az accountját:
".HOMEPAGE."activate.php?code=".$act."

Köszönjük, ".SERVER_NAME;
				
	$headers = "Feladó: ".ADMIN_EMAIL."\n";
		
	mail($email, $subject, $message, $headers);
	}
	
	
	function sendPassword($email, $npw, $act, $username) {
		
	$subject = "Elfelejtett jelszó";
	$message = "Szia ".$username."

Ezt az email-t azért kaptad, mert új jelszót kértél!
Ha te kértél új jelszót:

----------------------------
Név: ".$username."
Jelszó: ".$npw."
----------------------------

Az új jelszót a linkre kattintás után kapod meg:
".HOMEPAGE."password.php?user=".$username."&npw=".$npw."&code=".$act."

Köszönettel: ".SERVER_NAME;
				
	$headers = "From: ".ADMIN_EMAIL."\n";
		
	mail($email, $subject, $message, $headers);
	}
	
};
$mailer = new Mailer;
?>