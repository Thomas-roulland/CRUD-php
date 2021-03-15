<?php

function connect(string $dbname){
    $dbo=null;
    try {
        $dbo = new PDO("mysql:host=127.0.0.1;dbname=$dbname;charset=UTF8", 'root', '');
        $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        return $dbo;
    }catch(\PDOException $e){
        return false;
    }
}