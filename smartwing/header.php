<header>
		<nav class="navbar">
			<div class="logo"><a href="index.php"><img src="img/logo.png" class="logoimg">Smartwing</a></div>
			<ul class="menu">
			<li><?php if(isset($_SESSION['logged']))
						echo 'Hi'.$_SESSION['name'].'!';
					else
						echo '<a href="about.php">New here?</a>';?></li>
				<li class="cate">
					Categories
					<ul class="categories">
						<li><a href="genknow.php">General knowledge</a></li>
						<li><a href="basics.php">Basics of electronics</a></li>
						<li><a href="construction.php">Drone construction</a></li>
						<li><a href="reviews.php">Drone reviews</a></li>
					</ul>
				</li>
				<li><a href="schedule.php">Schedule</a></li>
				<li><a href="books.php">Books</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
			<div class="hamburger">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
			</div>
		</nav>
	</header>
	
	<script>
	//menu
	const hamburger=document.querySelector(".hamburger");
	const menu=document.querySelector(".menu");
		hamburger.addEventListener("click", ()=>{
			hamburger.classList.toggle("active"); 
			menu.classList.toggle("active"); 
			let lis=document.querySelectorAll(".menu>li");
			var i=0;
			for(let li of lis)
			{
				if(i!=1)
				li.addEventListener("click",() =>{
					hamburger.classList.remove("active"); 
					menu.classList.remove("active");
						});
						i++;
			}
				
			
		});
	</script>