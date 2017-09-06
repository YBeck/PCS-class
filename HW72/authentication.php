<?php
session_start();
require_once 'db.php';
if(isset($_POST['userName'])){
    $userName = $_POST['userName'];
}

if(isset($_POST['password'])){
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
}
if(!empty($userName) && !empty($password)){
    $db = new db();
    $con = $db->createDb();

    $insert = "INSERT INTO authentication (user_name, password) VALUES (:userName, :password)";
        $statement = $con-> prepare($insert);
        $statement -> bindValue('userName', $userName);
        $statement -> bindValue('password', $hash);
        $rowsAmount =$statement -> execute();
    
    header("Location:index.php");
}


if(isset($_POST['loginName'])){
    $loginName = $_POST['loginName'];
}

if(isset($_POST['loginpassword'])){
    $loginPassword = $_POST['loginpassword'];

}
if(isset($_POST['loginpassword']) && isset($_POST['loginName'])){
        $db = new db();
        $con = $db->createDb();
    $query = "SELECT password FROM authentication WHERE user_name = :name";

            $statement = $con-> prepare($query);
            $statement -> bindValue('name', $loginName);
            $statement -> execute();
            $hashPass = $statement -> fetch();

    if(password_verify($loginPassword, $hashPass['password'])){
        $_SESSION['verifiedUsers'] = ['user_name' => $loginName, 'password' => $loginPassword];
        header("Location:welcome.php");
   // include 'welcome.php';     
    }
    else{
        $verify = false;
        // header("Location:login.php");
        include 'login.php';
    }
    
}

if(isset($_POST['logout'])){
    unset($_SESSION['verifiedUsers']);
    $logout = true;
    // header("Location:login.php");
    include 'login.php';
    
}


?>