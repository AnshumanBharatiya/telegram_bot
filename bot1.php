<?php 
if(isset($_POST['submit'])){

	$text = $_POST['msg'];
	$chat_id = "920619762";
	$token = "1931048753:AAGvtsbxNWJ_8zryDQhXRhUORAnI85kxv4c";
	$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$text";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL ,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);

	$result = json_decode($result,true);

	if(isset($result['ok'])){
		if (isset($result['result'])) {
			echo "Message Done!";
		}else{
			echo $result['description'];
		}
	}else{
		echo "<pre>";
		print_r($result);
		echo "Somethings went worng.";
	}

	// echo '<pre>';
	// print_r($result);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BOT TELEGRAM</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="msg" value="" required>
		<input type="submit" name="submit" value="Send" placeholder="">
	</form>
</body>
</html>