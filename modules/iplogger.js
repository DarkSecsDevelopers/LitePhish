var xhr = new XMLHttpRequest();
xhr.open('POST', 'iplogger.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

var data =    
    'Width=' + window.screen.availWidth + "&" +            
    'Height=' + window.screen.availHeight + "&" +
    'TimeZone=' + Intl.DateTimeFormat().resolvedOptions().timeZone;
	
	
xhr.send(data);


// xhr.onload = function () {
    // // do something to response
    // console.log(this.responseText);
// };