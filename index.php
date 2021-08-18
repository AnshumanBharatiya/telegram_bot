<?php

$input = file_get_contents('php://input');
$data = json_decode($input);
$chat_id = $data->message->chat->id;
$text = $data->message->text;
$text = $text."Webhook Reply";

$token = "1931048753:AAGvtsbxNWJ_8zryDQhXRhUORAnI85kxv4c";
$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$text";

file_get_contents($url);
?>
