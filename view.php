<?php
include_once "mysql.php";

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Elements - Spectral by HTML5 UP</title>
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
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1>
						<a href="index.php">Answer.me</a>
						</h1>
						<nav id="nav">
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
						<section>
							<?php
								$id = intval($mysqli->real_escape_string($_GET['id']));
								$sql = "SELECT * FROM questions WHERE id=$id;";
								$result = $mysqli->query($sql);
								while ($row = $result->fetch_array()){
									$id = $row['id'];
									$question = $row['question'];
									echo "<p>$question</p>";


									$comments = "SELECT * FROM comments WHERE question=$id";
									$res = $mysqli->query($comments);
									if ($res){
										while($comment = $res->fetch_array()){
											echo("<p style='font-size:80%;'>".$comment['comment']."</p>");
										}
									}
								}
							?>
							<form method='POST' action='insert_comment.php'>
								<input type='hidden' name='question' value='<?php echo $id; ?>'>
								<textarea name='comment'></textarea>
								<input type='submit'>
							</form>
						</section>
					</article>
					
				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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
	<script>
	function insert_comment(e){
		$(e).parent().append("<textarea name='comment'></textarea><input type='submit'>");
		$(e).html(""); // Delete element;
	}
	</script>
</html>
