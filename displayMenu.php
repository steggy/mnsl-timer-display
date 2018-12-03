<?php
if (isset($_POST["what"])) {
	sendcmd($_POST["what"]);
	
}

function sendcmd($cmd)
{
        // where is the socket server?
        $host="127.0.0.1";
        $port = 9000;
        //$port = 3500;
     
        // open a client connection
        $fp = fsockopen ($host, $port, $errno, $errstr);
            $result = "Error: could not open socket connection";
        if (!$fp)
        {   
        $result = "Error: could not open socket connection";
        $result .= "Check that rgbledsck.php is running";
        }   
        else
        {   
        // write the user string to the socket
        fputs ($fp, $cmd);
        // get the result
        $result = fread($fp, 100000);
        // close the connection
        //fputs ($fp, "exit");
        fclose ($fp);
     
        // trim the result and remove the starting ?
        //$result = trim($result);
        //$result = substr($result, 2);
        // echo $result ."\n";

        // now print it to the browser
        /*} 
        ?>
        Server said: <b><? echo $result; ?></b>
        <?*/
        }   
}

?>
<script src="jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">

//For Ajax call
            function callSocket(el){ 
                     //var shootername = document.getElementById("tag").value;
                 //alert('This is vv: ' + shootername);
                $.ajax({
                    //type: "GET",
                    type: "POST",
                    url: "displayMenu.php",
                    //data: "paper="+shootername,
                    data: "what="+ el,
                    success:function(data){
                        //alert('This was sent back: ' + data);
                    }
                    });
                }

            function callSocketII(el){ 
		$.get('socketsend.php ' + el)                                     
}
</script>


<div>
<br>
<button class="selectbut" onclick="callSocket('test')">TEST</button>
<br>
<br>
<button class="selectbut"  onclick="callSocket('TYRO')">TYRO</button>
<br>
<br>
<button class="selectbut"  onclick="callSocket('PPC')">PPC</button>
<br>
<br>
<button class="selectbut"  onclick="location='mnsltimer.php'">BACK</button>
</div>
