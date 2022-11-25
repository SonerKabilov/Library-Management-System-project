<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css" type="text/css"/>
    <link rel="stylesheet" href="css/home-style.css" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <title></title>
</head>
<body>
    <?php 
    include_once "header.php";
    ?>
    
    <div class="page-content">
        <div class="container">
            <form action="includes/signup.inc.php" method = "post">
                <div class="title">Регистрация</div>
                <div class ="user-details">
                    <div class="input-box">
                        <span class="details">Потребителско име</span>
                        <input type="text" name="username" required oninvalid="this.setCustomValidity('Моля, попълнете.')" >
                    </div>
                    <div class="input-box">
                        <span class="details">E-mail</span>
                        <input type="email" name="e-mail" required oninvalid="this.setCustomValidity('Моля, попълнете.')" >
                    </div>
                    <div class="input-box">
                        <span class="details">Парола</span>
                        <input type="password" name="password" required oninvalid="this.setCustomValidity('Моля, попълнете.')" >
                    </div> 
                    <div class="input-box">
                        <span class="details">Повтори парола</span>
                        <input type="password"  name="repeatPassword" required oninvalid="this.setCustomValidity('Моля, попълнете.')" >
                    </div>
                    <br/>
                    <br/>
                    <div class="submit1">
                        <input type="submit" name="submit" value="Регистрация">
                    </div>
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