<?php
    $dsn  = "mysql:host=localhost; dbname=crud_ajax2";
    $user = "root";
    $pass = "";

    try {
        $pdo = new  PDO($dsn,$user,$pass);
    } catch(PDOException $e) {
        echo "Connection error!". $e->getMessage();
    }

?>