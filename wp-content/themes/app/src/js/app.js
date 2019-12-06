var src = window.location.pathname;

function createpost(view,api) {
    var firstview = view;
    // funzione ajax per la creazione di post
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var risposta = JSON.parse(this.responseText);
            var output = '';
            jQuery("#showmore").show();
            for (i = 0; i < firstview; i++) {
                output = output + '<div class="col-lg-6">\
                                        <h1>'+ risposta[i].nome +'</h1>\
                                        <p>'+ risposta[i].content +'</p>\
                                    </div>'
            }
            document.getElementById("container-post").innerHTML = output;
        }
    };
    xhttp.open("GET", api, true);
    xhttp.send();
};

function showmore(view,api) {
    var button = jQuery("#showmore");
    var firstview = view;
    button.click(function () {
        firstview += 1; // aumento il counter per far vedere i post in più
        var xhttp = new XMLHttpRequest(); // chiamata Ajax per mostrare contenuto
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var risposta = JSON.parse(this.responseText);
                var output = '';
                // Se il counter è = o + del contenuto della risposta nascondo il bottone
                if(firstview > risposta.length || firstview === risposta.length){
                    button.hide();
                }
                for (i = 0; i < firstview; i++) {
                    output = output + '<div class="col-lg-6">\
                                            <h1>'+ risposta[i].nome +'</h1>\
                                            <p>'+ risposta[i].content +'</p>\
                                        </div>'
                    
                }
                
                document.getElementById("container-post").innerHTML = output;
            }
        };
        xhttp.open("GET", api , true);
        xhttp.send();
    });
}


// Funzione per chiamata ajax con url custom

function ajaxcustom (){
    jQuery(document).on('click', '.saluta', function (e) {

        jQuery.ajax({
            url: ajax_url,
            type: 'post',
            data: {
                action: 'saluta',
            },
            success: function (response) {
                response = response;
                console.log(response)
            }
        });

    });
}

if(src === '/'){
    ajaxcustom();
}



// Funzione per ottenere valori nel url
// --> Esempio 1)
function getUrlParameter (name) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === p) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}
//console.log(getUrlParameter('valore'))
// --> Esempio 2
function sgetUrlParameter (name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}
// console.log(sgetUrlParameter('valore')) --> es ?valore=xxx in console trovi xxx


// Questa funzione ti permette di caricare uno script 
function loadScriptSync (u, c) {
    var d = document,
        t = 'script',
        o = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    o.src = u;
    if (c) {
        o.addEventListener('load', function (e) {
            c(null, e);
        }, false);
    }
    s.parentNode.insertBefore(o, s);
}

// loadScriptSync('https://code.createjs.com/easeljs-0.6.0.min.js', function () {});

// Funzione che ti permette di caricare un file css
function loadCssSync (u, c) {
    var d = document,
        t = 'link',
        o = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    o.href = u;
    o.type = 'text/css';
    o.rel = 'stylesheet';
    if (c) {
        o.addEventListener('load', function (e) {
            c(null, e);
        }, false);
    }
    s.parentNode.insertBefore(o, s);
}

// loadCssSync('https://code.createjs.com/easeljs-0.6.0.min.css', function () {});



// Funzioni tracciamento con analitycs

function track (action,category,label,value) {
    if (typeof ga !== 'undefined') {
        gtag('event', action, {
            'event_category': category,
            'event_label': label,
            'value': value
        });
    }
}

// può essere richiamata al click
//  --> es track('hotspot', 'dettaglio' ) -- possono essere anche delle variabili
// oppure allo scrool 
// --> track('Scroll event','page','to','bottom')
// --> nel elemento direttamente onclick="track('button','Hotspot')

// parrallax custom

var parallaxEl = function(className,type,unit){

    var parallaxType = type ? '+' : '-';
    var unit = unit || 10;

    if(jQuery(className).length > 0){
        document.addEventListener('scroll', function (event) {
            
                var that = jQuery(className),
                    thatOffset = that.offset().top,
                    valy = (1 - Math.max(thatOffset/2 - (jQuery(window).scrollTop() / 2 )) / unit);

                    that.css({
                        "transform" : "translateY("+parallaxType+Math.abs(valy)+"px)"
                    });

            
        }, true);
    }

}

// parallaxEl('.parallax-texts h2:eq(2)',true,15);
// parallaxEl('.parallax-texts h2:eq(1)',true,30);











// switch per richiamo funzioni
switch (src){
    case '/':
        ajaxcustom()
    break;
    case '/contenuti-ajax/':
        createpost(2,'http://wordpressprova.local/wp-json/api/v1/ajax');
        showmore(2,'http://wordpressprova.local/wp-json/api/v1/ajax');
    break;
}


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

jQuery('#author').attr('required','required');
jQuery('#email').attr('required','required');
jQuery('#commentform').on('submit', function() {
    
    jQuery('.name-error').hide();
    jQuery('.email-error').hide();
    jQuery('.comment-error').hide();
    jQuery('.response-form').hide();

    var error = 0;
    if(jQuery('#author').val().length < 3) {
        error += 1;
        jQuery('.comment-form-author').append('<p class="name-error" style="color: #b0b920;">Inserisci un nome valido</p>');
    } 
    
    if(jQuery('#comment').val().length < 12) {
        error += 1;
        jQuery('.comment-form-comment').append('<p class="comment-error" style="color: #b0b920;">Inserisci un commento valido</p>');
    } 
    
    var email = jQuery('#email').val();
    if (!validateEmail(email)) {
        error += 1;
        jQuery('.comment-form-email').append('<p class="email-error" style="color: #b0b920;">Inserisci una mail valida</p>');
    }

    if(error == 0){
        jQuery('#commentform').append('<p class="response-form" style="border: 2px solid #398f14; padding: 0.2em 1em; width: 100%; margin-top: 1em;">Grazie, il tuo messaggio è stato inviato con successo!</p>');
        return true;
    } else {
        console.log('errore');
        jQuery('#commentform').append('<p class="response-form" style="border: 2px solid #f7e700; padding: 0.2em 1em; width: 100%; margin-top: 1em;">Uno o più campi contengono un errore o non sono stati compilati. Verifica tutti i campi prima di inviare di nuovo.</p>');
        return false;
    }

});