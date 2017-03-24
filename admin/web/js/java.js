function select_all(){

	var checkboxes = document.getElementsByName('tabId[]');
	var button = document.getElementById('toggle');

	if(button.value == 'Sélectionner'){
		for (var i in checkboxes){
			checkboxes[i].checked = 'FALSE';
		}
		button.value = 'Désélectionner'
	}else{
		for (var i in checkboxes){
			checkboxes[i].checked = '';
		}
		button.value = 'Sélectionner';
	}
};