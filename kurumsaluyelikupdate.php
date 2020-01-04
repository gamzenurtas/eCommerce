<?php
include 'config.php';
$userId = $_SESSION['UserID'];

$accountemail = $_GET["account-email"];
$accountpassword = $_GET["account-password"];
$accountfirstname = $_GET["account-first-name"];
$accountlastname = $_GET["account-last-name"];
$accountphone = $_GET["account-phone"];
$connect->exec("UPDATE customers SET UserEmail = '$accountemail',
UserPassword = '$accountpassword',
UserFirstName = '$accountfirstname',
UserLastName = '$accountlastname',
UserPhone = '$accountphone' WHERE UserID = '$userId'");

require 'account.php';
?>