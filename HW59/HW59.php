<?php
    $name = "";
    $years = "";
    $favoriteLang[] ="";

    $language = [
        "Java",
        "MYSQL",
        "HTML/css",
        "php"
    ];

    if($_GET || $_POST){ // will return false the first time
        if(empty($_GET['name'])){
            $errors[] = "Name is required!";
        }
        else{
            $name = $_GET['name'];
        }
        if(empty($_GET['years'])){
            $errors[] = "Years are required!";
        }
        else{
            $years = $_GET['years'];
        }
        if($years < 0 || $years >50){
            $errors[] = "Years are from 0 - 50";
        }
        if(empty($_GET['code'])){
            $errors[] = "Language is required!";
        }
        else{
            $favoriteLang = $_GET['code'];
            foreach($favoriteLang as $input):
                if(!in_array($input, $language)){
                    $errors[] = $input . " is not a valid language!";            
            }
            endforeach;
        }

    };
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
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center"><h2 class="h2">Coding Form</h2></div>
        <form class="form-horizontal">
            <?php if(!empty($errors)): ?>
                <div class="alert alert-danger col-sm-offset-4">
                    <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li> <?= $error ?> </li>
                    <?php } ?>
                    </ul>
                </div>       
                   <?php endif; ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                     <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?= $name?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="years ">Years coding:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="years" 
                         min="0" max="50" name="years" placeholder="Enter amount of years" value="<?= $years?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="coding">Language:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="coding" name="code[]" multiple required>
                    <?php foreach($language as $value) : ?>
                        <option  
                          <?php if(in_array($value, $favoriteLang)){
                                    echo "selected";
                          }
                        ?>
                        > <!--  option closing tag -->
                    <?= $value ?>  
                     </option> 
                    <?php endforeach;  ?>
                   
                    </select>
                </div>
            </div>
            <?php if(empty($errors) && ($_GET || $_POST)) { ?> <!-- if no errors and its not the 
                    first time the form is shown -->
                <div class="alert alert-success col-sm-offset-4">Thanks for submitting your data.</div>
              <?php  }
              else { ?>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
</body>
</html>