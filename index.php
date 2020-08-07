<?php
	include"database.php";
?>
<?php
	
	$query = "SELECT * FROM `questions`";
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<title>PHP Quizzer</title>

</head>
<body>

	<header>
		<h1 class="container">PHP Quizzer</h1>
	</header>

	<main>
		<div class="container">
			<h2>Test your PHP Knowledge</h2>
			<p>	This is a multiple choice quiz to test your knowledge of PHP. </p>
			<ul>
				<li><strong>Number of Questions: </strong><?php echo $total; ?></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Estimated Time: </strong><?php echo $total * 0.5;?> Minutes</li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
		</div>
	</main>

	<footer class="container">
		Copyright &copy; 2020, PHP Quizzer		
	</footer>
	
</body>
</html>