//_____________________________________________________________________________________________________________________________________________ <Ancre>
$('a[href^="#"]').click(function () {
    var ou = $(this).attr("href").substr(1);
    var saut = $("a[name='" + ou + "']");
    $('html,body').animate({

        scrollTop: $(saut).offset().top - 50

    }, 1000);
    return false;
});
//_____________________________________________________________________________________________________________________________________________STOPER L'ANNIMATION EN CAS DE SCOLL 

$('body,html').bind('scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove', function (e) {
        if (e.which > 0 || e.type == "mousedown" || e.type == "mousewheel" || e.type == "touchmove") {
            $("html,body").stop();
        }
    })
    //
    //
    //
    //

//_____________________________________________________________________________________________________________________________________________FORMULAIRE

var nom=0;
var prenom=0;
var email=0;
var message=0;


$(function(){
    $("#nom").keyup(function(){ $("#nom").css("border-color","#59b390"); });
    $("#prenom").keyup(function(){ $("#prenom").css("border-color","#59b390"); });
    $("#email").keyup(function(){ $("#email").css("border-color","#59b390"); });
    $("#message").keyup(function(){ $("#message").css("border-color","#59b390"); });
    
    btnEnvoyer = document.getElementById("sendMail");
});
  
//________________Verification
$(function(){ 
    $("#sendMail").click(function(){
        
            if(!$("#prenom").val().match(/^[a-z.-]+$/i)){
                $("#prenom").css("border-color","#E32D40");
                btnEnvoyer.innerHTML = "Erreur prenom"
            }
            else{prenom = 1;}
        //_____________________________________
            
            if(!$("#nom").val().match(/^[a-z. ]+$/i)){
                $("#nom").css("border-color","#E32D40");
                btnEnvoyer.innerHTML = "Erreur nom"
            }
            else{nom = 1;}

        //_____________________________________
        
            if(!$("#email").val().match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)){
                $("#email").css("border-color","#E32D40");
                btnEnvoyer.innerHTML = "Erreur email"
            }
            else{email = 1;}

        //_____________________________________
        
            if(!$("#message").val().match(/^[\s\S]{20,}/)){
                $("#message").css("border-color","#E32D40");
                btnEnvoyer.innerHTML = "Erreur message"
            }
            else{message = 1;}
        
         if((nom==1)&&(prenom==1)&&(email==1)&&(message==1)){
             btnEnvoyer.setAttribute("type", "submit");
         }
    });
});