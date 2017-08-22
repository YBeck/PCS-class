<?php
    require_once 'db.php';
    $db = new db();
    $con = $db->createDb();

    if(isset($_POST['buy']) || isset($_GET['buy'])){
    $query = "UPDATE seforim SET units_in_stock = units_in_stock -1 
            WHERE id = :id";
        $statement = $con->prepare($query);
        $statement-> bindvalue('id', (int)$array['id'], PDO::PARAM_INT);
        $statement-> execute();
    }

    if(isset($_POST['updateForm'])){
        foreach($updateArray as $key=>$value){
            $query = "UPDATE seforim SET $key = :value 
                WHERE id = :id";
            $statement = $con->prepare($query);
            if(is_numeric($value)){
                $statement-> bindvalue('value', (int) $value, PDO::PARAM_INT);
            }else{
                $statement-> bindvalue('value', $value);
            }
            $statement-> bindvalue('id', (int)$updateId, PDO::PARAM_INT);
            $statement-> execute(); 
        }
    }
?>