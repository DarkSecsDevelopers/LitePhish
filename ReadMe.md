 <p align=center>
<img  width="250px" height="300px" src="logo.png"/><h2 align=center> LitePhish</h2><p align=center><a href=http://github.com/DarkSecDevelopers/LitePhish target=_blank>LitePhish</a> provides lite weight phishing pages with clean and minimal interface. It is modified and lite version of <a href=http://www.github.com/graysuit/grayfish target=_blank>grayfish</a>.</p></p>
<p align=center>  
<a href=https://discord.gg/Hu5XPGMTuk><img src="https://img.shields.io/discord/787203724975931413?style=for-the-badge&label=discord" /></a>
<img title="Open Source" src="https://img.shields.io/badge/Open%20Source-%E2%99%A5-red?style=for-the-badge" >
<a href=LICENSE><img title="GitHub version" src="https://img.shields.io/github/license/DarkSecDevelopers/LitePhish?style=for-the-badge" ></a>
<img src="https://img.shields.io/github/stars/DarkSecDevelopers/LitePhish?style=for-the-badge">  
<img src="https://img.shields.io/github/forks/DarkSecDevelopers/LitePhish?style=for-the-badge">
</p>  

## What's new?
- **Removed:** Base64 encoded image, Embeded html in php. Reason : High filesize and low performance 
- **Removed:** Admin Panel,MetaTags editor, extra things Reason : Unneccessary
- **Re-coded:** Webpages were recoded. Reason : To acheive fast loadup and low filesize 
- **Added:** Sample.html. Reason : To show mechanism of LitePhish, Helpfull in contribution
- **Added:** Clicking on textarea will automatically copy URL. Reason : for ease
- **Added:** Redirection url as parameter to phishing page. Reason : for ease
- **Added:** Clean and colorfull panel. Reason : for good feelings  
- **Added:** Detect web crawlers by IP. Reason : prevents analysis and link blockage by web crawler bots like googlebot,facebot etc.  
- and more ... on [Changlog](docs/Changlog.md)


## Features
- Almost, all Templates are under 20KBs that helps in loading webpages fast.
- Webpages are completely offline.
- <del>Images are encoded in base64 to avoid external + internal linking.</del>
- Codes are highly compressed. Extra codes have been removed.
- Login form can't be bypass until all inputs have been filled by a victim.
- <del>Link with custom preview(image + title + description) when shared on any website.</del>
- <del>Admin login</del> panel has been created for absolute dummies.
- Detect bots by their IP & UserAgent and block them to prevent link blockage..
- Logs all user data using [iplogger](modules/iplogger.php)
- Send credientials via discord, telegram. Just set [config.php](sender/config.php)

## Usage
`git clone https://github.com/DarkSecDevelopers/LitePhish.git`
- Upload all files to any web hosting or host using xampp and port forward using ngrok
- Select any phishing link
- Send the link to your victim
- **Note:** Username/Password will saved in victims/password.txt


## Available sites
<details>
<summary>Click me to view sites</summary>
<ol>

- Dropbox
- Facebook_desktop_homepage
- Facebook_desktop_static
- Facebook_mobile + 2FA
- Facebook_mobile_fake_security
- Github
- Garena Free Fire
- Instagram
- Linkedin 
- Microsoft
- Netflix
- Paypal
- Protonmail
- Sample (meant for developers)
- Snapchat
- Tumblr
- Messenger
- Twitter_desktop
- Wordpress
- Yahoo

</ol></details>

## Contributions
The reason behind why I re-coded and moved grayfish to organisation was to have project get contributed. You can also contribute by using, reporting etc. You are always welcome so never fear. 
**Webpage:** If you want to add any phishing page then please see sample.html file to see how LitePhish works. 
**Bugs:** Before reporting any bug, verify that it does found on latest release and not listed on [docs/Bugs.md](Bugs) or [issues](issues).

## Disclaimer
We assume everyone should use it legally. Author and organisation won't be responsible in case of your crime.

## Contact
- Facebook: **[gray.programmerz.5](https://fb.com/messages/t/gray.programmerz.5)**
- Email: **[hackrefisher@gmail.com](mailto:hackrefisher@gmail.com)**
- Website: **[tiplava](http://tiplava.blogspot.com)**
- Discord: **[Fishes](https://discord.gg/Hu5XPGMTuk)**
# I Love ALLAH + Holy Prophet + Islam and Pakistan.
