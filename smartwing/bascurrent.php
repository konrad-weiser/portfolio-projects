<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="bascurrent.php";
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
					<h2 class="intro">ELECTRIC CURRENT</h2>
					<p style="text-align: justify">
						We tap the power of electricity daily without giving it much thought. You may find that there’s quite a bit about electricity that you didn’t know. You might also be embarrassed to ask questions about something you think you’re already supposed to understand. Fear not! This page provides basic knowledge about electric current as well as an easy-to-understand introduction to topics like the difference between current and voltage, different types of current, and methods for measuring current. Once you’ve read it, you should have a basic understanding of electric current.
					</p>
					<h4 class="intro">What is electric current?</h4>
					<p style="text-align: justify">Electric current refers to the flow of electricity in an electronic circuit, and to the amount of electricity flowing through a circuit. It is measured in amperes (A). The larger the value in amperes, the more electricity is flowing in the circuit.Electricity is easy to visualize if you think of it as the flow of water in a river. Particles called electrons come together, and the number of electrons flowing each second is the current.</p>
					<p style="text-align: center;"><img style="width: 400px; " src="articles/2electrons.png"></p>
					<h4 class="intro">Difference between voltage and current</h4>
					<p style="text-align: justify">Voltage is another term that’s used in regards to electronic circuits about as often as current. Voltage is measured in volts (V). Like current, voltage is also related to the flow of electrons in a circuit. Current refers to the flow of electrons, while voltage refers to the amount of force pushing the flowing electrons.
					The higher the voltage, the more current will flow; a lower voltage means a weaker current.Resistance is another property that increases current. Think of resistance as the width through which electrons flow. The greater the resistance, the narrower the width through which the electrons must flow, and therefore the lower the current. By contrast, a lower resistance increases the width through which electrons can flow, allowing more current to flow at once.If you want more current to flow at a given resistance value, you can accomplish that by raising the voltage. Power is generally calculated by multiplying current (A) by voltage (V), yielding a result that is expressed in watts (W). In this way, current and voltage are completely different, but both are important elements in the world of electricity.</p>
					<p style="text-align: center;"><img style="width: 400px; " src="articles/2drains.png"></p>
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