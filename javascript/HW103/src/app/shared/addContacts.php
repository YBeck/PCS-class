<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: authorization, content-type, responseType, X-Requested-With");
header("Access-Control-Allow-Methods: POST, OPTIONS");

include 'db.php';
$contactObj = [];
$db = new DB();
$db = new db();
$con = $db->createDb();
$_POST = json_decode(file_get_contents('php://input'), true);

try{
    $insert = "INSERT INTO contacts(first_name, last_name, email, phone)
        VALUES(:first, :last, :email, :phone)";
    $statement = $con->prepare($insert);
    $statement->bindvalue('first', $_POST['first_name']);
    $statement->bindvalue('last', $_POST['last_name']);
    $statement->bindvalue('email', $_POST['email']);
    $statement->bindvalue('phone', $_POST['phone']);
    $statement->execute();
}catch(PDOException $e){
    echo "something went wrong with adding " . $e; 
}
  
?>