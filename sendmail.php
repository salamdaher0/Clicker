 
      <?php
	//start building the mail string
  $msg .= "content_data = \n".$_GET["content_data"]." \n";     

	$recipient = "salamdaher@yahoo.com, charliefoxtrotdata@gmail.com";
	$subject = "DATA: Praking C";
	$mailheaders = "From:Charlie Foxtrot <salamdaher.net> \n";
	$mailheaders .= "Reply-To: ".$_POST["email"]." \n";
	//send the mail
	mail($recipient, $subject, $msg, $mailheaders);
	echo "<p>Message sent to salamdaher@yahoo.com, charliefoxtrotdata@gmail.com</p>";
//}
?>
<FORM action="clicker.php"><INPUT type=submit value="Back"><a
href="http://www.salamdaher.net/UCF/clicker.php" ></a></FORM>