<?php
	if($_GET['id'] == 'store')
		header("Location: http://store02.prostores.com/servlet/vcom3dinc/StoreFront");

	//This code is specifically for the home page banner.
	//It needs to be here because you can't set cookies after headers have been sent
	if($_GET['sign'] == 'true'){
		setcookie('signEnabled', 'true', time()+60*60*24*255);
		$_signBanner = true;
	}else if($_GET['sign'] == 'false'){
		setcookie('signEnabled', 'false', time()+60*60*24*255);
		$_signBanner = false;
	}else{
		if( isset($HTTP_COOKIE_VARS['signEnabled']) && $HTTP_COOKIE_VARS['signEnabled'] == 'true'){
			$_signBanner = true;
		}else{
			$_signBanner = false;
		}
	}
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en' xml:lang='en'>

		<head>

			<title>Salam's Portfolio</title>
			
			<link rel="icon" href="favicon.ico" type="image/x-icon" />
			<link rel="shortcut icon" href="favicon.ico" />
			<link rel="stylesheet" type="text/css" href="desktoplisting.css" />

			
			<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
			
			<link rel="stylesheet" type="text/css" href="gate.css" />
			<link rel="stylesheet" type="text/css" href="layout.css" />

			<link rel="stylesheet" type="text/css" media="print" href="print.css" />
			<link rel="alternate" type="application/rss+xml" title="" href="" />
			
			<meta name="description" content="" /> 
	
			<meta name="keywords" content="Studio, Authoring Tool, 3d avatar, 3d graphic animation, 3d animation, e-learning, mobile learning, Virtual instructor, 3d, American Sign Language, ASL, Signed English, Video creation, Assisted Learning, sign language software, deaf education, deaf literacy, iPod content, learning sign language, simulation, training, teaching sign language, sign language technology, ASL software, American Sign Language Software, Translation software, culture training, 3D characters, custom simulations, virtual agents, Research and Development, Training and Development, avatar animation, character animation, Vcommunicator, Sign Smith, Illustrated Dictionary, Reading Power, Gesture Builder, Lip-synch, Lip-sync" />
			
			<meta name="copyright" content="2012 Salam Daher" />
			<meta name="author" content="Salam Daher" />
			<meta name="MSSmartTagsPreventParsing" content="TRUE" />
			<meta name="rating" content="GENERAL" />
				
			<style type="text/css">
			@import url("ticker.css");
			</style>
			<script type="text/javascript" src="js/swfobject.js"></script>
			<script type="text/javascript">
			function Gsitesearch(curobj){
			var domainroot=curobj.domainroot[curobj.domainroot.selectedIndex].value
			curobj.q.value="site:"+domainroot+" "+curobj.qfront.value
			}
			</script>
			
			<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
			<script type="text/javascript">_uacct = "UA-1825443-1";urchinTracker();</script>


<!-- Image rotator link to CSS and JQuery prep  -->
<link href="css/img_rotator_style.css" rel="stylesheet" type="text/css" />
<script src='js/jquery-1.4.2.min.js' type="text/javascript"></script>
<script src='js/s3Slider.js' type="text/javascript"></script> 

<script type="text/javascript">
$(document).ready(function() {
   $('#s3slider').s3Slider({
      timeOut: 5000
   });
}); 
</script>



</head>

<body>
<?php //include ("header.php"); 
?>	
<?php include ("menu.php"); ?>	
<?php include ("display_content.php"); ?>

	 
<?php //include ("footer.php"); 
?>

	</body>
</html> 
