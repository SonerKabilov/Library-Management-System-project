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
	<title>Местоположение</title>
</head>
<body>
	<?php 
	include_once "header.php";
	?>

	<div class="page-content location">
		<h1>Местоположение и контакти</h1>
		<iframe class="left" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2908.084814118463!2d27.91505401461193!3d43.20771037913916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40a4540a51058615%3A0xc23c1d2273c27e95!2z0LHRg9C7LiDigJ7QodC70LjQstC90LjRhtCw4oCcIDM0LCA5MDAwINCS0LDRgNC90LAg0KbQtdC90YLRitGALCDQktCw0YDQvdCw!5e0!3m2!1sbg!2sbg!4v1668355231109!5m2!1sbg!2sbg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
		</iframe>
		<p>
			<b>Регионална библиотека “Пенчо Славейков”</b>
			<br>
			адрес: бул. Сливница 34 
			<br>
			9000 Варна
			<br>
			Информационен център: тел./факс 052659132
			<br>
			<b>E-mail: </b>office@libvar.bg
			<br>
			<b>Работно време:</b>
			<br>
			Делник : 8.30 – 19.30 ч.
			<br>
			Събота : 9.00-18.00 ч.
			<br>
			Неделя : Почивен ден
		</p>
	</div>

	<?php
	include_once "footer.php";
	?>
</body>
</html>