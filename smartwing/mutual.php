<?php
	$commentnotebook1='<div class="comments">
					<h3>COMMENTS</h3>
					<header class="comhead">
							<span class="comnum"><span class="coms"><?php echo $i;?> Comments</span></span>
							<div class="comlog">';/*php LOGIN*/
	$commentnotebook2='</div>
					</header>
					<form action="sendcom.php" method="post"class="commentf">
						<img class="comimg"src="img/noavatar.png">
						<div class="textandbut">
							<textarea name="comtext"class="comtextarea" rows="3" placeholder="Join to discussion..."></textarea>
							<button class="combut">SEND</button>
						</div>
					</form>
					<span class="sortby">
						Sort by 
						<ul tabindex="0">
							<li>chronology▾</li>
							<li>popularity</li>
						</ul>
					</span>		
						<section class="s">';
					$commentnotebook3='</section>
				</div>
				</article>
				<aside class="lefttext30g">
					<div class="asidecat">
						<h3 style="color:#2ab3d2;">Entries Categories</h3>
						<ul class="sideul">
							<li class="sidecat"><a class="sidecat " href="genknow.php">General knowledge</a></li>
							<li class="sidecat"><a class="sidecat" href="basics.php">Basics of electronics</a></li>
							<li class="sidecat"><a class="sidecat" href="construction.php">Drone construction</a></li>
							<li class="sidecat"><a class="sidecat" href="reviews.php">Drone reviews</a></li>
						</ul>
					</div>
					<form action="savenote.php" method="post" class="notebook">
						<h3 style="text-align: center;">Notebook</h3>
						<textarea name="notetext" class="notetext" rows="14" placeholder="Write down a note..."></textarea>
						<button class="notebut">SAVE</button>
					</form>
				</aside>
				<div style="clear: both;">';