<?php
	session_start();
	$email=htmlentities($_POST['email'],ENT_QUOTES,"utf-8");
	$pass=htmlentities($_POST['pass'],ENT_QUOTES,"utf-8");
	require "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	try
	{
		$link= new mysqli($host,$user,$password,$db_name);
		if($link->connect_errno!=0) throw new Exception($link->connect_errno);
		if(!$result=$link->query("SELECT * FROM users WHERE email='$email' AND pass='$pass'"))
			throw new Exception($link->error);
		$users=$result->num_rows;
		if($users>0)
		{
			$board=$result->fetch_assoc();
			$_SESSION['logged']=true;
			$_SESSION['name']=$board['name'];
			$_SESSION['email']=$board['email'];
				header('Location: index.php');
		}
		else
		{
			$_SESSION['alert']="The email or password is incorrect.";
			header('Location: login2.php');
		}
		$result->close();
		$link->close();
	}
	catch(Exception $e)
	{
		echo "Server error".$e;
	}
?>