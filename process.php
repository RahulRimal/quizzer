<?php include "database.php";?>
<?php session_start();?>

<?php
	// Check to see if score is set
	if(!isset($_SESSION['score']))
	{
		$_SESSION['score'] = 0;
	}

	if($_POST)
	{
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		echo $number."<br>".$selected_choice;
		$next = $number+1;

		//Get the correct answer !!
		$query = "SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1";

		// Get Result
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		//Get Row
		$row = $result->fetch_assoc();

		// Set correct choice
		$correct_choice = $row['id'];

		// Compare answer
		if($correct_choice == $selected_choice)
		{
			// Answer is correct..
			$_SESSION['score']++;
		}

		//Get total number of questions

		$question_count = "SELECT * FROM `questions`";

		$result = $mysqli->query($question_count);

		$total = $result->num_rows;

		// Check if it's last question 

		if($number == $total)
		{
			header("Location: final.php");
			exit();
		}
		else
		{
			header("Location: question.php?n=".$next);
		}


	}
?>