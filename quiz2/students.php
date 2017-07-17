<?php  

$name = "";
if(isset($_POST['student'])):
        $name = $_POST['student'];
        var_dump($name);
        if(empty($name)):
            $errors [] = "Please enter a student";
        endif;
    endif;

    // if(isset($POST['grade'])):
    //     $grade = $_POST['grade'];
    //     if(empty($grade)):
    //         $errors [] = "Please enter a grade";
    //     endif;
    // else:
    //     $grade = "";
    // endif;
  




$cs = "mysql:host=localhost;dbname=theStudents";
$user = "test";
$password = 'password';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try { 
    $db = new PDO($cs, $user, $password, $options);
    $query = "SELECT name, grade FROM students";
            $results = $db->query($query);
            $studentOption = $results -> fetchAll();

    if(isset($_POST['delete']) && empty($errors)){
        $delete = "DELETE FROM students WHERE name = :name";
        $statement = $db-> prepare($delete);
        $statement -> bindValue('name', $name);
        $statement -> execute();
    }
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
    <title>Document</title>
</head>
<body>
    <div class="container text-center">
        <div class="jumbotron"><h1 class="h1">Student File</h1></div>
        <div class="row">
            <div class="col-sm-7 text-right">
                <form class="form-inline" method="post">
                    <?php if(isset($errors)): ?>
                        <div class="alert alert-danger col-sm-offset-4">
                            <ul>
                            <?php foreach ($errors as $error) { ?>
                                <li> <?= $error ?> </li>
                            <?php } ?>
                            </ul>
                        </div> 
                    <?php else: ?>
                        <div class="form-group">
                            <label for="sefer">Choose a Student</label>
                            <select class="form-control" id="student" name="student" required>
                            <?php foreach($studentOption as $students):?>
                                <option
                                <?php if($name === $students['name']): 
                                echo "selected"; 
                                $hisName =  $students['name'];
                                $grade =  $students['grade'];
                                  endif ?> 
                                ><?= $students['name']?></option> 
                            <?php endforeach ?>
                            </select>
                        </div>
                        <button name="info" type="submit" class="btn btn-primary">Get Student Info</button>
                        <?php if(!empty($name)){ ?>
                            <h2 class="h2">The Student is: <?= $hisName ?> Grade: <?= $grade ?></h2>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary" name="delete">Delete a student</button>
                </form>
             </div>
            <!-- <div class="col-sm-1 text-left">
                <form class="form-inline" method="post">
                <button type="submit" class="btn btn-primary" name="delete">Delete a student</button>
                </form>
            </div>  -->
        <?php endif ?>
        </div>
    </div>
</body>
</html>