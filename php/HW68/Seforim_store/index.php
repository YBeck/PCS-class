<?php
if(empty($_GET['action'])){
    $action = 'home';
}
else{
    $action = $_GET['action'];
}

include "controllers/" . $action . "Controller.php";
?>