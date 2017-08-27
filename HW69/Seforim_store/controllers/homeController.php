<?php

include 'specialView.php';
include 'filterController.php';
include 'sortController.php';
include_once 'utils/optionArray.php';
$seferId = "";
if(isset($_POST['sefer'])):
    if(!empty($_POST['sefer'])):
        $seferId = getArray()['id']; //from optionArray.php
    else:
        $errors [] = "Please enter a Sefer";
    endif;        
endif;

include 'offsetController.php';
include 'models/updateModel.php';
include 'models/seforimModel.php';
//include 'views/seforimView.php';
$view = new SeforimView ();
$view->render();
var_dump($view->render());
?>