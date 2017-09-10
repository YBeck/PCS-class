<?php
include_once 'cart.php'; 
if(isset($_GET['name']) && isset($_GET['quantity']) && is_numeric($_GET['quantity'])
        && $_GET['quantity'] > 0){
   $name = $_GET['name'] ;
   $quantity = $_GET['quantity'];
   $cart = new Cart();
   $cart->addItem($name, $quantity);
}
include 'index.php';

?>