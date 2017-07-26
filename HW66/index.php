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
    default:
        $errors = "Can't find $action";
        break;

}

?>