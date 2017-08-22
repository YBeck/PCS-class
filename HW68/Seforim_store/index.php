<?php
if(empty($_GET['action'])){
    $action = 'home';
}
else{
    $action = $_GET['action'];
}
switch($action){
    case 'home':
        include 'controllers/seforimController.php';
        break;
    case 'table':
        include 'controllers/tableController.php';
        break;
    case 'add':
        include 'controllers/addSeferController.php';
        break;
    case 'selected':
        include 'controllers/selectedController.php';
        break;
    case 'update':
        include 'controllers/updateController.php';
        break;
    case 'delete':
        include 'controllers/deleteController.php';
        break;
    default:
        $errors = "Can't find $action";
        break;
}
?>