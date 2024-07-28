<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="genknow.php";
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
					<h2 class="intro">GENERAL KNOWLEDGE</h2>
					<p style="text-align: justify">
						Here you can read about the novelties from drones world without going into electromechanical details. A variety of articles, films and guides will help you to keep up with the latest events and technology solutions.
					</p>
					<div class="articles">
						<a href="genmachines.php">
							<img src="articles/1earlyflyingmachines.jpg"class="articleimg">
							<div class="articlehp">
								<h4>Early flying machines</h4>
								<p class="articlep">Early flying machines include all forms of aircraft studied or constructed before the development of the modern aeroplane by 1910. The story of modern flight begins more than a century before the first...</p>
							</div>
							<div style="clear:both;"></div>
						</a>
					</div>
					<div class="articles">
						<a href="genregulations.php">
							<img src="articles/1drones_law.jpg"class="articleimg">
							<div class="articlehp">
								<h4>Regulations of drones</h4>
								<p class="articlep">In August 2012, The U.K.'s Civil Aviation Authority stated that it will require non-military drones larger than 20 kg to be able to automatically sense other aircraft and steer to avoid them...</p>
							</div>
							<div style="clear:both;"></div>
						</a>
					</div>
					<div class="articles">
						<a href="gentutorial.php">
							<img src="articles/1drone_control.jpg"class="articleimg">
							<div class="articlehp">
								<h4>Drone flying tutorial</h4>
								<p class="articlep">No matter your drone model, the rest of this guide will help you prepare for your first flight, stay safe, get airborne, and learn some basic and advanced drone flying techniques.</p>
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
			</div>
		</section>
		<?php require_once "footer.php";?>
	</main>
	<script type="text/javascript" src="comments.js"></script> 
</body>
</html>