<!DOCTYPE HTML>
<html>
	<head>
		<title>Answer.me | Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/style.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper" >

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">Answer.me</a></h1>
						<nav id="nav">
						</nav>
					</header>

				<!-- Main -->
					<article id="main">						
						<section class="wrapper style1">
							
							<!-- <a class="button fit" href="questions.php"> Calculus 1 </a>
							<a class="button fit" href="#"> Calculus 2 </a>
							<a class="button fit" href="#"> Physics </a>
							<a class="button fit" href="#"> Chemistry </a> -->
							<?php
								include_once "mysql.php";
								$sql="SELECT * FROM categories";
								$result = $mysqli->query($sql);

								if ($result){
									while($row=$result->fetch_array()){
										$category = $row['category'];
										$id = $row['id'];
										echo("<a class='button fit' href='questions.php?category=$id'>$category</a>");
									}
								}
							?>
						
						</section>
					</article>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">				
							<li><a href="https://www.facebook.com/answer.me.web" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Home</li>
							<li>Design: <a href="http://html5up.net" >Answer.me</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.scrollex.min.js"></script>
			<script src="js/jquery.scrolly.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/init.js"></script>

	</body>
</html>