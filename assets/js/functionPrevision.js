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

function createDivs(mainDiv)
{
    var xhr = getXHR(); 
    var retour="";
    xhr.onreadystatechange  = function() 
    { 
        if(xhr.readyState  == 4){
            if(xhr.status  == 200) {
                retour = JSON.parse(xhr.responseText);
                mainDiv.innerHTML="";
                for (let i = 0; i < retour.length; i++) {
                    var div1 = document.createElement("div"); //le principale child du main div
                    div1.style.width="200px";
                    div1.style.heigth="100px";
                    div1.style.top="100px";
                    var div2 = document.createElement("div");//child du principale child
                    div2.class="col d-flex justify-content-center align-items-center"; //centrer le div
                    var h4 = document.createElement("h4");
                    h4.innerHTML=retour[i]['parcelNom'];  //nom du parcelle child du pincipale du main div
                    div1.appendChild(h4);
                    var h42 = document.createElement('h4');
                    h42.innerHTML = retour[i]['theNom'];//type de thé
                    div2.appendChild(h42);
                    div1.appendChild(div2);
                    var p = document.createElement("p"); //child du principale et surface du parcelle en ha
                    p.innerHTML = retour[i]['surface'];
                    div1.appendChild(p);
                    var p2 = document.createElement("p");//child du principale et nombre de pied
                    p2.innerHTML = retour[i]['pieds'];
                    div1.appendChild(p2);
                    var p3 = document.createElement("p");//child du principale et poids thé restant
                    p3.innerHTML = "320 kg";
                    div1.appendChild(p3);   
                    mainDiv.appendChild(div1);    
                    console.log(div1);
                }
            }
        }
    }
      //XMLHttpRequest.open(method, url, async)
    xhr.open("GET", "../Ajax/prevision.php"); 
   
   //XMLHttpRequest.send(body)
    xhr.send(null);
}