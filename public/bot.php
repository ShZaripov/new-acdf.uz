<?php

$raw  = file_get_contents("php://input");
$data = json_decode($raw, 1);

$c = curl_init();
curl_setopt($c, CURLOPT_URL, "https://api.telegram.org/bot768109109:AAFsrCBkGidJkS9M0cobF8uRrPgPV3Eelo4/sendMessage?chat_id=" . $data['message']['chat']['id'] . "&text=" . $data['message']['text']);
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$src = curl_exec($c);
curl_close($c);

