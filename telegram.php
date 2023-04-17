<?php

    $apiToken = "5065160162:AAEVWCHA-TEiqZq7eKQagiTy5pa-Op-myVI";
    $string = '<b>bold</b>, <strong>bold</strong>';
    $data = [
        'chat_id' => '1201127925',
        'text' => $string
    ];
  $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
?>