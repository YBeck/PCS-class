<?php  

$nameId = "";
$name = "";
$grade = "";
if(isset($_POST['student'])): 
    if(!empty($_POST['student']) && is_numeric($_POST['student'])):
        $nameId = $_POST['student'];
        else:
            $errors [] = "Please enter a valid student Id";
        endif;
endif;

$cs = "mysql:host=localhost;dbname=theStudents";
$user = "test";
$password = 'password';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try { 
    $db = new PDO($cs, $user, $password, $options);
    $query = "SELECT id, name FROM students GROUP BY name DESC";
    $results = $db->query($query);
    $studentOption = $results -> fetchAll(PDO::FETCH_ASSOC);
    $option = "";
    foreach($studentOption as $students):
        $option .= "<option value=" . $students['id'];
        if($nameId == $students['id']): 
            $option .= " selected";
            $name = $students['name'];
        endif; 
        $option .= ">" . $students['name'] . "</option>"; 
    endforeach;

    if(!empty($nameId)){
        $query = "SELECT grade FROM students WHERE name = :name";
        $statement = $db-> prepare($query);
        $statement -> bindValue('name', $name);
        $statement -> execute();
        $selectedStudent = $statement->fetchAll(PDO::FETCH_ASSOC);
        $grade = "";
        $delimiter = "";
        foreach($selectedStudent as $student){
            $grade .= $delimiter . $student['grade'];
            $delimiter = ", ";
         }
    }

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
    <title>students</title>
</head>
<body>
    <div class="container text-center">
        <div class="jumbotron"><h1 class="h1">Student File</h1></div>
        <div class="row">
            <div class="col-sm-8 text-right">
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
                             <?= $option ?>
                            </select>
                        </div>
                        <button name="info" type="submit" class="btn btn-primary">Get Student Info</button>
                        <button type="submit" class="btn btn-primary" name="delete">Delete a student</button>
                        <?php if(isset($_POST['info'])){ ?>
                            <h2 class="h2">Student: <?=$name?> </br>Grade:<?=$grade?></h2>
                        <?php } ?>
                        <?php if(isset($_POST['delete'])){ ?>
                            <h2 class="h2"><?=$name?> was deleted</h2>
                        <?php } ?>          
                </form>
             </div>
        <?php endif ?>
        </div>
    </div>
</body>
</html>