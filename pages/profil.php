<?php
session_start();
require '../config/functionT.php';
$newuser = new User();

$newuser->update('Thejeanjean','123');
var_dump($newuser);