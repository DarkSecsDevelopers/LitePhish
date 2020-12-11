<?php
//Just for fun 
function tease()
{
	if(isset($_SERVER['HTTP_REFERER']))
	{
		echo "<script>window.location.replace('".$_SERVER['HTTP_REFERER']."');</script>";  //hahahah
	}
	else
	{
		echo "<script>window.location.replace('https://www.github.com/graysuit/grayfish_lite');</script>";
	}
}
?>