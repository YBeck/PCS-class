<?php
abstract class View{

    abstract function renderPage();
        
    function render(){
        $ret = include 'views/top.php';;
        $ret .= $this->renderPage();
        $ret .= include 'views/bottom.php';;
        return $ret;
    }
}
?>