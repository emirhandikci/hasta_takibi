<?php


$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "";
$mysqldb="hospital";
try {
    $conn = new PDO("mysql:host=$mysqlsunucu;dbname=$mysqldb;charset=utf8", $mysqlkullanici, $mysqlsifre);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Bağlantı hatası: " . $e->getMessage();
    }
?>