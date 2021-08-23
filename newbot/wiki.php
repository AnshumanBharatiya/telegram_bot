<!-- setWebhook -  https://api.telegram.org/bot1938488105:AAH6WnaqB34G9-mZNX-SNtEtLNa1neoVpF4/setWebhook?url=https://anshumanbharatiya.000webhostapp.com/wiki_details/index.php -->

<!-- getWebhookInfo -  https://api.telegram.org/bot1938488105:AAH6WnaqB34G9-mZNX-SNtEtLNa1neoVpF4/getWebhookInfo -->

<!-- url - https://anshumanbharatiya.000webhostapp.com/wiki_details/index.php -->


<!-- https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&titles=$text -->

<?php


$input = file_get_contents('php://input');
$data = json_decode($input);
$chat_id = $data->message->chat->id;
$text = $data->message->text;
$uname = $data->message->from->first_name;


if($text == '/start')
{
	$msg="Welcome $uname. %0APlease enter your Search Name.";
}
else
{
	$text1 = urlencode(ucwords($text));
	$url = "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&titles=$text1";
	$data = file_get_contents($url);
	$data = json_decode($data, true);//json object convert to array using true

	if(isset($data['query']['pages']))
	{
		$arr = $data['query']['pages'];
		if(isset($arr['-1']))
		{
			$msg="No Data Found";
		}
		else
		{
			foreach($arr as $list)
			{
				$msg = urlencode($list['extract']);
			}
		}
	}
	else
	{
		$msg = "Something went wrong. Please try after sometime";
	}
}

$url = "https://api.telegram.org/bot$token/sendMessage?text=$msg&chat_id=$chat_id&parse_mode=html";
file_get_contents($url);















error_reporting(0);
$input=file_get_contents('php://input');
$data=json_decode($input);
$uname=$data->message->from->first_name;
$chat_id=$data->message->chat->id;
$text=$data->message->text;
$token = "1938488105:AAH6WnaqB34G9-mZNX-SNtEtLNa1neoVpF4";

if($text == '/start')
{
	$msg = "Welcome $uname. %0APlease enter your url";
}
else
{
	$text = urlencode(ucwords($text));
	$url = "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&titles=$text";
	$data = file_get_contents($url);
	$data = json_decode($data,true);
	if(isset($data['query']['pages']))
	{
		$arr=$data['query']['pages'];

		if(isset($arr['-1']))
		{
			$msg = "No data found";
		}
		else
		{
			foreach($arr as $list){
				$msg = urlencode($list['extract']);
			}
		}
	}
	else
	{
		$msg="Something went wrong. Please try after sometime";
	}
}
$url="https://api.telegram.org/bot$token/sendMessage?text=$msg&chat_id=$chat_id&parse_mode=html";
file_get_contents($url);


?>
