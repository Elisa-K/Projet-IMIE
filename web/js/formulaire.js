/*changement couleur*/
function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
};

/*premiere page*/
function verifCiv(champ){
   if(champ.value != 1 || champ.value != 2)
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

function verifNais(champ){
   var regex = /[0-9]{4}\-[0-9]{2}\-[0-9]{2}/;
   
   if(!regex.test(champ.value))
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

function verifTel(champ){
	var regex = /[0-9]{10}/;
   if(!regex.test(champ.value))
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

function verifEmail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
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

function verifPage1(){
	verifCiv(civ); verifEmail(email); verifNais(date_naissance); verifNom(nom); verifPrenom(prenom); verifTel(tel);
	
	if(verifCiv && verifEmail && verifNais && verifNom && verifPrenom && verifTel != true){
		console.log([verifCiv && verifEmail && verifNais && verifNom && verifPrenom && verifTel]);
		alert(1);
		return false;
	}else{
		alert(2);
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
};
	};

