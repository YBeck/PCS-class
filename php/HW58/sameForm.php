<?php
    $name="";
    $email="";
    $age="";
    $rate="";
    var_dump ($_POST);
    // if($_SERVER["REQUEST_METHOD"] === "POST"):
    if($_POST || $_GET):
    var_dump ($_POST);
        if(isset($_POST['name'])):
            $name= $_POST['name'];
        endif;
        if(isset($_POST['email'])):
            $email = $_POST['email'];
        endif;
        if(isset($_POST['age'])):
            $age = $_POST['age'];
        endif;
        if(isset($_POST['rate'])):
            $rate = $_POST['rate'];
        endif;
        if(empty($name)){
            $errors[] = "Name is a required field!";
        }
        if(is_numeric($name)){
             $errors[] = "Please enter a valid name!";
        }
        if(empty($email)){
            $errors[] = "Please enter a valid email address!";
        }
        if(empty($age)){
            $errors[] = "Please enter a valid age!";
        }
        if($age < 0 || $age > 120){
            $errors[] = "Age must be from 0-120!"; 
        }
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css">
    <style>
        .well{
            background-color: transparent;
            border: none;
            box-shadow: none;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php if($_SERVER["REQUEST_METHOD"] === "GET"): ?>
            <h1 class="h1 text-center">Form</h1>
            <?php else : ?>
                <h1 class="h1 text-center">Your Information</h1>
        <?php endif ?>
        <form class="form-horizontal" method="post">
            <?php if(isset($errors)): ?>
                    <div class="well text-danger col-sm-offset-4">
                        <ul>
                        <?php foreach ($errors as $error) { ?>
                            <li> <?= $error ?> </li>
                        <?php } ?>
                        </ul>
                    </div>
                   <?php endif; ?>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-3" for="name">Name:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $name?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-3" for="email">Email:</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $email?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-3" for="age">Age:</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="age" name="age" value="<?= $age ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 col-sm-offset-3" for="rate">Rate Us:</label>
                <div class="col-sm-4">
                    <?php if(isset($errors) || $_SERVER["REQUEST_METHOD"] === "GET"): ?>
                        <input type="range" class="form-control" min="1" max="10" id="rate" name="rate" value="<?= $rate ?>">
                    <?php else: ?>
                        <input type="number" class="form-control" min="1" max="10" id="rate" name="rate" value="<?= $rate ?>">
                    <?php endif ?>
                </div>
            </div>
            <?php if(isset($errors) || $_SERVER["REQUEST_METHOD"] === "GET"): ?>
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <?php endif ?>
        </form>
        </div>
                <!--script src="/jquery-1.12.4.min.js"></script-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--script src="/bootstrap-3.3.7/js/bootstrap.min.js">

    </script-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</body>
</html>
    