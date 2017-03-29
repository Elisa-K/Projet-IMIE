$(document).ready(function(){
	
	$('.slide-contact').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		arrows: false,
	});
	
	
	
	//Examples of how to assign the Colorbox event to elements
	$(".group1").colorbox({rel:'group1'});
	$(".group2").colorbox({rel:'group2', transition:"fade"});
	$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
	$(".group4").colorbox({rel:'group4', slideshow:true});
	$(".ajax").colorbox();
	$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
	$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
	$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	$(".inline").colorbox({inline:true, width:"50%"});
	$(".callbacks").colorbox({
		onOpen:function(){ alert('onOpen: colorbox is about to open'); },
		onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
		onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
		onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
		onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
	});

	$('.non-retina').colorbox({rel:'group5', transition:'none'})
	$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
	
	//Example of preserving a JavaScript event for inline calls.
	$("#click").click(function(){ 
		$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
		return false;
	});
	
	//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
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
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
});

var popup = (function() 
{
 
    function init() {
 
        var overlay = $('.overlay');
 
        $('.popup-button').each(function(i, el)
        {
            var modal = $('#' + $(el).attr('data-modal'));
            var close = $('.close');
 
            // fonction qui enleve la class .show de la popup et la fait disparaitre
            function removeModal() {
                modal.removeClass('show');
            }
 
            // evenement qui appelle la fonction removeModal()
            function removeModalHandler() {
                removeModal(); 
            }
 
            // au clic sur le bouton on ajoute la class .show a la div de la popup qui permet au CSS3 de prendre le relai
            $(el).click(function()
            {   
                modal.addClass('show');
                overlay.unbind("click");
                // on ajoute sur l'overlay la fonction qui permet de fermer la popup
                overlay.bind("click", removeModalHandler);
            });
 
            // en cliquant sur le bouton close on ferme tout et on arrête les fonctions
            close.click(function(event)
            {
                event.stopPropagation();
                removeModalHandler();
            });
 
        });
    }
 
    init();
 
})();
  
});

function afficherAutre() {
	verifDispo();
	if($("#dispo3").is(':checked')){     
		document.getElementById('autre').style.display = "";
	}else{
		document.getElementById('autre').style.display = "none";
	};
};

/*var*/
var varCiv = 0;
var varNom = 0;
var varPrenom = 0;
var varNais = 0;
var varTel = 0;
var varEmail = 0;
var varDiplo = 0;
var varDispo = 0;
var varCamp = 0;
var page1 = 0;
var page2 = 0;
var page3 = 0;
var mMessage = " est un champ obligatoire.\n"
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
	  varCiv = "";
	  return true;
   }
   else
   {
	  document.getElementById('civ_civ').style.backgroundColor = "#fba";
	  varCiv = "Civilité" + mMessage;
	  return false;
   }
};

function verifNom(champ){
   if(champ.value.length < 2 || champ.value.length > 25)
   {
	  surligne(champ, true);
	  varNom = "Nom" + mMessage;
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  varNom = "";
	  return true;
   }
};

function verifPrenom(champ){
   if(champ.value.length < 2 || champ.value.length > 25)
   {
	  surligne(champ, true);
	  varPrenom = "Prenom" + mMessage;
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  varPrenom = "";
	  return true;
   }
};

function verifNais(champ){
   var regex = /[0-9]{4}\-[0-9]{2}\-[0-9]{2}/;
   
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
	  varNais = "Date de naissance" + mMessage;
      return false;
   }
   else
   {
      surligne(champ, false);
	  varNais = "";
      return true;
   }
};

function verifTel(champ){
	var regex = /[0-9]{10}/;
   if(!regex.test(champ.value))
   {
	  surligne(champ, true);
	  varTel = "Téléphone" + mMessage;
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  varTel = "";
	  return true;
   }
};

function verifEmail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
	  varEmail = "E-mail" + mMessage;
      return false;
   }
   else
   {
      surligne(champ, false);
	  varEmail = "";
      return true;
   }
};

function verifPage1(){
	verifCiv(); 
	verifEmail(email); 
	verifNais(date_naissance); 
	verifNom(nom); 
	verifPrenom(prenom); 
	verifTel(tel);
	if(varCiv == "" && varNom == "" && varPrenom == "" && varNais == "" && varTel =="" && varEmail == ""){
		page1 = 1;
	}else{
		page1 = 0;
	}
};

function verifDiplo(champ){
	if(champ.value.length < 2 || champ.value.length > 25)
   {
	  surligne(champ, true);
	  varDiplo = "Dernier diplôme obtenu" + mMessage;
	  return false;
   }
   else
   {
	  surligne(champ, false);
	  varDiplo = "";
	  return true;
   }
};

function verifDispo(){
   if(document.getElementById('dispo1').checked == true || document.getElementById('dispo2').checked == true || document.getElementById('dispo3').checked == true)
   {
	  document.getElementById('dispo_dispo').style.backgroundColor = "";
	  varDispo = "";
	  return true;
   }
   else
   {
	  document.getElementById('dispo_dispo').style.backgroundColor = "#fba";
	  varDispo = "Disponibilité" + mMessage;
	  return false;
   }
};

function verifPage2(){
	verifDiplo(nom_diplome);
	verifDispo();
	if(varDiplo == "" && varDispo == ""){
		page2 = 1;
	}else{
		page2 = 0;
	}
};

function verifCamp(){
if($('input[name=campus]').is(':checked'))
   {
	  document.getElementById('camp_camp').style.backgroundColor = "";
	  varCamp = "";
	  return true;
   }
   else
   {
	  document.getElementById('camp_camp').style.backgroundColor = "#fba";
	  varCamp = "Campus" + mMessage;
	  return false;
   }
};


function submitContact(){
	verifCamp();
    if(page1 == 0 || page2 == 0 || varCamp != "") { 
		alert(varCiv + varNom + varPrenom + varNais + varTel + varEmail + varDiplo + varDispo + varCamp);
		console.log(page1);
		console.log(page2);
		console.log(varCamp);
		event.preventDefault();
    }else{
		document.forms["msform"].submit();
	}
};