<?php session_start(); ?>
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
			<h2>You're Done!!</h2>
			<p>Congrats! You've completed the test.</p>
			<p>Final Score: <?php echo $_SESSION['score']; ?></p>
			<a href="question.php?n=1" class="start">Take Again</a>
		</div>
	</main>

	<footer class="container">
		Copyright &copy; 2020, PHP Quizzer		
	</footer>
	
</body>
</html>