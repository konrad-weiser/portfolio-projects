<?php 
	session_start(); 
	require_once "mutual.php";
	$_SESSION['website']="genregulations.php";
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
					<h2 class="intro">REGULATIONS OF DRONES</h2>
					<p style="text-align: justify">
						Unmanned Aircraft Systems (UAS) Advisory Group was set up in 2015 by the United Nations ’ civil aviation arm to draw up global rules and regulations for the safe use of unmanned aircraft.[6] The team comprises countries such as the United States , France and China , as well as industry bodies like the global pilots' association.[6]

						In December 2017, the International Air Transport Association (IATA), a global airline trade body, pressed governments to ensure enforcement of regulations to curb reckless and dangerous flying of recreational drones. The law varies from country to country, but there are a few similar and quite obvious laws in many countries.
					</p>
					<ul style="color: #8e9198; margin-left: 20px;">
						<li>Fly at or below 400 feet</li>
						<li>Keep your drone within sight</li>
						<li>Don't fly in restricted airspace</li>
						<li>Don't fly near other aircraft, especially near airports</li>
						<li>Don't fly over groups of people</li>
						<li>Don't fly over stadiums or sporting events</li>
						<li>Don't fly near emergency response efforts such as fires</li>
						<li>Don't fly under the influence</li>
					</ul>
					<h4 class="intro">United Kingdom<img style="height:18px; margin-left:10px;"src="articles/1uk.jpg"></h4>
					<p style="text-align: justify">
					The U.K.'s Civil Aviation Authority (CAA) has stated that it will require non-military drones larger than 20 kg to be able to automatically sense other aircraft and steer to avoid them, a technology still missing in civilian UAVs as of 2012. As of 2013, the CAA rules are that UAV aircraft less than 20 kilograms in weight must be in direct visual contact with the pilot, cannot fly within 150 meters of a congested area or within 50 meters of a person or vehicle, and cannot be used for commercial activity.
					</p>
					<span style="color: #8e9198; margin-left: 20px;">To know the drone law in other countries I recommend <a href="https://encyclopedia.pub/entry/32027" target="_blank">this site</a>.</span>
					
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