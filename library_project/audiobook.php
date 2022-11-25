<!DOCTYPE html>
<?php 
session_start();

require_once "includes/dbh.inc.php";
require_once "includes/functions.php";

$id=mysqli_real_escape_string($conn, $_GET["id"]);
$title=mysqli_real_escape_string($conn, $_GET["title"]);
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.css" type="text/css"/>
  <link rel="stylesheet" href="css/home-style.css" type="text/css"/>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <title><?php echo $title ?></title>
</head>
<body>
  <?php 
  include_once "header.php";
  ?>

  <div class="page-content">
    <div class="book-page">
      <?php 
      $sql = "SELECT a.audiobook_file, b.book_title, b.book_author, b.book_genre, b.book_isbn, b.book_publisher, b.book_publishingdate, b.book_length, b.book_description, b.book_cover FROM audiobooks a INNER JOIN books b ON a.book_id = b.book_id WHERE b.book_title='$title' AND b.book_id = '$id';";
      $result = mysqli_query($conn, $sql);
      $queryResults = mysqli_num_rows($result);

      if($queryResults > 0) {
        $row = mysqli_fetch_assoc($result);
        displayBookContent($row, "audiobook");
      } else {
        include_once "not-found.php";
      } 
      ?>
    </div>
    <?php include_once "join-discussion.php"; ?>
  </div>

  <?php
  include_once "footer.php";
  ?>
</body>
</html>