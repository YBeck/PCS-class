<?php
include 'db.php';
$contactObj = [];
$db = new DB();
$db = new db();
$con = $db->createDb();
try{
    $query = "SELECT * FROM contacts";
    $results = $con -> query($query);
    $contacts = $results -> fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
     die("Something went wrong " . $e->getMessage());
}
header('Content-Type: application/json');
echo json_encode($contacts);

?>