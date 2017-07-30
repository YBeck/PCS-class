<?php
require 'db.php';
 $seferName = "";
 $priceEntered = "";
if(isset($_POST['seferEntered'])){
    $seferName = $_POST['seferEntered'];
    if(empty($seferName)){
        $errors[] = "please enter a Sefer";
    }
}

if(isset($_POST['priceEntered'])){
    $priceEntered = $_POST['priceEntered'];
    if(empty($priceEntered)){
        $errors[] = "please enter a price";
    }
}

if(isset($_POST['seferEntered']) && isset($_POST['priceEntered']) && empty($errors)){
    $insert = "INSERT INTO seforim (name, price) VALUES (:seferName, :priceEntered)";
    $statement = $db-> prepare($insert);
    $statement -> bindValue('seferName', $seferName);
    $statement -> bindValue('priceEntered', $priceEntered);
    $rowsAmount =$statement -> execute();
}
?>