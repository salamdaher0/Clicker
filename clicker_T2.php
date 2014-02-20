<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<script language="javascript" type="text/javascript" src="traffic.js"></script>

</head>

<body onload="startTime()">
<div id="txt"></div>
<div id="t1_group">
	
<button id= "btn_7" class= "button_simple" onclick="oneClick_Function(event, 7)">G4_L_sink</button>
<button id= "btn_13" class= "button_light" onclick="light_Function(event, 13)">T2_light</button>
<button id= "btn_8" class= "button_simple" onclick="oneClick_Function(event, 8)">G5_R_sink</button>



</div>

<div id="common_group">
<button id= "btn_mistake" class= "button_mistake" onclick="mistake_Function()">.</button>

<button id= "btn_email" class= "button_email" onclick="email_Function('T2')">.</button>
</div>

<p id="mistake"></p>   
 <p id="G4_L_sink"></p>
<p id="T2_light"></p>
<p id="G5_R_sink"></p>
                     
<p id="GC_sink"></p>
<p id="G3_sink"></p>    
<p id="L1L2_enter_Q12"></p>
<p id="L2R_change"></p>
<p id="R2L_change"></p>
<p id="L3_enter_Q3"></p>
<p id="Y1_light"></p>
<p id="L3_enter_Q12"></p>
<p id="L6_enter_Q4"></p>
<p id="L4L5_enter_Q4"></p> 
<p id="G1_R_sink"></p>
<p id="G2_L_sink"></p>
<p id="T1_light"></p>
<p id="P_enter_Q4"></p>
<p id="P_sink_Q4"></p>


</body>
</html>
