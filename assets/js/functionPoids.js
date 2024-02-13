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

function getPoids(poids,parcelle,date)
{
    var xhr = getXHR(); 
    var retour="";
    var error=document.querySelector(".error");
    xhr.onreadystatechange  = function() 
    { 
        if(xhr.readyState  == 4){
            if(xhr.status  == 200) {
                retour = JSON.parse(xhr.responseText);
                if(retour!=""){
                    error.innerHTML=retour;
                }else{
                    error.innerHTML="";
                }
            }
        }
    }
      //XMLHttpRequest.open(method, url, async)
    xhr.open("GET", "../Ajax/Poids.php?poids="+poids+"&idParcelle="+parcelle.value+"&date="+date.value); 
   
   //XMLHttpRequest.send(body)
    xhr.send(null);
}