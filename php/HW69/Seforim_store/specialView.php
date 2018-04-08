<?php

require 'view.php';

class SeforimView extends view{
    function renderPage(){
        /*$ret  =*/ include 'views/seforimView.php';
        /*return $ret;*/
    }
}

class SeforimTableView extends view{
    function renderPage(){
        include 'views/seforimTableView.php';
    }
}

?>