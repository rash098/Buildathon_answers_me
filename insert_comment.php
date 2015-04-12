<?php
include_once "mysql.php";
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		$category = $_POST['category'];
		$comment = $mysqli->real_escape_string($_POST['comment']);
		$question = intval($mysqli->real_escape_string($_POST['question']));
		$sql = "INSERT INTO comments (comment, question) VALUES ('$comment', $question);";
		$result = $mysqli->query($sql);
		if (!$result){
			echo $mysqli->error();
		}
	}
	
	$mysqli->close();
	
	$redirect = $_SERVER['HTTP_REFERER'];
	header("Location: $redirect");
?>