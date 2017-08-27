<?php 
include_once 'db.php';
    $db = new db();
    $con = $db->createDb();
try{
    $query = "SELECT * FROM categories";
    $results = $con -> query($query);
    $checkbox = $results -> fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
     die("Something went wrong " . $e->getMessage());
}

?>