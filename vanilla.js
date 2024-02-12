
function getValues (){
	var val = [];

	var allChecked = document.getElementsByName('choix'){
	allChecked.forEach(function(check) {

		if (check.checked) {}
			val.push(check.value);
		}

	)
	return val;
}