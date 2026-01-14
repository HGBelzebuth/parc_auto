<?php

/**
 * Script de seeding pour Evaluation parc_auto
 * Utilisation : php seed.php
 */


// Configuration de la connexion PDO
$host = 'localhost:3306';
$dbname = 'parc_auto';
$username = 'root';
$password = 'root';

try {
    // Connexion sans spécifier la base de données pour créer le schéma
    $pdo = new PDO(
        "mysql:host=$host;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );

    echo "✓ Connexion à la base de données réussie\n\n";

    // ==================== CRÉATION DU SCHÉMA ====================
     // console("🗃️  Création du schéma de base de données...");
    $structureSql = file_get_contents(__DIR__ . '/structure.sql');

    if ($structureSql === false) {
        die("Erreur : Impossible de lire le fichier structure.sql\n");
    }

    // Exécution du schéma SQL
    $queries = preg_split('/;\s*$(?!\s*$)/', $structureSql);
    foreach ($queries as $query) {
        if (trim($query) !== '') {
            try {
                $pdo->exec($query);
            } catch (PDOException $e) {
                // Ignorer les erreurs de table déjà existante
                if (strpos($e->getMessage(), 'already exists') === false) {
                    console("   ⚠️  Avertissement : " . $e->getMessage());
                }
            }
        }
    }
   // console("   ✓ Schéma de base de données créé\n");

    // Connexion à la base de données parc_auto
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage() . "\n");
}
