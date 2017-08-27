<?php
$array = "";

if(isset($_POST['delete'])){
    include_once 'utils/optionArray.php';
    $array = getArray();
}else if(isset($_GET['delete'])){
    $array = &$_GET; //set action to referance $_GET so we can unset it
}

if(isset($_GET['delete']) || isset($_POST['delete'])){
    include_once 'views/deleteView.php';
}

if(isset($_POST['deleteSefer'])){
    if(isset($_POST['deleteId'])){
        if(!empty($_POST['deleteId']) and is_numeric($_POST['deleteId'])){
            $deleteId = &$_POST['deleteId'];
        }  
    } 
    else if(isset($_POST['sefer'])){ //$_POST['sefer'] from the second form
        if(!empty($_POST['sefer'])){
            include_once 'utils/optionArray.php';
            $array = getArray();
            $deleteId = $array['id'];
        }
    }
    include_once 'models/deleteModel.php';
    include_once 'views/deleteView.php'; 
}
?>