<?php
require "body.php";

if(!empty($_POST['month'])):
    $month = strtoupper($_POST['month']);
else:
 $month = "";
 $errors [] = "Please enter a month";
endif;
if(!empty($_POST['year'])):
    $year = $_POST['year'];
else:
 $year = "";
 $errors [] = "Please enter a year";
endif;
if(!is_numeric($year) || $year < 1000 || $year > 9999){
    $errors[] = "Please enter a valid year between 1000 and 9999";
}

 $myCopy=array_change_key_case($months, CASE_UPPER);
 if(!array_key_exists($month, $myCopy) || is_numeric($month)):
         $errors[] = $month . " is not a valid month";
         endif;
function num_days($month, $year){
    global $myCopy;
    global $months;
    $days = "";
    if($month == "FEBRUARY"):
        if($year % 4 === 0 && ($year % 100 !== 0 || $year % 400 === 0)):
            $days = "29";
        else:
            $days = "28";
        endif;
    else:
        foreach(array_combine(array_keys($months), array_keys($myCopy)) as $lowerMonth => $upperMonth):
            if($month === $upperMonth):
                $days = $months[$lowerMonth];
                break; 
            endif;
            endforeach; 
    endif;
    return $days;  
};
?>

<body>
  <div class="container text-center">
    <div class="jumbotron"><h1 class="h1">Days Of The Month</h1></div>
    <div class="row text-center">
      <form class="form-inline">
      <?php if(!empty($errors)): ?>
           <div class="alert alert-danger col-sm-offset-4">
            <ul>
            <?php foreach ($errors as $error) { ?>
                <li> <?= $error ?> </li>
            <?php } ?>
            </ul>
        </div> 
        <?php else: ?>
            <div class="form-group">
                <label for "return"><?= $month . ", " . $year ?>:</label>
                <input class="form-control" id = "return" 
                value = "<?= 'has ' . num_days($month, $year) . ' days'?>">
            </div>
    <?php endif ?>
      </form>
    </div>
  </div>
</body>