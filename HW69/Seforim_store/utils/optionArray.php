<?php
function getArray(){
    $keyArray = ['id', 'sefer_name', 'price', 'category', 'units_in_stock', 'cat_name', 'currentPage'];
    $postArray = explode(',', $_POST['sefer']);
    $array = array_combine ($keyArray , $postArray );
    return $array;
}
?>