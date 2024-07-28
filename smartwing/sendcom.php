<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		$comtext=htmlentities($_POST['comtext'],ENT_QUOTES,"utf-8");
		$website=$_SESSION['website'];
		$locweb='Location: '.$website;
		require "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		try
		{
			$link= new mysqli($host,$user,$password,$db_name);
					if($link->connect_errno!=0) throw new Exception($link->connect_errno);
					if(!$result=$link->query("SELECT comments, times, likes, dislikes, emails FROM comments WHERE site_name='$website'"))
						throw new Exception($link->error);
						$board=$result->fetch_assoc();
						$newcom=$board['comments'].$comtext.'|';
						$likes=$board['likes'].'0'.'|';
						$dislikes=$board['dislikes'].'0'.'|';
						$email=$board['emails'].$_SESSION['email'].'|';
						$date=date("Y-m-d H:i:s");
						$time=$board['times'].$date.'|';
					if(!$link->query("UPDATE comments SET comments='$newcom', likes='$likes', times='$time', emails='$email', dislikes='$dislikes' WHERE site_name='$website'"))
						throw new Exception($link->error);
					header($locweb);
					$result->close();
					$link->close();
		}
		catch(Exception $e)
		{
			echo "Server error".$e;
		}
	}
	else 
	{header('Location: about.php');}
	
?>