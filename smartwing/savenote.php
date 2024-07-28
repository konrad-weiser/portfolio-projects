<?php
	session_start();
	$website='Location: '.$_SESSION['website'];
	if(isset($_POST['notetext']))
	{   
		if(isset($_SESSION['email']))
		{
			$email=$_SESSION['email'];
			$note=htmlentities($_POST['notetext'],ENT_QUOTES,"utf-8");
			require "connect.php";
			mysqli_report(MYSQLI_REPORT_STRICT);
			try
			{
				$link= new mysqli($host,$user,$password,$db_name);
				if($link->connect_errno!=0) throw new Exception($link->connect_errno);
				if(!$result=$link->query("SELECT notes FROM users WHERE email='$email'"))
					throw new Exception($link->error);
				
					$board=$result->fetch_assoc();
					$notes=$board['notes'].$_POST['notetext'].'|';
				if(!$link->query("UPDATE users SET notes='$notes' WHERE email='$email'"))
					throw new Exception($link->error);
				header($website);
				$result->close();
				$link->close();
			}
			catch(Exception $e)
			{
				echo "Server error".$e;
			}
		}
		else
		{
			header('Location: about.php');
		}
	}
	else
		echo "Your link seems to be incorrect";
?>