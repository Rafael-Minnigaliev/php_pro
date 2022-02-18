<?php
define('DB', 'mysql');
define('HOST', 'localhost');
define('DBNAME', 'shop');
define('LOGIN', 'root');
define('PASS', 'root');

$connect_str = DB.":host=".HOST.";dbname=".DBNAME;
$db = new PDO($connect_str, LOGIN, PASS);


