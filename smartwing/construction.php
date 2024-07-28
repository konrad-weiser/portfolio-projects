<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="construction.php";
	$website=$_SESSION['website'];
	require "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	try
		{
			$link= new mysqli($host,$user,$password,$db_name);
					if($link->connect_errno!=0) throw new Exception($link->connect_errno);
					if(!$result=$link->query("SELECT comments, times, likes, dislikes, emails FROM comments WHERE site_name='$website'"))
						throw new Exception($link->error);
						$board=$result->fetch_assoc();
					$comments=explode("|",$board['comments']);
					$times=explode("|",$board['times']);
					$likes=explode("|",$board['likes']);
					$dislikes=explode("|",$board['dislikes']);
					$emails=explode("|",$board['emails']);
					$num=count($comments)-1;
					$curdate=new DateTime();
					$allcomments="";
					for($i=0;$i<$num;$i++)
					{
						$date=new DateTime($times[$i]);
						$diff=$date->diff($curdate);
							$timeago=$diff->format('%s').' seconds ago';
						if($diff->format('%i')!=0)
							$timeago=$diff->format('%i').' minutes ago';
						if($diff->format('%h')!=0)
							$timeago=$diff->format('%h').' hours ago';
						if($diff->format('%d')!=0)
							$timeago=$diff->format('%d').' days ago';
						if($diff->format('%m')!=0)
							$timeago=$diff->format('%m').' months ago';
						if($diff->format('%y')!=0)
							$timeago=$diff->format('%y').' years ago';
						$e=$emails[$i];
						if(!$result=$link->query("SELECT name FROM users WHERE email='$e'"))
						throw new Exception($link->error);
						$board=$result->fetch_assoc();
						$allcomments=$allcomments.'<div class="comment">
						<img class="comimgu"src="img/noavatar.png">
						<div class="textandbutu">
							<div class="nametimeu">
								<span class="comname">'.$board['name'].'</span>
								<span class="comtime">• '.$timeago.'</span>
							</div>
							<p class="comp">'.$comments[$i].'</p>
							<div class="comreact">
								<div class="comvote">
									<span class="com-up-num">'.$likes[$i].'</span>
									<i class="icon-up-open"></i>
								</div>
								<div class="comvote">
									<i class="icon-down-open"></i>
									<span class="com-down-num">'.$dislikes[$i].'</span>
								</div>
								<span class="comanswer">• Reply</span>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>';
					}
					$result->close();
					$link->close();
		}
		catch(Exception $e)
		{
			echo "Server error".$e;
		}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<title>Smartwing - drone blog</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="genknow.css" type="text/css"/>
<link rel="stylesheet" href="about.css" type="text/css"/>
<link rel="stylesheet" href="media.css" type="text/css"/>
<link rel="stylesheet" href="fontello/css/fontello.css" type="text/css"/>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;900&display=swap" 
rel="stylesheet">
</head>
<body>
	<?php require_once "header.php";?>
	<main>
		<section>
			<div class="sitesg" style="margin-top:60px;">
				<article class="lefttext55g">
					<h2 class="intro">DRONE CONSTRUCTION</h2>
					<p style="text-align: justify">
						The maincontnet of this site. If you know the basics of electronics well, you are in good section then. Let's read about the  hidden secrets of building your own flying machines.The next aspects will be introducing to you gradually as usual. Make the notes, discuss with other passionates and construct your own models!
					</p>
					<div class="articles">
						<a href="conelements.php">
							<img src="articles/3drone_construction.jpg"class="articleimg">
							<div class="articlehp">
								<h4>Drone basic elements</h4>
								<p class="articlep">Drones have two basic functions: flight mode and navigation. To fly, drones must have a power source, such as battery or fuel. They also have rotors, propellers and a frame. The frame of a drone is...</p>
							</div>
							<div style="clear:both;"></div>
						</a>
					</div>
					<div class="articles">
						<a href="conmotors.php">
							<img src="articles/3motors.jpg"class="articleimg">
							<div class="articlehp">
								<h4>Drone motors</h4>
								<p class="articlep">This guide will help you understand the dynamics behind brushless drone motor used on quadcopters and how they influence flight characteristics. We'll dive into types of motors, design variations, weight...</p>
							</div>
							<div style="clear:both;"></div>
						</a>
					</div>
					<div class="articles">
						<a href="condetection.php">
							<img src="articles/3sensors.jpg"class="articleimg">
							<div class="articlehp">
								<h4>Drone detection system</h4>
								<p class="articlep">In today's fast growing drone market, sensor technologies are often the unheralded secret sauce inside. In this article, we discuss some of the types of sensor technologies that power today's drones...</p>
							</div>
							<div style="clear:both;"></div>
						</a>
					</div>
				<?php
				echo $commentnotebook1;
				if(!isset($_SESSION["email"]))
									echo '<a href="about.php"><span style="color:#2ab3d2;">LOG</span> IN</a>';
				echo $commentnotebook2.$allcomments.$commentnotebook3
				?>
		</section>
	</main>
	<?php require_once "footer.php";?>
	<script type="text/javascript" src="comments.js"></script> 
</body>
</html>