<?php

$hostname = "207.180.216.166";
$user = "user1";
$pass = "qwerty12345";
$database = 'pavel_pashkovich';
$db = new PDO('mysql:host='.$hostname.';dbname='.$database, $user, $pass);


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
global $db;