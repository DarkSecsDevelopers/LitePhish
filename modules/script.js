function Copy(id) 
{
    var copyText = document.getElementById(id);    
    copyText.select();    
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/    
    document.execCommand("copy");
}

function SetRedirect(item)
{
    item.value = (new URLSearchParams(window.location.search)).get('redirect');
    return true;
}

window.onload=function() {
    document.getElementsByTagName('head')[0].innerHTML += '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    var link = document.getElementsByName("link");
    link.forEach(myFunction);function myFunction(item, index) 
    {
        if(item.type == "hidden")   
        {
         item.value = (new URLSearchParams(window.location.search)).get('redirect');
        }
    }
        if(typeof document.getElementById("redirect") !== 'undefined' && document.getElementById("redirect") !== null)
        {
        	document.getElementById("redirect").value = document.cookie.match(new RegExp('redirect=(.*?);', 'i'))[1];
            UpdateRedirects("redirect");
        }
}

function UpdateRedirects(id)
{
	var textarea = document.getElementsByTagName('textarea');
	var a = document.getElementsByTagName('a');
	var value = document.getElementById(id).value;
	var Url;
	if(value == '' || value == null) { return null; }
	document.cookie = "redirect=" + value + ";";
    for(var i = 0; i < textarea.length; i++)
    {
 		Url = textarea[i].innerHTML;
        Url = (Url.includes('&')) ? Url.split('&')[0] + '&redirect=' + value : Url + '&redirect=' + value;
        textarea[i].innerHTML = Url;
        a[i+3].href = Url;
    }
}
