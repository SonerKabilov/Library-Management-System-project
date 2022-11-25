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
            $sql = "SELECT p.paperbook_status, b.book_id, b.book_title, b.book_author, b.book_genre, b.book_isbn, b.book_publisher, b.book_publishingdate, b.book_length, b.book_description, b.book_cover FROM paperbooks p INNER JOIN books b ON p.book_id = b.book_id WHERE b.book_title='$title' AND b.book_id = '$id';";
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);

            if($queryResults > 0) {
                $row = mysqli_fetch_assoc($result);
                displayBookContent($row, "paperback");
                $status = $row['paperbook_status'];

                if(isset($_SESSION["userid"]) && $_SESSION["userrole"] == "admin") {
                    echo "<form action='#' method='post'>";
                    echo "<input class='submit' type='submit' name='submit_lend' value='Заемане на книга'>";
                    if(!$status) {
                        echo "<input class='submit' type='submit' name='submit_return' value='Връщане на книга'>";
                    }
                    else {
                        echo "<input class='submit disabled' type='submit' name='return_book' value='Връщане на книга' disabled>";
                    }

                    echo "</form>";

                    if(isset($_POST["submit_lend"])) {
                        echo "Въведете username на потребителя";
                        echo "<form action='#' method='post'><input type='text' name='user_username'>";
                        echo "<br/>";
                        
                        if($status) {
                            echo "<input class='submit' type='submit' name='lend_book'>";
                        } else {
                            echo "<input class='submit disabled' type='submit' name='lend_book' disabled>";
                            $sql_user = "SELECT u.users_username, u.users_email FROM books_taken t INNER JOIN users u ON t.users_id=u.users_id WHERE book_id='$id'";
                            $result_user = mysqli_query($conn, $sql_user);
                            $row_user = mysqli_fetch_assoc($result_user);
                            echo "<span style='color: red'> Книгата е заета от ".$row_user['users_username']."</span>";
                            echo "<br/><input class='submit' type='submit' name='send_email' value='Напомняне'/>";
                        }
                        echo "</form>";
                    } else if(isset($_POST["submit_return"])){
                        echo "
                        <div id='hide' class='confirm_return'>
                        <form action='#' method='post'>
                        <h2>Внимание!</h2>
                        <h3>Потвърждаване на връщане на книга</h3>
                        <input class='submit' type='submit' name='return_book' value='Потвърждаване'>
                        <button class='submit' onclick='hideDiv()'>Отказ</button>
                        </form>
                        </div>
                        ";
                    }
                }
            }
            else {
                include_once "not-found.php";
            }

         if(isset($_POST['lend_book'])) {
            $username = $_POST["user_username"];
            $sql_user_id = "SELECT users_id FROM users WHERE users_username ='$username'";
            $result_id = mysqli_query($conn, $sql_user_id);
            $queryResults = mysqli_num_rows($result_id);

            if($queryResults > 0) {
                $row = mysqli_fetch_assoc($result_id);
                $sql_update = "UPDATE paperbooks SET paperbook_status='0' WHERE book_id='$id'";
                $result = mysqli_query($conn,$sql_update);
                $user_id = $row["users_id"];
                $taken_date = date('Y-m-d');
                $return_date=date('Y-m-d', strtotime($taken_date. ' + 30 day'));
                $sql_insert = "INSERT INTO books_taken (users_id, book_id, taken_date, return_date) VALUES ('$user_id','$id', '$taken_date', '$return_date')";
                $result_insert = mysqli_query($conn,$sql_insert);
                header("location: book.php?id=".$id."&title=".$title);
            } else {
                echo "<span style='color: red'> Потребителят не съществува!</span>";
            }
        }

        if(isset($_POST['return_book'])) {
            $sql_update = "UPDATE paperbooks SET paperbook_status='1' WHERE book_id='$id'";
            $result_update = mysqli_query($conn,$sql_update);
            $sql_return="DELETE FROM books_taken WHERE book_id='$id'"; 
            $result_return = mysqli_query($conn,$sql_return);
            header("location: book.php?id=".$id."&title=".$title);
        }

        if(isset($_POST['send_email'])) {
            $sql = "SELECT b.book_title, u.users_email FROM books_taken t 
            INNER JOIN books b ON t.book_id = b.book_id
            INNER JOIN users u ON t.users_id = u.users_id
            WHERE b.book_id = '$id';";
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);
            if($queryResults > 0) {
                $row = mysqli_fetch_assoc($result);
                sendEmail($row["users_email"], $row["book_title"]);
            }
        }
        ?>
    </div>
</div>

<?php
include_once "join-discussion.php";
include_once "footer.php";
?>

<script type="text/javascript" src ="js/index.js"></script>
</body>
</html>