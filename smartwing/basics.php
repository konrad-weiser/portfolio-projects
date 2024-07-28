<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="basics.php";
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
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="genknow.css" type="text/css"/>
<link rel="stylesheet" href="about.css" type="text/css"/>
<link rel="stylesheet" href="media.css" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
					<h2 class="intro">BASICS OF ELECTRICS</h2>
					<p style="text-align: justify">
						Here you can explore the mysteries of electric current starting form zero. This is an awesome introduction to learning advanced drone technologies or any other uncanny things like modern electrical circuits, microcontrollers, RC vehicles, programming or even Artificial Intelligence.
					</p>
					<div class="articles">
						<a href="bascurrent.php">
							<img src="articles/2ecurrent.jpg"class="articleimg">
							<div class="articlehp">
								<h4>Electric current</h4>
								<p class="articlep">We tap the power of electricity daily without giving it much thought. You may find that there’s quite a bit about electricity that you didn’t know. You might also be embarrassed to ask questions about...</p>
							</div>
							<div style="clear:both;"></div>
						</a>
					</div>
					<div class="articles">
						<a href="basresistance.php">
							<img src="articles/2resistance.jpg"class="articleimg">
							<div class="articlehp">
								<h4>Resistance</h4>
								<p class="articlep">An electron traveling through the wires and loads of the external circuit encounters resistance. Resistance is the hindrance to the flow of charge. For an electron, the journey from terminal to terminal is...</p>
							</div>
							<div style="clear:both;"></div>
						</a>
					</div>
					<div class="articles">
						<a href="basohm.php">
							<img src="articles/2ohmslaw.jpg"class="articleimg">
							<div class="articlehp">
								<h4>Ohm's law</h4>
								<p class="articlep">Ohm’s law is a description of the relationship between current, voltage, and resistance. The amount of steady current through a large number of materials is directly proportional to the potential...</p>
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