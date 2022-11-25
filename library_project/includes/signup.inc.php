<?php
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $repeatPassword=$_POST["repeatPassword"]; 
    $email=$_POST["e-mail"];
    $role = "user";

    require_once "dbh.inc.php";
    require_once "functions.php";

    if(emptyInput($username, $password, $repeatPassword, $email) !== false) {
        header("location: ../signupform.php?error=emptyinput");
        exit();
    }
    if(invalidUsername($username) !== false){
        header("location: ../signupform.php?error=username");
        exit();
    }
    if(passwordMatch($password, $repeatPassword) !== false){
        header("location: ../signupform.php?error=passwordmatch");
        exit();
    }
    if(usernameTakenCheck($conn, $username, $email) !== false){
        header("location: ../signupform.php?error=useroremailtaken");
        exit();
    } 

    createUser($conn, $username, $password, $email, $role);
}
else {
    header("location: ../signupform.php");
    exit();
}