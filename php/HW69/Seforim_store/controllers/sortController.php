<?php
$sort = "";
if(isset($_GET['sort'])){
    if(!empty($_GET['sort'])){
        $sort = urldecode($_GET['sort']);
    }
}
?>