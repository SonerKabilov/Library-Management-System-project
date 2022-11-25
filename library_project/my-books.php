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
	<title>Моите книги</title>
</head>
<body>
	<?php 
	include_once "header.php";
	?>

	<div class="page-content">
		<div class="book-results">
			<?php
			require_once "includes/dbh.inc.php";
			
			$userid=$_SESSION["userid"];
			$sql = "SELECT t.book_id,t.taken_date,t.return_date, b.book_title, b.book_author, b.book_cover, b.book_genre FROM books_taken t INNER JOIN books b ON t.book_id=b.book_id WHERE users_id='$userid'";
			$result = mysqli_query($conn, $sql);
			$queryResults = mysqli_num_rows($result);

			if($queryResults > 0) {
				echo "<table class='my-books'>
				<tr class='table-head'>
				<th>Корица</th>
				<th>Заглавие</th>
				<th>Автор</th>
				<th>Дата на вземане</th>
				<th>Дата на връщане</th>
				</tr>";

				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr class='table-data'>";
					echo "<td>"."<a href='book.php?id=".$row['book_id']."&title=".$row['book_title']."'>"."<img src ='img/".$row['book_cover']."'/></a></td>";
					echo "<td>"."<a href='book.php?id=".$row['book_id']."&title=".$row['book_title']."'>".$row['book_title']."</a></td>";
					echo "<td>".$row['book_author']."</td>";
					echo "<td>".$row['taken_date']."</td>";
					echo "<td>".$row['return_date']."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			else {
				include_once "not-found.php";
			}
			?>
		</div>
	</div>
	
	<?php 
	include_once "footer.php";
	?>
</body>
</html>