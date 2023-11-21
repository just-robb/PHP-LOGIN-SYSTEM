<?php
if (isset($_POST["submit"])) {
    $email=$_POST["email"];
    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $pwdrepeat=$_POST["pwdrepeat"];
    $name=$_POST["name"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($email,$name,$pwd,$pwdrepeat,$username) !==false){
        header("location: ../signup.php?error=emptyinput");
        exit();

    }
    if(invalidUid($username) !==false){
        header("location: ../signup.php?error=invalid uid");
        exit();

    }
    if(invalidEmail($email) !==false){
        header("location: ../signup.php?error=invalid email");
        exit();


    }
    if(pwdMatch($pwd,$pwdrepeat) !==false){
        header("location: ../signup.php?error=password dont match");
        exit();


    }
    if(uidExists($conn,$username,$email) !==false){
        header("location: ../signup.php?error=usernametaken");
        exit();


    }
    
    createUser($conn,$name,$email,$pwd,$pwdrepeat,$username);
}
else{
    header("location: ../signup.php");

}