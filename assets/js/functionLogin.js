function getXHR() {
    var xhr; 
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
         }
    }
    return xhr;
}

function getMailAndPwd(type,email,pwd)
{
    var xhr = getXHR(); 
    var retour="";
    xhr.onreadystatechange  = function() 
    { 
        if(xhr.readyState  == 4){
            if(xhr.status  == 200) {
                retour = JSON.parse(xhr.responseText);
                email.value = retour['email'];
                pwd.value = retour['mdp'];
            }
        }
    }
      //XMLHttpRequest.open(method, url, async)
    xhr.open("GET", "Login/getLogin.php?type="+type.value); 
   
   //XMLHttpRequest.send(body)
    xhr.send(null);
}