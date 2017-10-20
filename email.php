
<?php

	for ($i=0; $i < 5; $i++) {

  //$to = "mikael.paavilainen@elev.it-gymnasiet.se";
  $to = "tobbetooth1221@gmail.com";
  //$to = "bertilssonfoto@gmail.com";
 //$to = ""
  $subject = "My subject";
  $txt = "Work >:|";
  $headers = "From: thundrpuffinnoreplay@gmail.com" . "\r\n" .
  "CC: thundrpuffinnoreplay@gmail.com";
  mail($to,$subject,$txt,$headers);
	# code...
}
?>
