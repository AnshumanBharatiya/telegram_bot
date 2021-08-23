<!-- setWebhook -  https://api.telegram.org/bot1976508376:AAE7NlD2kbBsN4Phktu9gNxFkltTnr-G0Jg/setWebhook?url=https://anshumanbharatiya.000webhostapp.com/student_result/index.php -->

<!-- getWebhookInfo -  https://api.telegram.org/bot1976508376:AAE7NlD2kbBsN4Phktu9gNxFkltTnr-G0Jg/getWebhookInfo -->

<!-- url - https://anshumanbharatiya.000webhostapp.com/student_result/index.php -->


<?

include('db.php');
$input = file_get_contents('php://input');
$data = json_decode($input);
$chat_id = $data->message->chat->id;
$text = $data->message->text;
$uname = $data->message->from->first_name;
$token = "1976508376:AAE7NlD2kbBsN4Phktu9gNxFkltTnr-G0Jg";
if($text=='/start')
{
	$msg = "Welcome $uname. %0APlease enter your roll number";
}
else
{
	// $msg = "How may i help you";
	$text = mysqli_real_escape_string($con,$text);
	$res = mysqli_query($con,"select * from student where id='$text'");
	if(mysqli_num_rows($res)>0)
	{
		$row = mysqli_fetch_assoc($res);
		$name = $row['name'];

		$res = mysqli_query($con, "select * from marks where student_id = '$text' order by marks desc");

		$markHTML = "";
		$total_mark = 0;
		while($row = mysqli_fetch_assoc($res))
		{
			$markHTML .= $row['subject']." - ".$row['marks']."%0A";
			$total_mark = $total_mark + $row['marks'];
		}
		$msg = "<b>Name - $name </b>%0A%0A";
		$msg .= $markHTML."%0A";
		$msg .= "<b>Total Mark - $total_mark</b>";
		
	}
	else
	{
		$msg = "Please Enter Valid Roll Number!!!";
	}

}
$url="https://api.telegram.org/bot$token/sendMessage?text=$msg&chat_id=$chat_id&parse_mode=html";
file_get_contents($url);

?>
