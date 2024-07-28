<?php
	session_start();
	$email=htmlentities($_POST['email'],ENT_QUOTES,"utf-8");
	$pass=htmlentities($_POST['pass'],ENT_QUOTES,"utf-8");
	$name=htmlentities($_POST['name'],ENT_QUOTES,"utf-8");
	//remember data
	$_SESSION['r_email']=$email;
	$_SESSION['r_pass']=$pass;
	$_SESSION['r_name']=$name;
	if(isset($_POST['check'])) $_SESSION['r_check']=$_POST['check'];
	$everyok=true;
	//name
	if(strlen($name)<3 && strlen($name)>15)
	{$_SESSION['e_register']="Your name can be from 3 to 15 characters."; $everyok=false;}
	//password
	if(strlen($pass)<5 && strlen($pass)>20)
	{$_SESSION['e_register']="The password can be from 5 to 20 characters."; $everyok=false;}
	//check
	if(!isset($_POST['check']))
	{$_SESSION['e_register']="Accept the statute."; $everyok=false;}
	require "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	try
	{
		$link= new mysqli($host,$user,$password,$db_name);
		if($link->connect_errno!=0) throw new Exception($link->connect_errno);
		$result=$link->query("SELECT id FROM users WHERE email='$email'");
		if(!$result) throw new Exception($link->error);
		if($result->num_rows>0)
		{
			$_SESSION['e_register']="This email already exists."; $everyok=false;
		}
		if($everyok==true)
		{
			if($link->query("INSERT INTO users VALUES(NULL,'$name','$email','$pass')"))
			{
				$_SESSION['logged']=true;
				$_SESSION['name']=$name;
				$_SESSION['email']=$email;
				header('Location: index.php');
			}
			else throw new Exception($link->error);
		}
		else
		{
			header('Location: about.php');
		}
		$result->close();
		$link->close();
	}
	catch(Exception $e)
	{
		echo "Server error".$e;
	}
?>