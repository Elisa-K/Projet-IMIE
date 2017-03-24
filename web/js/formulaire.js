/*changement couleur*/
function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
};

/*premiere page*/
function verifCiv(champ){
   if(champ.value.length = 1 || champ.value.length = 2)
   {
	  surligne(champ, true);
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  return true;
   }
};

function verifNom(champ){
   if(champ.value.length < 2 || champ.value.length > 25)
   {
	  surligne(champ, true);
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  return true;
   }
};

function verifPrenom(champ){
   if(champ.value.length < 2 || champ.value.length > 25)
   {
	  surligne(champ, true);
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  return true;
   }
};

