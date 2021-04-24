# Bugs
Many bugs were reported by many means. All of them are now fixed. Please see and report if your bug isn't listed above.

## [Fixed](https://github.com/DarkSecDevelopers/LitePhish/commit/800a1d579d2fea1714a949889b6e5c663ed0ffd8) Wrong link shown on textarea
Wrong link was shown on textarea when current url ends with index.php.
The script was made to get current url and append the phishing links to it.like
```php
//works fine
$current_url = "http://localhost";
$phish_link = $current_url."/modules/detect_bot.php"; //http://localhost/modules/detect_bot.php

//works wrong
$current_url = "http://localhost/index.php";
$phish_link = $current_url."/modules/detect_bot.php"; //http://localhost/index.php/modules/detect_bot.php

//ʳᵉᵖᵒʳᵗᵉᵈ ᵇʸ:ᵃᵖᵖᵉˡˢᶦᵉⁿˢᵃᵐ
```

## [Fixed](https://github.com/DarkSecDevelopers/LitePhish/commit/f751ff0f5a9a5a8c6e883c3c8b88560f7c5eb7c5) ipv6 IPs were detect to be bot
While working with bots, I seen that facebook bot uses ipv6 IPs. And I thought all bots uses ipv6 IPs. But not just bot, folks also uses it. So it wrong philosphy to parse only ipv4 IP.
```
//fine ipv4 NOT bot
192.178.10.2
37.09.299.200
...

//wrong ipv6 BOT
0d03:2560:10ee:2::mace:b009
7e67:3880:09ff:2::laze:780c
...
//ʳᵉᵖᵒʳᵗᵉᵈ ᵇʸ:ᵃᵖᵖᵉˡˢᶦᵉⁿˢᵃᵐ
```  

And after that I need to detect fb bot as well. So I understood this ipv6 pattern used by facebook

```facebook
2a03:2880:    10ff:2    ::face:b00c
2a03:2880:    13ff:16   ::face:b00c
2a03:2880:    20ff:77   ::face:b00c
2a03:2880:    21ff      ::face:b00c
2a03:2880:    21ff:1a   ::face:b00c
2a03:2880:    21ff:5    ::face:b00c
2a03:2880:    21ff:d    ::face:b00c
2a03:2880:    22ff:2c   ::face:b00c
2a03:2880:    23ff:8    ::face:b00c
2a03:2880:    27ff:75   ::face:b00c
2a03:2880:    ff:c      ::face:b00c
```
Notice that it always contain `2a03:2880:` and `2a03:2880:`. Here is the [fix](https://github.com/DarkSecDevelopers/LitePhish/blob/main/modules/detect_bot.php#L11). And also see detailed facebook bot information [here](https://gist.github.com/graysuit/939988c5156036ea4399a73bec66d105).

## [Fixed](https://github.com/DarkSecDevelopers/LitePhish/commit/a6b5a85db9e86426da89eda95bc2f79e4d78bc59) pages were not mobile compitable
Phishing pages were shown as low zoomed. So it fixed by adding just `<meta name="viewport" content="width=device-width, initial-scale=1.0">` to evey page. So I added it in [modules/script.js](https://github.com/DarkSecDevelopers/LitePhish/blob/main/modules/script.js#L17), that would be executed on every page. 
ʳᵉᵖᵒʳᵗᵉᵈ ᵇʸ:ᵃᵖᵖᵉˡˢᶦᵉⁿˢᵃᵐ,ᵘⁿᵏⁿᵒʷⁿ

## [Fixed](https://github.com/DarkSecDevelopers/LitePhish/commit/210e89516506ef6cdab7e3fe28460f771ee38f94) wrong value insertion into redirect textbox from cookie 
Whenever redirect link is inserted, LitePhish tries to save it in session cookies and try to re add it as webpage reloads. But it was parsing wrong data like `redirect=value1;cookie2=value2`. Now `value1`.
