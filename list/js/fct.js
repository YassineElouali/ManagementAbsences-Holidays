 
function filtre(str1)
{ 
   alert('ok');
    var ajax;
    if (window.XMLHttpRequest)
    {
        ajax = new XMLHttpRequest();
    }
    else {
        ajax = new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax.open('post', 'filtrer.php', true);
    ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    var postData = "lib="+str1;
    ajax.send(postData);
    ajax.onreadystatechange = function ()
    {
        if (ajax.status == 200 && ajax.readyState == 4)
        {
            document.getElementById("output").innerHTML = ajax.responseText;
        }
    }
    return  false;
};
