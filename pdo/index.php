<?php

require './User.php';

// Nouvelle instance

//$user = new User('Clark', 'Kent', 'clark.kent@test.fr');

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


//Intencier un seul utilisateur
$query = $db->prepare('SELECT * FROM users LIMIT 1');
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

$newUser = new User($user['first_name'], $user['last_name'], $user['email']);
$id_user = $newUser->setId($user['id']);

var_dump($user);
var_dump($newUser);


//Instancier tout les utilisateurs
$query = $db->prepare('SELECT * FROM users LIMIT 3');
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);

$allUsers = [];
for($i = 0; $i < count($users); $i++){
    $new_users = new User($users[$i]['first_name'], $users[$i]['last_name'], $users[$i]['email']);
    $id_users = $new_users->setId($users[$i]['id']);
    $allUsers[] = $new_users;
}
var_dump($allUsers);


//Ajout d'un utilisateur dans la base de donnée

$user_clark = new User('Clark', 'Kent', 'clark.kent@test.fr');

$query = $db->prepare('INSERT INTO users (id, first_name, last_name, email) VALUES (null, :first_name, :last_name, :email) ');

$parameters = [
    'first_name' => $user_clark->getFirstName(),
    'last_name' => $user_clark->getLastName(),
    'email' => $user_clark->getEmail()
    ];
    
$query->execute($parameters);
?>