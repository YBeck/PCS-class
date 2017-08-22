<?php
if(!empty($_GET['id'])){
    $id = $_GET['id'];
}
include 'models/selectedModel.php';
include 'views/selectedView.php';
?>
