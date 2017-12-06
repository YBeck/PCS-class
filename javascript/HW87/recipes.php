<?php
require 'db.php';
if(!empty($_GET['dbid'])){
    $id = $_GET['dbid'];
}else{
    die('invalid id');
}
$db = new DB();
$con = $db->createDb();
try{
    $query = "SELECT i.name AS ing_name, r.name AS rec_name, r.url FROM ingredients i
        JOIN recipe_ingredients ri ON ri.ingredients_id = i.id
        JOIN recipes r ON r.id = ri.recipe_id
        WHERE r.id = :id";
    $statement = $con->prepare($query);
    $statement -> bindvalue('id', (int)$id, PDO::PARAM_INT);
    $statement -> execute();
    $results =  $statement->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
     die("Something went wrong " . $e->getMessage());
}
header('Content-Type: application/json');
echo json_encode($results);
?>