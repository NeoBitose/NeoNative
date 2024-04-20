<?php 

$app_name = '/localhost/app';
$url = 'http:/'.$app_name;

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_';

try {
  $conn = new mysqli($host, $username, $password, $database);
} catch (\Throwable $e) {

  header('Location: '.$url.'/views/errors/500.php?message='.$e);
}

