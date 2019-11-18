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

// passo N. iniziale di post visibili, endpoint
if(src =! '/'){
    createpost(2,'http://wordpressprova.local/wp-json/api/v1/ajax');
    showmore(2,'http://wordpressprova.local/wp-json/api/v1/ajax');
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

ajaxcustom();

// Funzione quiz game

// 1 costruisco domanda
// 2 verifica al click se la domanda è corretta
// 3 se è corretta aumento il punteggio
// 4 vado avanti mostrando la domanda successiva



var app = function(){


    var init = function(){
        buildgame();
        
    }
    
    // variabili per risposte
    var qr1 = document.getElementById("r_uno");
    var qr2 = document.getElementById("r_due");
    var qr3 = document.getElementById("r_tre");
    var qr4 = document.getElementById("r_quattro");
    var punteggio = 0;
    var count = 0 ;
    var obj = [];
    var buildgame = function() {
        // chiamata ajax per ottenere la domanda
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                obj = JSON.parse(this.responseText);
                //console.log(obj);
                var question = "";
                var r1, r2, r3, r4;
                // Ciclo per il count (domanda corrente)
                for(i = 0; i < obj.length; i++){
                    question = obj[count].Domanda;
                    r1 = obj[count].Rs1;
                    r2 = obj[count].Rs2;
                    r3 = obj[count].Rs3;
                    r4 = obj[count].Rs4;
                    rgiusta = obj[count].RsG;
                } // Assegno i valori
                document.getElementById("quiz_d").innerHTML = question;
                qr1.innerHTML = r1; jQuery(qr1).attr('data-risposta', r1);  // Assegno a ogni risposta il data value x confrontarlo poi con la risposta giusta
                qr2.innerHTML = r2; jQuery(qr2).attr('data-risposta', r2);
                qr3.innerHTML = r3; jQuery(qr3).attr('data-risposta', r3);
                qr4.innerHTML = r4; jQuery(qr4).attr('data-risposta', r4);
                check(rgiusta,obj);
            }
        };
        
        xhttp.open("GET", "http://wordpressprova.local/wp-json/api/v1/domande/", true);
        xhttp.send();
        
    }
    
    var check = function(rgiusta,obj){
        jQuery('.risposta').on('click', function(){
            var that = jQuery(this);
            var data = jQuery(that).data();
            //console.log(data.risposta, rgiusta);
            if(data.risposta === rgiusta){
                // aumento il punteggio 
                punteggio = punteggio + 100;
                count = count + 1;
                // chiamata Ajax per nuova domanda 
                console.log(obj)
            }
            else{
                // 
                punteggio = punteggio + 0;
                count = count + 1;
                
            }
            console.log('Count: ' + count + ' Punteggio: ' + punteggio);
        })
    }
    return {
        init: init
    }
};

jQuery(document).ready(function(){
    var App = new app();
        App.init()
})



