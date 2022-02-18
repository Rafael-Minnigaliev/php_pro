<?php
define('DB', 'mysql');
define('DBHOST', 'localhost');
define('DBNAME', 'catalog');
define('USERNAME', 'root');
define('PASS', 'root');

$connect_str = DB. ":host=". DBHOST. ";dbname=". DBNAME;
$db = new PDO($connect_str, USERNAME, PASS);