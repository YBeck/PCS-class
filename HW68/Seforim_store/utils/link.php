<?php
function getLink($linkArray = []){
    $linkString = "index.php?";
    $replace = array_merge($_GET, $linkArray);
    $linkString .= http_build_query($replace); 
    return $linkString;   
}
?>