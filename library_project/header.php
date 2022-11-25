<script type="text/javascript" src ="js/index.js"></script>
<header>
    <div class="left">
        <a class = "homepage" href="index.php">
            <img class="logo" src="./img/logo.png" alt="logo"/>
            <p>Регионална<br/> библиотека</p>
        </a>
    </div>
    <div class="right">
        <div class="header-links" id="myLinks">
            <ul>
                <li><a class="header_link" href="about-us.php">За нас</a></li>
                <li class="margin"><a class="header_link" href="location.php">Локация</a></li>
                <?php
                if(isset($_SESSION["userid"])){
                ?>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">
                                <span class="show-icon"><i class="fa-solid fa-user"></i></span>
                                <span class="show-text">Профил</span>
                            </button>
                            <div class="dropdown-content">
                                <p class="hide-element"><?php echo $_SESSION["userusername"]; ?></p>
                                <hr class="hide-element">
                                <?php 
                                if($_SESSION["userrole"] == "admin") {?>
                                    <a href="add-book.php">Добавяне</a>
                                <?php 
                                }
                                ?> 
                                    <a href="my-books.php">Моите книги</a>
                                    <a href="includes/logout.inc.php">Изход</a>
                            </div>
                        </div>
                    </li>
                <?php }
                else {
                ?>
                    <li class="margin"><a class="login_button" href="loginform.php">Вход</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <a href="#" class="toggle-button" onclick="displayHeader()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
    </div>
</header>