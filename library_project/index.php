<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Начало</title>
    <link rel="stylesheet" href="css/all.css"/>
    <link rel="stylesheet" href="css/home-style.css" type="text/css"/>
</head>
<body>
    <?php 
    include_once "header.php";
    ?>
    
    <div class="section1">
        <form class="search" action="search.php" method="post">
            <h2>Търсене на книга</h2>
            <input class="search_input" name="search-input" type="text">
            <input class = "submit" type="submit" name="submit" value="Търси">
        </form>
    </div>
    
    <div class="section2">
        <div class="left">
            <img  src="./img/readers.jpg" alt="readers">
        </div>
        <div class="right">
            <p><span class="title"> <b>Събития</b> </span><br><br/>
                10 Септември - 17:00 - 18:00 <br/>
                12 Септември - 15:00 - 16:00<br/>
                <b>Читателски клуб "Фентъзи"</b>
                <br/>
                <br/>
                16 Септември - 17:00 - 18:00<br/>
                18 Септември - 15:00 - 16:00<br/>
                <b>Читателски клуб "Научна фантастика"</b>
                <br/>
                <br/>
                <a class="all_events" href="all-events.php">Всички събития</a>
            </p>
        </div>
    </div>
    
    <div class="section3">
        <div class="left">
            <h3>Онлайн библиотека</h3>
            <p>Изтегляне на:</p>
        </div>
        <div class="right">
            <div class="button">
                <a href="show-ebooks.php">
                    <span><i class="fa-solid fa-book"></i></span>
                    <p>Е-книги</p>
                </a>
            </div>
            <div class="button">
                <a href="show-magazines.php">
                    <span><i class="fa-solid fa-newspaper"></i></span>
                    <p>Списания</p>
                </a>
            </div>
            <div class="button">
                <a href="show-audiobooks.php">
                    <span><i class="fa-sharp fa-solid fa-headphones-simple"></i></span>
                    <p>Аудио книги</p>
                </a>
            </div>
        </div>
    </div>  

    <?php 
    include_once "footer.php";
    ?>
</body>
</html>
