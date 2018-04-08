<?php 
    include_once 'utils/link.php';
    include_once 'db.php';
    $db = new db();
    $con = $db->createDb();
    if(!empty($id)){
        $query = "SELECT * FROM seforim WHERE id = :id";
        $statement = $con-> prepare($query);
        $statement -> bindValue('id', $id);
        $statement -> execute();
        $selectedSefer = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
?>