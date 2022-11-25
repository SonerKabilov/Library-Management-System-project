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
    <title>Добавяне на книга</title>
</head>
<body>
	<?php 
    include_once "header.php";
    ?>

    <div class="page-content">
        <div class="section-addbook">
            <div class="right">
                <form action="#" method="post" enctype="multipart/form-data">
                    <h2>Добавяне</h2>
                    <table>
                        <tr>
                            <td>Формат</td>
                            <td>
                                <select class="format" id="mySelect" name="format" oninvalid="this.setCustomValidity('Моля, попълнете.')" onchange="showHide()">
                                    <option value="none" selected disabled hidden>Изберете формат</option>
                                    <option value="paperbook">Книга от хартия</option>
                                    <option value="e-book">Електронна книга</option>
                                    <option value="audio-book">Аудио книга</option>
                                    <option value="magazine">Списание</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Заглавие</td>
                            <td><input type="text" name="title" oninvalid="this.setCustomValidity('Моля, попълнете.')" ></td>
                        </tr>
                        <tr>
                            <td id="author_hidden" style="display: none;">Автор</td>
                            <td id="editor_hidden" style="display: none;">Редактор</td>
                            <td id="input_hidden" style="display: none;">
                                <input type="text" name="author" oninvalid="this.setCustomValidity('Моля, попълнете.')" >
                            </td>
                        </tr>
                        <tr>
                            <td id="genres_hidden" style="display: none;">Жанр</td>
                            <td id="bookgenres_hidden" style="display: none;">
                                <select class="genres" name="book_genres" oninvalid="this.setCustomValidity('Моля, попълнете.')">
                                    <option value="none" selected disabled hidden>Изберете жанр</option>
                                    <option value="Класически роман">Класически роман</option>
                                    <option value="Хорър">Хорър</option>
                                    <option value="Трилър">Трилър</option>
                                    <option value="Фантастика">Фантастика</option>
                                    <option value="Научна фантастика">Научна фантастика</option>
                                    <option value="Романтика">Романтика</option>
                                    <option value="Нехудожествена литература">Нехудожествена литература</option>
                                    <option value="Криминален роман">Криминален роман</option>
                                    <option value="Юношески роман">Юношески роман</option>
                                    <option value="Исторически роман">Исторически роман</option>
                                    <option value="Книги за самопомощ">Книги за самопомощ</option>
                                    <option value="Биография">Биография</option>
                                </select>
                            </td>
                            <td id="magazinegenres_hidden" style="display: none;">
                                <select class="genres" name="magazine_genres" oninvalid="this.setCustomValidity('Моля, попълнете.')">
                                    <option value="none" selected disabled hidden>Изберете жанр</option>
                                    <option value="Класически роман">Литературно списание</option>
                                    <option value="Хорър">Модно списание</option>
                                    <option value="Трилър">Спортно списание</option>
                                    <option value="Фантастика">Музикално списание</option>
                                    <option value="Научна фантастика">Научно списание</option>
                                    <option value="Романтика">Научно-популярно списание</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>ISBN</td>
                            <td>
                                <input type="text"  name="isbn" oninvalid="this.setCustomValidity('Моля, попълнете.')" >
                            </td>
                        </tr>
                        <tr>
                            <td>Издателство</td>
                            <td><input type="text"  name="publisher" oninvalid="this.setCustomValidity('Моля, попълнете.')" ></td>
                        </tr>
                        <tr>
                            <td>Година на издаване</td>
                            <td>
                                <input type="number" min="0" name="publishing_date" oninvalid="this.setCustomValidity('Моля, попълнете.')">
                            </td>
                        </tr>
                        <tr>
                            <td id="pages_hidden" style="display: none;">Брой страници</td>
                            <td id="length_hidden" style="display: none;">Продължителност</td>
                            <td id="inputlength_hidden" style="display: none;">
                                <input type="number" name="length" min="0" oninvalid="this.setCustomValidity('Моля, попълнете.')">
                            </td>
                        </tr>
                        <tr id="link_hidden" style="display: none;">
                            <td>Линк</td>
                            <td>
                                <input type="text" name="link" oninvalid="this.setCustomValidity('Моля, попълнете.')">
                            </td>
                        </tr>
                    </table>
                    <label for="description">
                        Описание
                        <br/>
                        <textarea name="description" rows="7" cols="45"></textarea> 
                    </label>
                    <table>
                        <tr>
                            <td>Корица</td>
                            <td>
                                <input type="file" name="book_cover">
                            </td>
                        </tr>
                        <tr id="ebook_hidden" style="display: none;">
                            <td>E-книга</td>
                            <td>
                                <input type="file" name="ebook">
                            </td>
                        </tr>
                        <tr id="audiobook_hidden" style="display: none;">
                            <td>Aудио книга</td>
                            <td>
                                <input type="file" name="audiobook">
                            </td>
                        </tr>
                    </table>
                    <input class='submit' type="submit" name="submit" value="Добавяне">
                </form>
            </div>
            <div class="left">
                <h2>Насоки за добавяне на книга</h2>
                <ul>
                    <li>Всички полета във формата трябва да бъдат запълнени</li>
                    <li>Книги с еднакъв ISBN не могат да бъдат добавяни в библиотеката</li>
                    <li>ISBN трябва да съдържа задължително 13 цифри</li>
                    <li>Прикаченият файл за корица трябва задължително да бъде с формат на снимка (jpg, jpeg, png)</li>
                    <li>Файлът на е-книгата трябва да бъде с формат .epub</li>
                    <li>Файлът за аудио книгата трябва да бъде с формат .mp3</li>
                </ul>
                <h2>Насоки за добавяне на списание</h2>
                <ul>
                    <li>ISBN на списание съдържа задължително 15 цифри. Последните 2 цифри отговарят на броя на списанието</li>
                </ul>
            </div>
        </div>
    </div>
    
<?php 
include_once "footer.php";
require_once "includes/dbh.inc.php";

if (isset($_POST["submit"])) {
    $result;
    $format = $_POST['format'];
    $title = $_POST['title'];
    $author= $_POST['author'];
    if($format != "magazine"){
        $genre= $_POST['book_genres'];
    } else {
        $genre= $_POST['magazine_genres'];
        $link = $_POST['link'];
    }
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];
    $publishing_date = $_POST['publishing_date'];
    $length = $_POST['length'];
    $description = $_POST['description'];
    $target_dir = "bookcovers/";
    $cover = $target_dir . basename($_FILES["book_cover"]["name"]);
    if($format == "e-book") {
        $target_dir = "ebooks/";
        $download = $target_dir . basename($_FILES["ebook"]["name"]);

        if($_FILES["ebook"]["type"] != "application/epub+zip") {
            $result = false;
            echo '<script type="text/javascript">';
            echo ' alert("Прикаченият файл за е-книга не е в подходящия формат!");';
            echo '</script>';
            exit();
        } else {
            $result = true;
        }
    } else if($format == "audio-book") {
        $target_dir = "audiobooks/";
        $audio_file = $target_dir . basename($_FILES["audiobook"]["name"]);

        if($_FILES["audiobook"]["type"] != "audio/mpeg") {
            $result = false;
            echo '<script type="text/javascript">';
            echo ' alert("Прикаченият файл за аудио книга не е в подходящия формат!");';
            echo '</script>';
            exit();
        } else {
            $result = true;
        }
    }

    if(empty($genre)) {
        $result = false;
        echo '<script type="text/javascript">';
        echo ' alert("Изберете жанр")';
        echo '</script>';
        exit();
    } else {
        $result = true;
    }

    if($format != "magazine" && strlen($isbn) != 13) {
        $result = false;
        echo '<script type="text/javascript">';
        echo ' alert("ISBN за книга трябва да съдържа задължително 13 цифри!")';
        echo '</script>';
        exit();
    } else if ($format == "magazine" && strlen($isbn) != 15) {
        $result = false;
        echo '<script type="text/javascript">';
        echo ' alert("ISBN за списание трябва да съдържа задължително 15 цифри!")';
        echo '</script>';
        exit();
    } else {
        $result = true;
    }

    $checkIsbn = mysqli_query($conn, "SELECT book_isbn FROM books WHERE book_isbn = '$isbn';");

    if(mysqli_num_rows($checkIsbn) > 0) {
        $result = false;
        echo '<script type="text/javascript">';
        echo ' alert("Книгата/списанието съществува в базата данни!")';
        echo '</script>';
        exit();
    } else {
        $result = true;
    }

    if($_FILES["book_cover"]["type"] != "image/jpg" && $_FILES["book_cover"]["type"] != "image/jpeg" && $_FILES["book_cover"]["type"] !=  "image/png") {
        $result = false;
        echo '<script type="text/javascript">';
        echo ' alert("Прикачената снимка не е в подходящият формат!");';
        echo '</script>';
        exit();
    } else {
        $result = true;
    }

    if (!empty($title) && !empty($author)  && !empty($genre) && !empty($isbn) && !empty($publisher) && !empty($publishing_date) && !empty($length)  && !empty($description) && !empty($cover) && $result == true) {
        $sql="INSERT INTO books (book_title, book_author, book_genre, book_isbn, book_publisher, book_publishingdate, book_length, book_description, book_cover) VALUES ('$title','$author', '$genre','$isbn', '$publisher', '$publishing_date', '$length', '$description', '$cover')";
        mysqli_query($conn,$sql);
        $last_id = mysqli_insert_id($conn);

        if($format == "paperbook") {
            $sql = "INSERT INTO paperbooks(book_id) VALUES ('$last_id')";
        } else if($format == "e-book" && !empty($download)) {
            $sql = "INSERT INTO ebooks(ebook_download, book_id) VALUES ('$download', '$last_id')";
        } else if($format == "audio-book" && !empty($audio_file)) {
            $sql = "INSERT INTO audiobooks(audiobook_file, book_id) VALUES ('$audio_file', '$last_id')";
        } else if($format == "magazine" && !empty($link)) {
            $sql = "INSERT INTO magazines(magazine_link, book_id) VALUES ('$link', '$last_id')";
        }
        mysqli_query($conn,$sql);
    }
}
?>

<script type="text/javascript" src ="js/index.js"></script>
</body>
</html>