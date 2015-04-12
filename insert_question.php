<?php
	include_once "mysql.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST"){
		$question = $mysqli->real_escape_string($_POST['question']);
		$category = intval($mysqli->real_escape_string($_POST['category']));
		$sql = "INSERT INTO questions (question, category) VALUES ('$question', $category);";
		$result = $mysqli->query($sql);
		if (!$result){
			echo $mysqli->error();
		}
	}
	
	$mysqli->close();
	
	header("Location: questions.php?category=$category");
?>