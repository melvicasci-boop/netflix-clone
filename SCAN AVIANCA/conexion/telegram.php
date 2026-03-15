<?php

// Token de acceso de tu bot
$token = '6662343501:AAGGgdtUMKliqvupWbelFOBnVvB2-0MxySk';
// ID del chat al que enviarás el mensaje
$chat_id = '6944451612';

function enviarMensaje($mensaje, $link1, $link2)
{  
    global $chat_id;
    global $token;
    // URL de la API de Telegram
    $api_url = "https://api.telegram.org/bot$token/sendMessage";

    // Parámetros del mensaje con botones
    $params = [
        'chat_id' => $chat_id,
        'text' => $mensaje,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [
                    ['text' => 'Error', 'url' => $link1],
                    ['text' => 'OK', 'url' => $link2],
                ],
            ],
        ]),
    ];

    // Inicia la solicitud cURL
    $ch = curl_init($api_url);

    // Configura la solicitud cURL
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecuta la solicitud cURL
    $result = curl_exec($ch);

    // Cierra la conexión cURL
    curl_close($ch);
}

function mensajeSuccess($mensaje){
    global $chat_id;
    global $token;

    // URL de la API de Telegram
    $api_url = "https://api.telegram.org/bot$token/sendMessage";

    // Parámetros del mensaje
    $params = [
        'chat_id' => $chat_id,
        'text' => $mensaje,
    ];

    // Inicia la solicitud cURL
    $ch = curl_init($api_url);

    // Configura la solicitud cURL
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecuta la solicitud cURL
    $result = curl_exec($ch);

    // Cierra la conexión cURL
    curl_close($ch);
}

