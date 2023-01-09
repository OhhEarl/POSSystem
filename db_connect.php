<?php

define('DB_HOST' , 'localhost');
define('DB_USER' , 'Earl');
define('DB_PASS' , '123456');
define('DB_NAME' , 'bikerental');

//create connection

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME)or die('connection failed');




?>