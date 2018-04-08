<?php 
include 'db.php';
try{
    $query = "SELECT name FROM categories";
    $results = $db -> query($query);
    $checkbox = $results -> fetchAll(PDO::FETCH_COLUMN);
}catch(PDOException $e){
     die("Something went wrong " . $e->getMessage());
}

?>