<?php


$captchaResult = $_POST["captchaResult"];
$firstNumber = $_POST["firstNumber"];
	
$checkTotal = $firstNumber;

if ($captchaResult)
{
	if ($captchaResult == $checkTotal)
	{
	    session_start();
 
if($_SESSION['vercode']==$_POST['vercode'])
{
$field_name_contact = $_POST['name_contact'];

$field_lastname_contact = $_POST['lastname_contact'];
$field_lastname_contact = $_POST['email_contact'];
$field_phone_contact = $_POST['phone_contact'];
$field_message_contact = $_POST['message_contact'];

$mail_to = 'HotelRigmor@gmail.com';
$subject = 'Shree Shyam Cot Contact Us Enquiry from Website';

$body_message ='<table>
<tr>
<td>Name:</td>
<td>'.$field_name_contact.'</td>
</tr>

<tr>
<td>Email:</td>
<td>'.$field_email_contact.'</td>
</tr>
<tr>
<td>Phone Number:</td>
<td>'.$field_phone_contact.'</td>
</tr>
<tr>
<td>Message:</td>
<td>'.$field_message_contact.'</td>
</tr>
</table>';

//echo $body_message;die;
//$body_message = '.$mail.'"\n";

//$headers = 'From: '.$field_email."\r\n";
//$headers .= 'Reply-To: '.$field_email."\r\n";
                            $headers = "From: " . strip_tags('HotelRigmor@gmail.com') . "\r\n";
                            $headers .= "Reply-To: ". strip_tags('HotelRigmor@gmail.com') . "\r\n";
                
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
?>
<?php
if($field_name ==""){ ?>
	<script language="javascript" type="text/javascript">
		alert('Please fill all data.');
		window.location = 'contact.php';
	</script>
<?php
}
else { ?>
<?php $mail_status = mail($mail_to, $subject, $body_message, $headers); ?>
<?php
}
?>

<?php
if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Thank you for the message. We will contact you shortly.');
		window.location = 'index1.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please, send again. ');
		window.location = 'contact-us.html';
	</script>
<?php
}
}
else
{
?>
<script language="javascript" type="text/javascript">
		alert('Invalid Captcha. Please Try Again');
		window.location = 'contact-us.html';
	</script>
<?php
}



	}
	else
	{
			echo '<h2>Wrong Captcha</h2>';
	}
}
else
{
	echo '<h2>Please fill the captcha before submitting form</h2>';
}
?>