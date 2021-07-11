<?php
include_once ('classes.php');
// $pdo = Tools::connect();


$user = 'CREATE TABLE users(
id int not null auto_increment primary key,
name varchar(255) not null,
email varchar(255) not null unique,
created_at timestamp default null,
updated_at timestamp default null
)DEFAULT CHARSET=utf8;';


// $pdo->exec($user);