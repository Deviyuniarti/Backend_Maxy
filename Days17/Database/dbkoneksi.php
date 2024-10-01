<?php
    $host = 'localhost';
    $db = 'db_data_pasien_rs';
    $user = 'root';
    $pass = '';
    $chartset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;chartset=$chartset";

    $opt = [
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES=>false,
    ];

    $dbh = new PDO($dsn, $user, $pass, $opt);
?>