<?php

include_once "mysql.php";

$category = intval($mysqli->real_escape_string($_GET['category']));

$result = $mysqli->query("SELECT category FROM categories WHERE id=$category");

$row = $result->fetch_array();
$name = $row['category'];


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
						<a href="index.php"><?php echo $name; ?></a>
						</h1>
						<nav id="nav">
						</nav>
						<form method="GET" action='search.php'>
							<input style='width:20%;float:right;' type='text' name='q' placeholder='Search'>
							<input style='visibility:hidden;' type='submit'>
						</form>
					</header>

				<!-- Main -->
					<article id="main">
							<section>
									<form method="post" action="insert_question.php">
										<div class="row uniform">										
											<div class="12u$">
												<textarea name="question" id="demo-message" placeholder="Enter your question" rows="8"></textarea>
												<input type="hidden" name="category" value="<?php echo htmlentities($_GET['category']); ?>">
											</div>
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Send Message" class="special" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
							</section>

							</div>
						</section>
					</article>
					
					<div id="questions">
				<?php
					include_once "mysql.php";
					
					$category = intval($mysqli->real_escape_string($_GET['category']));
					$query = "SELECT questions.id, questions.question, COUNT(comments.id) as count FROM comments RIGHT JOIN questions ON comments.question = questions.id WHERE questions.category='$category' GROUP BY questions.question ORDER BY COUNT(comments.id) DESC;";
					$result = $mysqli->query($query);
					
					if ($result){
						while($row = $result->fetch_array()){
							echo "<form method='POST' action='insert_comment.php'><p>".$row['question']."</p><input type='hidden' name='category' value='".$category."'><input type='hidden' name='question' value='".$row['id']."'>";
							$q_id = $row['id'];
							$comments = "SELECT * FROM comments WHERE question=$q_id";
							$res = $mysqli->query($comments);
							if ($res){
								while($comment = $res->fetch_array()){
									echo("<p style='font-size:80%;'>".$comment['comment']."</p>");
								}
							}
							echo  "<a onclick='insert_comment(this);'>Comment</a></form>";
						}
					} else {
						echo $mysqli->error();
					}	
				?>
			</div>

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
