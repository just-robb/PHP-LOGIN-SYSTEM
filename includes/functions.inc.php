<?php

function emptyInputSignup($email,$name,$pwd,$pwdrepeat,$username){
    if (empty($email) || empty($name) || empty($pwd) || empty($pwdrepeat) || empty($username)) {
        $result=true;  
    }
    else{
        $result=false;
    }
    return $result;
}
function invalidUid($username){
    
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result=true;
   
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
   
    }
    else{
        $result=false;
    }
    return $result;
}
function pwdMatch($pwd,$pwdrepeat){
    
    if ($pwd !== $pwdrepeat){
        $result=true;
   
    }
    else{
        $result=false;
    }
    return $result;
}

function uidExists($conn,$username,$email) {
    $sql ="SELECT * FROM  users WHERE usersUid=? OR usersEmail=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt,"ss",$username,$email);

    mysqli_stmt_execute($stmt);
 



    $resultData = mysqli_stmt_get_result($stmt);


    if ($row= mysqli_fetch_assoc($resultData)){
    return $row;
    }


    else{

    $result=false;
    return $result;
    }
    mysqli_stmt_close($stmt);
}



function createUser($conn,$name,$email,$username,$pwd) {
    $sql ="INSERT INTO users (usersName,usersEmail,usersUid,userspwd) VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

     $hashedepwd=password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedepwd);

    mysqli_stmt_execute($stmt);
 

    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
        exit();

}

function emptyInputLogin($username,$pwd){
    if (empty($username) || empty($pwd)) {
        $result=true;  
    }
    else{
        $result=false;
    }
    return $result;
}



function loginUser($conn,$username,$pwd){

 $uidExists = uidExists($conn,$username,$username); 

 if ($uidExists==false) {
    header("location: ../login.php?error=wronglogin");
        exit();
    
 }

 $pwdHashed= $uidExists["usersPwd"];
 $checkPwd =password_verify($pwd,$pwdHashed);

 if ($checkPwd==false) {
    header("location: ../login.php?error=wronglogin");
        exit();
    
 }
 else if($checkPwd==true){
    session_start();
    $_SESSION["userid"]=$uidExists["usersId"];
    $_SESSION["userid"]=$uidExists["usersUid"];
    header("location: ../index.php");
        exit();


 }
}
 

