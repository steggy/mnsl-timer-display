<?php


?>
<html>
<head>
  <meta http-equiv="refresh" content="30">
<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	refreshshowheader();
});
// A function to reload the text file from the timer code
function refreshshowheader(){
	$('#headpre').load('getHeader.php', function(){
		setTimeout(refreshshowheader, 300);
				           });
		    }

function displayMenu(){
	$('#main').load('displayMenu.php');
}
</script>
<link rel="stylesheet" href="mnsltimer.css">
</head>
<body>
<div id="header"><pre id="headpre">
Nothing read - waiting on timer
</pre></div>

<div id="main">
A list of shooters 
</div>
<div id="bottom">
<!-- below for testing - remove for production -->
<button title="For test - remove for production" class="bigbut" onclick="location='<?=$_SERVER['REQUEST_URI'];?>'">RELOAD</button>
<button class="bigbut" onclick="displayMenu()">MENU</button>
</div>
</body>
</html>
