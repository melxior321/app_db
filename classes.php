<?php


$dsn ='mysql:host=localhost:3306;dbname=crud1';

$username = 'root';

$password = '123456';

$options = [];

try {

$connection =new PDO($dsn, $username, $password, $options);

} catch(PDOException $e) {

}
