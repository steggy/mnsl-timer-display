<?php


?>
<html>
<head>
  <meta http-equiv="refresh" content="30">
<script src="jquery-latest.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	refreshshowheader();
});

function refreshshowheader(){
	$('#headpre').load('getHeader.php', function(){
		setTimeout(refreshshowheader, 300);
				           });
		    }

</script>
<style>
#header
{
width:100%;
height:20%;
font-size:32px;
background-color:blue;
color:yellow;
min-height:20%;
padding: 0;
margin: 0;
margin-top 2px;
}
#headpre
{
text-align: left;
}
body 
{ 
	margin-top: 0px;
    	margin-bottom:0px;
    	margin-right: 0px;
	margin-left: 0px;
	padding: 0px;
  	border: 0px;
}

#main
{
height:60%;
}
#main button
{
height:60px;
font-size:2.5em;
}
#bottom
{
background-color:red;
height:20%;
}

</style>
</head>
<body>
<div id="header"><pre id="headpre">
Event and time goes here
</pre></div>

<div id="main">
BUTTONS<br>
<button>PUSH THIS</button>
</div>
<div id="bottom">
<button style="heght:30px;font-size:24px;"onclick="location='http://localhost/mnsltimer.php'">RELOAD</button>
</div>
</body>
</html>
