<?php include "database.php" ?>

<?php
	
	if(isset($_POST['submit']))
	{
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];

		//Choices array
		$choices = array();
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		$choices[5] = $_POST['choice5'];


		//Question query
		$query = " INSERT INTO `questions` (question_number, text) VALUES ('$question_number', '$question_text') ";

		//Run Query
		$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

		//Validate Insert
		if($insert_row)
		{
			foreach ($choices as $choice => $value)
			{
				if($value !="")
				{
					if($correct_choice == $choice)
					{
						$is_correct = 1;
					}
					else
					{
						$is_correct = 0;
					}

					//Choice Query
					$query = " INSERT INTO `choices` (question_number, is_correct, text) VALUES ('$question_number','$is_correct', '$value') ";

					//Run query
					$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

					// Validate insert
					if($insert_row)
					{
						continue;
					}
					else
					{
						die("Error: (".$mysqli->errno. ") ".$mysqli->error);
					}
				}
			}

			// header("Location: add.php");
			// exit();

			$msg = "Question has been added !!";
		}





	
	}
?>

<?php
	
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
			<h2>Add a Question</h2>

			<?php
				if(isset($msg))
				{
					echo "<p>".$msg."</p>";
				}
			?>

			<form action="add.php" method="POST">
				
				<p>
					<label>Question Number</label>
					<input type="number" name="question_number" value="<?php echo $total+1; ?>">
				</p>
				<p>
					<label>Question Text</label>
					<input type="text" name="question_text">
				</p>
				<p>
					<label>Choice #1: </label>
					<input type="text" name="choice1">
				</p>
				<p>
					<label>Choice #2: </label>
					<input type="text" name="choice2">
				</p>
				<p>
					<label>Choice #3: </label>
					<input type="text" name="choice3">
				</p>
				<p>
					<label>Choice #4: </label>
					<input type="text" name="choice4">
				</p>
				<p>
					<label>Choice #5: </label>
					<input type="text" name="choice5">
				</p>
				<p>
					<label>Correct Choice Number: </label>
					<input type="number" name="correct_choice">
				</p>
				<input type="submit" name="submit" value="Submit" class="start">

			</form>
		</div>
	</main>

	<footer class="container">
		Copyright &copy; 2020, PHP Quizzer		
	</footer>
	
</body>
</html>