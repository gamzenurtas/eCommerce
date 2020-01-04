
<?php
require 'config.php';

$id1 = $_GET['a'];

$connect->exec("DELETE from shoppingcart where cartID = $id1");

?>

