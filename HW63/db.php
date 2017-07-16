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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css">
    <title>seforim</title>
</head>
<body>