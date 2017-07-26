<?php 
    include 'db.php';
    if(!empty($id)){
        $query = "SELECT * FROM seforim WHERE id = :id";
        $statement = $db-> prepare($query);
        $statement -> bindValue('id', $id);
        $statement -> execute();
        $selectedSefer = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
?>