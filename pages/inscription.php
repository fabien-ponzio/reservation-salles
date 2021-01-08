<?php
session_start();
require '../config/functionT.php';
$newuser = new User();

$newuser->register('Thejeanpierre','123');
var_dump($newuser);
?>