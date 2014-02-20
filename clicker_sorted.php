<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="style.css">
<script>
  var today,d, h , m , s ;
  var mistake = "Mistake Right Before ";
  var myIDs = ["L1L2_enter_Q12" , "L3_enter_Q3" , "L3_enter_Q12" , "L6_enter_Q4" , "L4L5_enter_Q4" , "G1_R_sink" , "G2_L_sink" , "G4_L_sink" , "G5_R_sink" , "R2L_change" , "L2R_change" , "T1_light" , "Y1_light" , "T2_light"];
  var myCounts = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
//  var myTimestamps = ["L1L2_enter_Q12_TIMESTAMP" , "L3_enter_Q3_TIMESTAMP" , "L3_enter_Q12_TIMESTAMP" , "L6_enter_Q4_TIMESTAMP" , "L4L5_enter_Q4_TIMESTAMP" , "G1_R_sink_TIMESTAMP" , "G2_L_sink_TIMESTAMP" , "G4_L_sink_TIMESTAMP" , "G5_R_sink_TIMESTAMP" , "R2L_change_TIMESTAMP" , "L2R_change_TIMESTAMP" , "T1_light_TIMESTAMP" , "Y1_light_TIMESTAMP" , "T2_light_TIMESTAMP"];
  var myTimestamps = ["", "", "", "", "", "", "", "", "", "", "", "", "", ""];
	var myTimeStart = [0,0,0,0,0,0,0,0,0,0,0,0,0,0];
	var myTimeEnd = [0,0,0,0,0,0,0,0,0,0,0,0,0,0];
	var myTimeDelta = [0,0,0,0,0,0,0,0,0,0,0,0,0,0];   
	
	 

function startTime()
{
today=new Date();
//d = today.getDay();
 h=today.getHours();
 m=today.getMinutes();
 s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML="current time is " + h+":"+m+":"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}    
   
// button 5, T1 button 11    
var G1R_RED = 0;
var G1R_GREEN = 0;
//button 8, T2 button 13
var G5R_RED = 0;
var G5R_GREEN = 0;

function oneClick_Function(e, b)
{
    myCounts[b]++;
    myTimestamps[b] += "(" + h + ":" + m + ":" + s + ")";
  // specify if car turned on red or on green
 
  if(b== 5) // Car G1_R according to Light T1
  {
  	if(myCounts[11]%2 == 0)
  	{
  		G1R_RED++;
			myTimestamps[b] += " on_RED total = " + G1R_RED;
  	
		}
	else
		{
		G1R_GREEN++;
  	myTimestamps[b] += " on_GREEN total = " + G1R_GREEN;
  	
  	}
  	
  }
  
  
    if(b== 8) // Car G5_R according to Light T2
  {
  	if(myCounts[13]%2 == 0)
  	{
  		G5R_RED++;
			myTimestamps[b] += " on_RED total = " + G5R_RED;
  	
		}
	else
		{
		G5R_GREEN++;
  	myTimestamps[b] += " on_GREEN total = " + G5R_GREEN;
  	
  	}
  	
  }
  
    myTimestamps[b] += " , ";
    var id = "" + myIDs[b];
    document.getElementById(id).innerHTML = "__["+id +"] = "+ myCounts[b] + " : TIMESTAMPS =" + myTimestamps[b];
}


function light_Function(e, b)
{
    var greenLightStart = "GreenLightStart";
    var greenLightEnd = "GreenLightEnd";
    var light_status = ""; // 1 is green, 0 is red
    
    var time_delta = 0;
    var id = "" + myIDs[b];
   // myTimestamps[b] += "("+ h + ":" + m + ":" + s + ") , ";
    
    // light counter
   	myCounts[b]++;
   	
   	if (myCounts[b]%2 == 0)
    {	
    	light_status = "RED" ;
    	myTimeStart[b] = h*3600 + m*60 + s ;
    }
    else
    {
    		light_status = "GREEN";
    		myTimeEnd[b] = h*3600 + m*60 + s ;
    }
    myTimeDelta[b] = myTimeStart[b] - myTimeEnd[b];
    
    myTimestamps[b] += "_____Clicked [" + id +"] @ ("+ h + ":" + m + ":" + s + ") for " + myCounts[b]+" times: LightStatus = "+ light_status + " for " +myTimeDelta[b] +" seconds." ;
    
    document.getElementById(id).innerHTML=  myTimestamps[b];
    document.getElementById("btn_"+b).className = light_status;
}



function changeLane_Function(e, b)
{
    var changeLaneStart = "changeLaneStart";
    var changeLaneEnd = "changeLaneEnd";
    var change_status = ""; // 1 is start, 0 is end
    
    var time_delta = 0;
    var id = "" + myIDs[b];
   
   	myCounts[b]++;
   	
   	if (myCounts[b]%2 == 0)
    {	
    	change_status = "END" ;
    	myTimeStart[b] = h*3600 + m*60 + s ;
    }
    else
    {
    		change_status = "START";
    		myTimeEnd[b] = h*3600 + m*60 + s ;
    }
    myTimeDelta[b] = myTimeStart[b] - myTimeEnd[b];
    
    myTimestamps[b] += "_____Clicked [" + id +"] @ ("+ h + ":" + m + ":" + s + ") for " + myCounts[b]+" times: ChangeLaneStatus = "+ change_status + " for " +myTimeDelta[b] +" seconds." ;
    
    document.getElementById(id).innerHTML=  myTimestamps[b];
    document.getElementById("btn_"+b).className = change_status;
}

function mistake_Function(){
	var conf = confirm("Record Data Collection Mistake?");
    if(conf == true){
    	mistake += "("+ h + ":" + m + ":" + s + ") , ";
    	document.getElementById("mistake").innerHTML=  mistake;
	}
	}

function reset_Function() {
	var conf = confirm("ERASE collected data?");
    if(conf == true){
	    myCounts = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0];
      myTimestamps = ["", "", "", "", "", "", "", "", "", "", "", "", "", ""];
      myTimeStart = [0,0,0,0,0,0,0,0,0,0,0,0,0,0];
      myTimeEnd = [0,0,0,0,0,0,0,0,0,0,0,0,0,0];
      myTimeDelta = [0,0,0,0,0,0,0,0,0,0,0,0,0,0];  
     mistake = "Mistake Right Before ";
      document.getElementById("mistake").innerHTML = "";
      for (var i=0; i < myIDs.length; i++){
      	document.getElementById(myIDs[i]).innerHTML = "";
      }
    }
 }

function email_Function() { 
	
  var javascriptVariable = "";
  
  for (var i=0; i < myIDs.length; i++){
   javascriptVariable += "_____"+myIDs[i] + " = " + myCounts[i] + ": TIMESTAMPS =" + myTimestamps[i];
    }
    
    javascriptVariable += " MISTAKES = " + mistake;
    
  var conf = confirm("Send Email?");
    if(conf == true){
  window.location.href = "sendmail.php?content_data=" + javascriptVariable; 
  }
}

</script>
</head>

<body onload="startTime()">
<div id="txt"></div>

<button id= "btn_1" class= "button_simple" onclick="oneClick_Function(event, 1)">L3_enter_Q3</button>
<button id= "btn_12" class= "button_light" onclick="light_Function(event, 12)">Y1_light</button>
<button id= "btn_2" class= "button_simple" onclick="oneClick_Function(event, 2)">L3_enter_Q12</button>
<button id= "btn_0" class= "button_simple" onclick="oneClick_Function(event, 0)">L1L2_enter_Q12</button>

<button id= "btn_10" class= "button_changeL2R" onclick="changeLane_Function(event, 10)">.</button>
<button id= "btn_9" class= "button_changeR2L" onclick="changeLane_Function(event, 9)">.</button>

<button id= "btn_6" class= "button_simple" onclick="oneClick_Function(event, 6)">G2_L_sink</button>
<button id= "btn_11" class= "button_light" onclick="light_Function(event, 11)">T1_light</button>
<button id= "btn_5" class= "button_simple" onclick="oneClick_Function(event, 5)">G1_R_sink</button>


<button id= "btn_3" class= "button_simple" onclick="oneClick_Function(event, 3)">L6_enter_Q4</button>
<button id= "btn_4" class= "button_simple" onclick="oneClick_Function(event, 4)">L4L5_enter_Q4</button>

<button id= "btn_7" class= "button_simple" onclick="oneClick_Function(event, 7)">G4_L_sink</button>
<button id= "btn_13" class= "button_light" onclick="light_Function(event, 13)">T2_light</button>
<button id= "btn_8" class= "button_simple" onclick="oneClick_Function(event, 8)">G5_R_sink</button>







<button id= "btn_14" class= "button_mistake" onclick="mistake_Function()">.</button>
<button id= "btn_15" class= "button_clear" onclick="reset_Function()">.</button>
<button id= "btn_16" class= "button_email" onclick="email_Function()">.</button>

<p id="L1L2_enter_Q12"></p>
<p id="L3_enter_Q3"></p>
<p id="L3_enter_Q12"></p>
<p id="L6_enter_Q4"></p>
<p id="L4L5_enter_Q4"></p>
<p id="G1_R_sink"></p>
<p id="G2_L_sink"></p>
<p id="G4_L_sink"></p>
<p id="G5_R_sink"></p>
<p id="R2L_change"></p>
<p id="L2R_change"></p>
<p id="T1_light"></p>
<p id="Y1_light"></p>
<p id="T2_light"></p>
<p id="mistake"></p>
                         


</body>
</html>
