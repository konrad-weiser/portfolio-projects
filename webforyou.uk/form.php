<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	$contact="";
	if(isset($_POST['email']))
	{
		$contact=htmlentities($_POST['email'],ENT_QUOTES,"UTF-8");
		if((filter_var($contact, FILTER_VALIDATE_EMAIL)==false) && $_POST['email']!="")
			$_SESSION['error']="Your email is invallid";
	}
	if(isset($_POST['phone']))
	{
		$contact.=htmlentities($_POST['phone'],ENT_QUOTES,"UTF-8");
	}
	if(isset($_POST['email']) || isset($_POST['phone']))
	{
		$page=$_SERVER['HTTP_REFERER'];
		$form=$_POST['form'];
		$pageform=$page.' '.$form;
		if(!isset($_POST['check']))
			$_SESSION['error']="Confirm the statute";
		if(isset($_POST['message']))
		{
			$message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");
		}else $message="no message";
		if(!isset($_SESSION['error']))
		{
			require_once "connect.php";
			mysqli_report(MYSQLI_REPORT_STRICT);
			try
			{
				$connection=new mysqli($host,$db_user,$db_pass, $db_name);
				if($connection->connect_errno!=0) throw new Exception($connection->connect_errno);
				
				$connection->query("INSERT INTO messages VALUES(NULL,'$contact', '$message', '$pageform')");
				if($connection->error) throw new Exception($connection->error);
				$connection->close();
				
				//mail
					$mail=new PHPMailer();
					$mail->isSMTP();
					$mail->Host='smtp.hostinger.com';
					$mail->Port=465;
					$mail->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;
					$mail->SMTPAuth=true;
					$mail->Username='contact@netforyou.co.uk';
					$mail->Password='NOO&Jf8KmbvvaoWr';
					$mail->CharSet='UTF-8';
					$mail->setFrom('contact@netforyou.co.uk','Konrad');
					$mail->addAddress('contact@netforyou.co.uk');
					$mail->isHTML(true);
					$mail->Subject='Form sent!';
					$mail->Body="<html>
					<head>
					  <title>Form sent!</title>
					</head>
					<body>
					  <h1>Good News!</h1>
					  <hr>
					  <p>
							Form has been sent!
							<p>$contact</p>
							<p>$message</p>
							<p>$pageform</p>
					  </p>
					</body>
					</html>";
					$mail->send();
				header('Location: confirmation');
				exit();
			}
			catch(Exception $e)
			{
				echo "Błąd serwera";
				echo "info: ".$e;
			}
		}
	header('Location: '.$page);
	}
?>