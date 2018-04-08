<?php
    $color = "black";
    $font = "\"Helvetica Neue\",Helvetica,Arial,sans-serif";

    if(!empty($_GET['color'])) {
        $color =urldecode($_GET['color']);
    }
    if(!empty($_GET['font'])){
        $font = $_GET['font'];
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
        <title>Document</title>
        <style>
            body {
                padding-top: 70px;
                 padding-bottom: 70px;
                <?php if(!empty($styles)) {
                    foreach($styles as $style) {
                        echo $style;   
                    }
                }
                ?>
                color: <?= $color ?>;
                font-family: <?= $font ?>;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="times_table.php">Homework 60</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="times_table.php">Times table</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </div>
        </nav>

<form class="form-group text-center">
    <label for="color">Pick a color</label>
    <input type="color" id="color" name="color">
    <button type="submit" class="btn btn-primary btn-xs">Submit</button>
</form>
