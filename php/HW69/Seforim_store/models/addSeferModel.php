<?php
//require 'db.php';
$seferName = "";
$priceEntered = "";
$categoryEntered = "";
$quantity = 0;

if(isset($_POST['seferEntered'])){
    if(empty($_POST['seferEntered'])){
        $errors[] = "please enter a Sefer";
    }else{
        $seferName = $_POST['seferEntered'];
    }
}

if(isset($_POST['priceEntered'])){
    if(empty($_POST['priceEntered']) || !is_numeric($_POST['priceEntered'])){ 
        $errors[] = "please enter a valid price";
    }else{
        $priceEntered = $_POST['priceEntered'];
    }
}

if(isset($_POST['categoryEntered'])){
    if(empty($_POST['categoryEntered'])){
        $errors[] = "please enter a Sefer";
    }else{
        $categoryEntered = $_POST['categoryEntered'];
    }
}

if(isset($_POST['quantity'])){
    if(!empty($_POST['quantity']) && is_numeric($_POST['quantity'])){
        $quantity = $_POST['quantity'];
    }
}


if(!empty($seferName) && !empty($priceEntered) && !empty($categoryEntered)){
    $insert = "INSERT INTO seforim (name, price, category, units_in_stock) VALUES (:seferName, :priceEntered, :category, :quantity)";
    $statement = $con-> prepare($insert);
    $statement -> bindValue('seferName', $seferName);
    $statement -> bindValue('priceEntered', $priceEntered);
    $statement -> bindValue('category', $categoryEntered);
    $statement -> bindValue('quantity', $quantity);
    $rowsAmount =$statement -> execute();
}
?>