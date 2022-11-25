<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css" type="text/css"/>
    <link rel="stylesheet" href="css/home-style.css" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <title>Вход</title>
</head>
<body>
    <?php 
    include_once "header.php";
    ?>
    
    <div class="page-content">
        <div class="container">
            <form action="includes/login.inc.php" method = "post">
                <div class="title">Вход</div>
                
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Потребителско име/e-mail</span>
                        <input type="text" name="username" required oninvalid="this.setCustomValidity('Моля, попълнете.')" >
                    </div>
                    <div class="input-box">
                        <span class="details">Парола</span>
                        <input type="password" name="password" required oninvalid="this.setCustomValidity('Моля, попълнете.')" >
                    </div>
                    <br/>
                    <div class="submit1">
                        <input type="submit" name="submit" value="Вход">
                    </div>
                </div>
                <div class="backbuttons">
                    <br/>
                    <span class="details">Нямате акаунт?</span> 
                    <a class="registrate" href="signupform.php">Регистрация</a>
                </div>
            </form>
        </div>
    </div>
    <br/>

    <?php 
    include_once "footer.php";
    ?>
</body>
</html>
