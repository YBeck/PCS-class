<?php
$offset = 0;
$next = 4;
$previous = 0;
if(isset($_GET['offset'])){
    $offset = $_GET['offset'];
    $next = $offset + 4;
    if($offset >= 4){
        $previous = $offset - 4;
    }
}
?>