<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'queuing_db';
$port = 3307;

$dsn = "mysql:host=$host;dbname=$dbname;port=$port";

$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
