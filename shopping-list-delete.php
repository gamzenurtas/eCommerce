
<?php
require 'config.php';

$id1 = $_GET['a'];

$connect->exec("DELETE from shopping_list where listID = $id1");

require 'wishlist.php';
?>

