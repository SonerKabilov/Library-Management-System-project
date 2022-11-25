<!DOCTYPE html>
<?php 
session_start();
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/all.css" type="text/css"/>
	<link rel="stylesheet" href="css/home-style.css" type="text/css"/>
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
	<title>Събития</title>
</head>
<body>
	<?php 
	include_once "header.php";
	?>

	<div class="page-content all-events">
		<br>
		<h2>10 Ноември - 17 часа</h2>
		<!-- <br> -->
		<p>Лекция на тема: Талант и творческо развитие</p>
		<p>Лектор: Иван Владимиров</p>
		<h2>20 Декември - 15 часа</h2>
		<!-- <br> -->
		<p>Представяне на книга: Война и мир</p>
		<!-- <br> -->
		<h2>15 Януари - 13-18 часа</h2>
		<p>
			Благотворителен книжен базар
		</p>
	</div>
	
	<?php
	include_once "footer.php";
	?>
</body>
</html>