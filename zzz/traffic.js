 var today,d, h , m , s ;
  var mistake = "Mistake Right Before ";
  var myIDs = [
  "L1L2L3_enter_Q12" , "L3_enter_Q3" , "L3_enter_Q12" , 
  "L6_enter_Q4" , "L4L5_enter_Q4" , "G1_R_sink" , 
  "G2_L_sink" , "G4_L_sink" , "G5_R_sink" , 
  "R2L_change" , "L2R_change" , "T1_light" , 
  "Y1_light" , "T2_light", "P_enter_Q4", 
  "P_sink_Q4", "G3_sink","GC_sink"];
  var myCounts = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  var myTimestamps = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "",""];
	var myTimeStart = [0,0,0,0,0,0,0,0,0,0,0,0,0,0, 0, 0, 0, 0];
	var myTimeEnd = [0,0,0,0,0,0,0,0,0,0,0,0,0,0, 0, 0, 0, 0];
	var myTimeDelta = [0,0,0,0,0,0,0,0,0,0,0,0,0,0, 0, 0, 0, 0];   
	
	 

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
    myTimestamps[b] += "<BR/>(" + h + ":" + m + ":" + s + ")";
  // specify if car turned on red or on green
 
  if(b== 5) // Car G1_R according to Light T1
  {
  	if(myCounts[11]%2 == 0)
  	{
  		G1R_RED++;
			myTimestamps[b] += " on_RED";//+" total = " + G1R_RED;
  	
		}
	else
		{
		G1R_GREEN++;
  	myTimestamps[b] += " on_GREEN";//+" total = " + G1R_GREEN;
  	
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
    document.getElementById(id).innerHTML = "["+id +"] " + myTimestamps[b];
     document.getElementById("btn_"+b).innerHTML = "<b style=\"padding:0px; font-size:80px;\">"+ myCounts[b]+"</b><BR/>"+myIDs[b];
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
    
    myTimestamps[b] += "<BR/>[" + id +"] @ ("+ h + ":" + m + ":" + s + ") "+ light_status;
    
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
    
    myTimestamps[b] += "<BR/>[" + id +"] ("+ h + ":" + m + ":" + s + ") "+ change_status;
    
    document.getElementById(id).innerHTML=  myTimestamps[b];
    document.getElementById("btn_"+b).className = change_status;
     document.getElementById("btn_"+b).innerHTML = "<b style=\"padding:0px; font-size:80px;\">"+ (myCounts[b]-myCounts[b]%2)/2+"</b><BR/>"+myIDs[b];
}

function mistake_Function(){
	/*var conf = confirm("Record Data Collection Mistake?");
    if(conf == true){}*/
    	mistake += "<BR/>("+ h + ":" + m + ":" + s + ") , ";
    	document.getElementById("mistake").innerHTML=  mistake;
	
	}

function reset_Function() {
	var conf = confirm("ERASE collected data?");
    if(conf == true){
	    myCounts = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0,0,0];
      myTimestamps = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "",""];
      myTimeStart = [0,0,0,0,0,0,0,0,0,0,0,0,0,0, 0, 0,0,0];
      myTimeEnd = [0,0,0,0,0,0,0,0,0,0,0,0,0,0, 0, 0,0,0];
      myTimeDelta = [0,0,0,0,0,0,0,0,0,0,0,0,0,0, 0, 0,0,0];  
      mistake = "Mistake Right Before ";
   document.getElementById("mistake").innerHTML = "";
   
     for(var i=0;i< myIDs.length;i++){
      	document.getElementById(""+myIDs[i]).innerHTML = "";
      	}
     
    }
 }

function email_Function(subject) { 
	
  var javascriptVariable = "";
  var subjectTitle = "Charlie Foxtrot Data: Spot "+subject;
  
  for (var i=0; i < myIDs.length; i++){
  
   javascriptVariable += "<BR/><BR/>["+myIDs[i] + "]<BR/>=" + myTimestamps[i];
    }
    
    javascriptVariable += "<BR/><BR/>MISTAKES<BR/>" + mistake;
    
  var conf = confirm("Send Email?");
    if(conf == true){
  window.location.href = "sendmail.php?content_data=" + javascriptVariable + "&subject=" +subjectTitle ; 
  
  
  }
}