<?php
	$message = "This message is to inform you that"; 
	$to = "tianhaohu@gmail.com";
	$headers = "From: sales@power-unit.org"."\r\n"."Reply-To: sales@power-unit.org"."\r\n";
	$_mail = mail($to,$message,$headers);
?>