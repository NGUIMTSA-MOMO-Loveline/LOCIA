<?php
// db.php ou connexion.php

$host = '127.0.0.1'; // Adresse du serveur MySQL (généralement localhost ou 127.0.0.1)
$db = 'projet_auth'; // Nom de la base de données que vous avez créée dans phpMyAdmin
$user = 'root'; // Nom d'utilisateur MySQL (par défaut dans MAMP c'est 'root')
$pass = ''; // Mot de passe MySQL (par défaut dans MAMP, il est vide)
$charset = 'utf8mb4'; // Jeu de caractères pour garantir une compatibilité complète

// DSN (Data Source Name) pour PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // Crée une nouvelle instance PDO et se connecte à la base de données
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Afficher les erreurs en cas de problème
    echo "Connexion réussie à la base de données!";
} catch (\PDOException $e) {
    // Affiche une erreur si la connexion échoue
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
