<?php
    require_once 'db.php';
    $db = new db();
    $con = $db->createDb();
if(isset($_POST['deleteSefer'])){
        $query = "DELETE FROM seforim WHERE id = :id";
        $statement = $con-> prepare($query);
        $statement -> bindValue('id', (int)$deleteId, PDO::PARAM_INT);
        $statement -> execute();
    }     
?>