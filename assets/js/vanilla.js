
function getValues (){
	var val = [];

	var allChecked = document.getElementsByName('choix');
	allChecked.forEach(function(check) {

		if (check.checked) {}
			val.push(check.value);
		}

	);
	return val;
}

function getXhr(){
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

