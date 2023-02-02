<?php

require './User.php';

// Nouvelle instance

$user = new User('Clark', 'Kent', 'clark.kent@test.fr');

//Connexion bdd 

$host = "db.3wa.io";
$port = "3306";
$dbname = "tonygohin_exoPDO";
$connexionString = "mysql:host=$host;port=$port;dbname=$dbname";

$user = "tonygohin";
$password = "f80620de30f1b8d1caba3a7e4b950a9a";

$db = new PDO(
    $connexionString,
    $user,
    $password
);

$query = $db->prepare('SELECT * FROM users LIMIT 1');
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);
var_dump($user);

$newUser = new User();
array_push($newUser, $user);
var_dump($newUser);




?>