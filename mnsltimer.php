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
font-size:42px;
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
height:70%;
}
#main button
{
height:60px;
font-size:2.5em;
}
#bottom
{
background-color:red;
height:10%;
}
.bigbut
{
height:60px;
font-size:2.5em;
}
</style>
</head>
<body>
<div id="header"><pre id="headpre">
Event and time goes here
</pre></div>

<div id="main">
A list of shooters 
</div>
<div id="bottom">
<button class="bigbut" onclick="location='http://localhost/mnsltimer.php'">RELOAD</button>
</div>
</body>
</html>
