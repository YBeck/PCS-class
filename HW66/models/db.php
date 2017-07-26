<?php

$cs = "mysql:host=localhost;dbname=seforim_store";
$user = "test";
$password = 'password';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try { 
    $db = new PDO($cs, $user, $password, $options);
} catch(PDOException $e) {
    die("Something went wrong " . $e->getMessage());
}

?>
