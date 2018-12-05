<?php
require_once 'set.php' ;
//Remove 4 bottom lines before launch - Steggy
ini_set('display_errors', 1); 
ini_set('log_errors', 1); 
ini_set('error_log', dirname(__FILE__) . '/itrequest/error_log.txt'); 
error_reporting(E_ALL);

?>
<style>
.shooterlist
{
	font-size:2.3em;
}
</style>
<?
$query = "select wdate,pos,event,event.name as name from tonight,event where cs = 2 and event=event.id and wdate=CURDATE() order by tonight.id desc limit 1;";
$relay = QueryIntoArray($query);
if(!empty($relay))
{
	?><span style="font-size:2em;">RELAY (<?=$relay[0]['pos'] .") EVENT " .strtoupper($relay[0]['name']);?></span><?
	$query = "select name from registration where event = " .$relay[0]['event'] ." and pos = " .$relay[0]['pos'] ." and wdate ='" .$relay[0]['wdate'] ."'";
	$shooters = QueryIntoArray($query) or die();
	if(!empty($shooters))
	{
		?><table>
			<tr><td class="shooterlist" colspan=3 align="center"><?=sizeof($shooters);?> SHOOTERS</td><?
		for($i=0;$i < sizeof($shooters); $i++)
		{
			$bothname=explode(' ',$shooters[$i]['name']);
			$qname = QueryIntoArray("select staff from shooters where fname ='" .$bothname[0] ."' and lname = '" .$bothname[1] ."'");
			if(!empty($qname))
			{
				if($qname[0]['staff'] == 1)
				{
					$mycolor="red";
				}else{
					$mycolor="black";
				}
			}else{
				$mycolor="black";
			}
			?> <tr class="shooterlist" style="color:<?=$mycolor;?>;"><td><?=strtoupper($shooters[$i]['name']);?></td></tr><?
		}
		?></table><?
	}
}else{
	?><span style="font-size:2em;">NO RELAYS STARTED</span><?
}
?>

<?
//******************************************************
function QueryIntoArray($query)
{
//require_once 'set.<?' ;

$username = $GLOBALS['dbusername'];
$password = $GLOBALS['dbpassword'];
$database = $GLOBALS['database'];
$host = $GLOBALS['dbhost'];
$itemrows = array();

$db = new PDO("mysql:host=$host;port=3306;dbname=$database",$username,$password);
$stmt = $db->prepare($query);

$stmt->execute();

while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
        $itemrows[] = $res;

}
  $db=null;
    return $itemrows;
}
//******************************************************
?>

