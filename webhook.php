<!-- Webhook use for reply automatic -  bot reply user automatically-->

<!-- setWebhook -->
<!-- https://api.telegram.org/bot1931048753:AAGvtsbxNWJ_8zryDQhXRhUORAnI85kxv4c/setWebhook?url=https://github.com/AnshumanBharatiya/telegram_bot/blob/main/index.php -->


<!-- getWebhookInfo -->
<!-- https://api.telegram.org/bot1931048753:AAGvtsbxNWJ_8zryDQhXRhUORAnI85kxv4c/getWebhookInfo -->


<!-- deleteWebhook -->
<!-- https://api.telegram.org/bot1931048753:AAGvtsbxNWJ_8zryDQhXRhUORAnI85kxv4c/deleteWebhook -->

<!-- https://api.telegram.org/bot1931048753:AAGvtsbxNWJ_8zryDQhXRhUORAnI85kxv4c/getUpdates -->

<?php

$input = file_get_contents('php://input');
$data = json_decode($input);
$chat_id = $data->message->chat->id;
$text = $data->message->text;
$text = $text." - Webhook Reply from anshumanbharatiya_bot";

$token = "1931048753:AAGvtsbxNWJ_8zryDQhXRhUORAnI85kxv4c";
$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$text";

file_get_contents($url);

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL ,$url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);
// curl_close($ch);



?>