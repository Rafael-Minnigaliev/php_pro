<?php
try {
    $connect = new PDO('mysql:dbname=gallery;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
}
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);