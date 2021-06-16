# Download
1. Xampp (for hosting server)
---- Download any 1 from following according to your system architexture
---- #32 bit: https://stackoverflow.com/a/56502557/14919621
---- #64 bit: https://www.apachefriends.org/xampp-files/7.3.28/xampp-windows-x64-7.3.28-1-VC15-installer.exe
2. OpenVpn (for exposing server to public internet)
---- Download any 1 from following according to your system architexture
---- #32 bit: https://swupdate.openvpn.org/community/releases/OpenVPN-2.5.2-I601-x86.msi
---- #64 bit: https://swupdate.openvpn.org/community/releases/OpenVPN-2.5.2-I601-amd64.msi
3. LitePhish
---- Download: https://github.com/DarkSecDevelopers/LitePhish/archive/refs/heads/main.zip

# Install 
1. Open XAMPP and start "APACHE" & "MYSQL"
-- if you encounter 80 port issue, better to close extra programs like skype
2. Extract LitePhish archive into "C:\xampp\htdocs\"
3. Go to "http://127.0.0.1/LitePhish-main/" to check whether site ran properly
-- These links will work only on your pc. To share to someone other connected to your network, simply replace "127.0.0.1" with IPv4 Address that looks like 192.xxx.xx.x. Using cmd, write 'ipconfig' to get it.
-- If you like to share link to someone outside of your network, then move to next step.
4. Go to portmap.io and sign up. 
-- Create new configuration with:
---- Name: anything
---- Type: OpenVPN
---- Proto: tcp
---- Comment: anything  
-- Click 'Generate' and after download *.ovpn file.
-- Open 'OpenVPN'. At tray, hover OpenVpn and select 'Import file...', choose the file which you downloaded before.
-- Click connect. It will show 'Assigned IP: xx.x.xxx.xx', so smply visit "http://xx.x.xxx.xx/LitePhish-main/"
