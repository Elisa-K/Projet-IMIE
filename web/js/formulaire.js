/*var*/
var varCiv = 0;
var varNom = 0;
var varPrenom = 0;
var varNais = 0;
var varTel = 0;
var varEmail = 0;
var varSitu = 0;
var varDiplo = 0;
var varDispo = 0;
var varForm = 0;
var varCamp = 0;
/*changement couleur*/
function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
};

/*premiere page*/
function verifCiv(){
   if(document.getElementById('civ1').checked == true || document.getElementById('civ2').checked == true)
   {
	  document.getElementById('civ_civ').style.backgroundColor = "";
	  varCiv = 1;
	  return true;
   }
   else
   {
	  document.getElementById('civ_civ').style.backgroundColor = "#fba";
	  varCiv = 0;
	  return false;
   }
};

function verifNom(champ){
   if(champ.value.length < 2 || champ.value.length > 25)
   {
	  surligne(champ, true);
	  varNom = 0;
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  varNom = 1;
	  return true;
   }
};

function verifPrenom(champ){
   if(champ.value.length < 2 || champ.value.length > 25)
   {
	  surligne(champ, true);
	  varPrenom = 0;
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  varPrenom = 1;
	  return true;
   }
};

function verifNais(champ){
   var regex = /[0-9]{4}\-[0-9]{2}\-[0-9]{2}/;
   
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
	  varNais = 0;
      return false;
   }
   else
   {
      surligne(champ, false);
	  varNais = 1;
      return true;
   }
};

function verifTel(champ){
	var regex = /[0-9]{10}/;
   if(!regex.test(champ.value))
   {
	  surligne(champ, true);
	  varTel = 0;
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  varTel = 1;
	  return true;
   }
};

function verifEmail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
	  varEmail = 0;
      return false;
   }
   else
   {
      surligne(champ, false);
	  varEmail = 1;
      return true;
   }
};

function verifPage1(){
	verifCiv(); verifEmail(email); verifNais(date_naissance); verifNom(nom); verifPrenom(prenom); verifTel(tel);
	
	if(varCiv && varNom && varPrenom && varNais && varTel && varEmail == 1){
		alert(1);
		import {next} from "java";
		return true;
	}else{
		alert(2);
		document.getElementById("next").disabled = true;
		return false;
	};
};

