<?php

try{
    $pdo = new PDO("mysql:dbname=upload;host=localhost;charset=utf8", "root", "");
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}