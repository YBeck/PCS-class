<?php
include 'filterController.php';
    if(isset($_GET['sefer'])):
        $name = $_GET['sefer'];
        if(empty($name)):
            $errors [] = "Please enter a Sefer";
        endif;
    else:
        $name = "";
    endif;
include 'offsetController.php';
include 'models/seforimModel.php';
include 'views/seforimView.php';
?>