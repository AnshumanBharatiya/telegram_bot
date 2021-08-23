<!-- setWebhook - (use above 'token' and above 'index.php' path)

    https://api.telegram.org/bot1957916782:AAGr-ZbsYpgMvVV5mV_o_Jc3FG0d_MYFtYQ/setWebhook?url=https://anshumanbharatiya.000webhostapp.com/short_link/index.php -->

<!-- getWebhookInfo

    https://api.telegram.org/bot1957916782:AAGr-ZbsYpgMvVV5mV_o_Jc3FG0d_MYFtYQ/getWebhookInfo -->

<!-- cutt.ly api key  -  e0ceefe461888631ce4c7e45a020419cb6bf1  -->

<!-- url - https://anshumanbharatiya.000webhostapp.com/short_link/index.php -->


<?php

$input = file_get_contents('php://input');
$data = json_decode($input);
$chat_id = $data->message->chat->id;
$text = $data->message->text;
$uname = $data->message->from->first_name;
$token = "1957916782:AAGr-ZbsYpgMvVV5mV_o_Jc3FG0d_MYFtYQ";

if($text=='/start')
{
	$msg = "Welcome $uname. %0APlease enter your URL.";
}
else
{
	$randstr = str_shuffle("abcdefghijklmnopqrstuvwxlmnopqrstuvwxyz");
	$alias = substr($randstr,0,5);
	$url = urlencode($text);
	$json = file_get_contents("https://cutt.ly/api/api.php?key=e0ceefe461888631ce4c7e45a020419cb6bf1&short=$url&name=$alias");
	$data = json_decode ($json, true);

	// var_dump($data);
	// echo '<pre>';
	// print_r($data);

	if(isset($data['url']['status']))
	{
		$arr = ["","the shortened link comes from the domain that shortens the link, i.e. the link has already been shortened","the entered link is not a link","the preferred link name is already taken","Invalid API key","the link has not passed the validation. Includes invalid characters","The link provided is from a blocked domain"];
		if($data['url']['status'] == 7)
		{
			$msg = "Here are your short link %0A".$data['url']['shortLink'];
		}
		else
		{
			$msg = $arr[$data['url']['status']];
		}
	}

}

$url="https://api.telegram.org/bot$token/sendMessage?text=$msg&chat_id=$chat_id&parse_mode=html";
file_get_contents($url);

?>