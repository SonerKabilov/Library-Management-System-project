<?php 
    function emptyInput($username, $password, $repeatPassword, $email) {
        $result;
        if(empty($username) || empty($password) || empty($repeatPassword) || empty($email)){
            $result=true;
        }
        else{
            $result=false;
        }
        return $result;
    }

    function invalidUsername($username) {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result=true;
        }
        else{
            $result=false;
        }
        return $result;
    }

    function passwordMatch($password, $repeatPassword){
        $result;
        if($password !== $repeatPassword){
            $result=true;
        }
        else{
            $result=false;
        }
        return $result;
    }

    function usernameTakenCheck($conn, $username, $email){
        $sql = "SELECT * FROM users WHERE users_username = ? OR users_email = ?;";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signupform.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $sqlResult = mysqli_stmt_get_result($stmt);
        $result;

        if($row = mysqli_fetch_assoc($sqlResult)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $username, $password, $email, $role){
        $sql = "INSERT INTO users(users_username, users_password,users_email,users_role) VALUES(?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signupform.php?error=stmtfailed");
            exit();
        }

        $hashedpassword=password_hash($password,PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedpassword, $email, $role);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../index.php?error=none");
        exit();
    }

    function emptyInputLogin($username, $password){
        $result;
        if(empty($username) || empty($password)){
            $result=true;
        }
        else{
            $result=false;
        }
        return $result;
    }

    function loginUser($conn, $username, $password) {
        $usernameTaken = usernameTakenCheck($conn, $username, $username);

        if($usernameTaken === false) {
            header("location: ../loginform.php?error=wronglogin");
            exit();
        }

        $passwordHashed = $usernameTaken["users_password"];
        $checkPwd = password_verify($password, $passwordHashed);

        if($checkPwd === false) {
            header("location: ../loginform.php?error=wrongpassword");
            exit();
        }
        else if($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $usernameTaken["users_id"];
            $_SESSION["userusername"] = $usernameTaken["users_username"];
            $_SESSION["userrole"] = $usernameTaken["users_role"];

            header("location: ../index.php");
            exit();
        }
    }

    function bookResults($conn, $sql, $format) {
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
        
        if($queryResults > 0) {
            echo "Намерени са ".$queryResults." резултата <br/>";
            echo "<hr style='border-top:1.5px solid black;'/>";
            while ($row = mysqli_fetch_assoc($result)) {
                if($format == "paperbook") {
                    echo "<a href='book.php?id=".$row['book_id']."&title=".$row['book_title']."'>";
                } else if($format == "ebook") {
                    echo "<a href='ebook.php?id=".$row['book_id']."&title=".$row['book_title']."'>";
                } else if($format == "audiobook") {
                    echo "<a href='audiobook.php?id=".$row['book_id']."&title=".$row['book_title']."'>";
                } else if($format == "magazine") {
                    echo "<a href='magazine.php?id=".$row['book_id']."&title=".$row['book_title']."'>";
                }

                echo "<div class='book'>";
                echo "<div class='left'><img src ='img/".$row['book_cover']."'/></div>";
                echo "<div class='right'>";
                echo "<h3>".$row['book_title']."</h3>";
                echo "<p>от ".$row['book_author']."</p><br/>";
                echo "<p>".$row['book_genre']."</p>";
                if($format == "paperbook") {
                    if($row['paperbook_status']) {
                    echo "<p class='status'>Статус: <span style='background-color:lightgreen'>книгата е налична</span></p>";
                    } else {
                        echo "<p class='status'>Статус: <span style='background-color:rgb(255, 82, 82)'>книгата е заета</span></p>";
                    }
                }
                echo "</div>";
                echo "</div></a><hr/>";
            }
        }
        else {
            include_once "not-found.php";
        }
    }

    function displayBookContent($row, $format) {
        echo "<div class='book extended-information'>";
        echo "<div class='left'><img src ='img/".$row['book_cover']."'/></div>";
        echo "<div class='right'>";
        echo "<h1>".$row['book_title']."</h1>";
        echo "<p class='book-title'>".$row['book_author']."</p><br/>";
        echo "<p class='description'>".$row['book_description']."</p><br/>";
        echo "<table>";
        echo "<tr><td>Жанр</td><td>".$row['book_genre']."</td></tr>";
        echo "<tr><td><h4>За изданието</h4></td></tr>";
        echo "<tr><td>ISBN</td><td>".$row['book_isbn']."</td></tr>";
        echo "<tr><td>Издадено</td><td>".$row['book_publishingdate']." от ".$row['book_publisher']."</td></tr>";
        if($format != "audiobook") {
            echo "<tr><td>Брой страници</td><td>".$row['book_length']."</td></tr>";
        } else {
            echo "<tr><td>Продължителност</td><td>".$row['book_length']." мин.</td></tr>";
        }
        
        if($format == "ebook") {
            echo "<tr><td>Изтегляне на книгата</td><td><a href='".$row['ebook_download']."' download>изтегляне</а></td></tr>";
        } else if($format == "audiobook") {
            echo "
                <tr>
                    <td>
                        <audio controls>
                            <source src='".$row['audiobook_file']."' type='audio/mpeg'>
                            Your browser does not support the audio element.
                        </audio>
                    </td>
                </tr>";
        } else if($format == "magazine") {
            echo "<tr><td>Повече информация</td><td><a href='".$row["magazine_link"]."' target='_blank'>тук</a></td></tr>";
        }
        
        echo "</table>";
        echo "</div>";
        echo "</div>";
    }

    function sendEmail($useremail, $book) {
        $to = $useremail;
        $subject = 'Напомняне!';
        $message = 'Напомняме ви, че книгата "'.$book.'"" се намира във вас!';
        $headers = "From: sonerkabilov@gmail.com\r\n";
        if (mail($to, $subject, $message, $headers)) {
            echo "Имейлът е успешно изпратен";
        } else {
            echo "Имейлът не е успешно изпратен";
        }
    }