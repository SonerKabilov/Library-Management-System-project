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
	<title>Списания</title>
</head>
<body>
	<?php 
        include_once "header.php";
    ?>

    <div class="page-content">
        <div class="search-book">
            <form class="search-bar" action="#" method="post">
                <h2>Търсене на списания</h2>
                <input class="search_input" name="search-input" type="text">
                <input class = "submit" type="submit" name="submit" value="Търси">
            </form>
        </div>

        <div class="book-results">
            <?php
    		require_once "includes/dbh.inc.php";
            require_once "includes/functions.php";

            if(isset($_POST['submit'])) {
                $search = mysqli_real_escape_string($conn, $_POST["search-input"]);
                $sql = "SELECT * FROM books b INNER JOIN magazines m ON m.book_id = b.book_id WHERE book_title LIKE '%$search%' OR book_author LIKE '%$search%' OR book_isbn = '$search';";
            } else {
                $sql = "SELECT * FROM books b INNER JOIN magazines m ON m.book_id = b.book_id";
            }

            bookResults($conn, $sql, "magazine");
			?>
        </div>
    </div>

	<?php 
    include_once "footer.php";
    ?>
</body>
</html>