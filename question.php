<?php
	include"database.php";
?>

<?php

//-----------------For Questions------------------------------------------------------------------
	
	//Set question number
	$number = (int)$_GET['n'];

	//Get Question
	$query = "SELECT * FROM `questions` WHERE question_number = $number";

	//Get Result
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$question = $result->fetch_assoc();

//-----------------For Choices------------------------------------------------------------------
	
	
	//Get Choices
	$query = "SELECT * FROM `choices` WHERE question_number = $number";

	//Get Results
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

	//Get total number of questions

		$question_count = "SELECT * FROM `questions`";

		$result = $mysqli->query($question_count);

		$total = $result->num_rows;

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
			<div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
			<p class="question">
				<?php echo $question['text']; ?>
			</p>
			<form action="process.php" method="POST">
				
				<ul class="choices">
					<?php while ($row = $choices->fetch_assoc()): ?>
						<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"><?php echo $row['text'] ?></li>
					<?php endwhile; ?>
				</ul>
				<input type="submit" value="Submit">
				<input type="hidden" name="number" value="<?php echo $number; ?>">

			</form>
		</div>
	</main>

	<footer class="container">
		Copyright &copy; 2020, PHP Quizzer		
	</footer>
	
</body>
</html>