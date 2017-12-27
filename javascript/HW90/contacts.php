<?php
Header ('set Access-Control-Allow-Origin: http://localhost');
include 'db.php';
$contactObj = [];
$db = new DB();
$db = new db();
$con = $db->createDb();

if(isset($_GET['load'])){
    try{
        $query = "SELECT * FROM contacts";
        $results = $con -> query($query);
        $contacts = $results -> fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        die("Something went wrong " . $e->getMessage());
    }
    header('Content-Type: application/json');
    echo json_encode($contacts); 
}else if(isset($_POST['add'])){
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
    
}else if(isset($_POST['update'])){
    try{
        $update = "UPDATE contacts SET first_name = :first_name,
            last_name = :last_name, email = :email, phone = :phone
            WHERE id = :updateId";
        $statement2= $con->prepare($update);
        $statement2->bindvalue('first_name', $_POST['first_name']);
        $statement2->bindvalue('last_name', $_POST['last_name']);
        $statement2->bindvalue('email', $_POST['email']);
        $statement2->bindvalue('phone', $_POST['phone']);
        $statement2->bindvalue('updateId', $_POST['updateId']);
        $statement2->execute();
    }catch(PDOException $e){
        echo "something went wrong with adding " . $e;
    }
}else if(isset($_POST['delete'])){
     try{
        $delete = "DELETE FROM contacts
            WHERE id = :id";
        $statement3= $con->prepare($delete);
        $statement3->bindvalue('id', $_POST['id']);
        $statement3->execute();
    }catch(PDOException $e){
        echo "something went wrong with adding " . $e;
    }
}


?>