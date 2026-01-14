<?php

$host = 'localhost:3306';
$dbname = 'parc_auto';
$username = 'root';
$password = 'root';

try {
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


    $stmt = $pdo->query("select COUNT(*) AS total FROM parc_auto.vehicule");
    $totalVehicule = $stmt->fetch()['total'];

    $stmt = $pdo->query("SELECT immatriculation ,SUM(cout) as total_entr, SUM(montant) as total_pv FROM parc_auto.vehicule
LEFT JOIN entretien on vehicule.id = entretien.vehicule_id
LEFT JOIN contravention on vehicule.id = contravention.vehicule_id
GROUP BY immatriculation
HAVING total_entr >= 300 AND total_pv >= 200
ORDER BY immatriculation ASC 
LIMIT 2");
    $vehiculeRisques = $stmt->fetchAll();

    $stmt = $pdo->query("SELECT contravention.id, date_contravention, montant, nom, immatriculation FROM parc_auto.contravention
JOIN parc_auto.personne on contravention.conducteur_id = personne.id
JOIN parc_auto.vehicule on contravention.vehicule_id = vehicule.id 
LIMIT 4");
    $contraventionRecentes = $stmt->fetchAll();

    $stmt = $pdo->query("select COUNT(*) AS total FROM parc_auto.personne");
    $totalProprietaires = $stmt->fetch()['total'];

    $stmt = $pdo->query("SELECT SUM(montant) as total FROM parc_auto.contravention");
    $totalContraventions = round($stmt->fetch()['total'], -2) / 1000;


    $stmt = $pdo->query("select COUNT(*) AS total FROM parc_auto.entretien");
    $totalEntretiens = $stmt->fetch()['total'];

    $stmt = $pdo->query("SELECT vehicule.immatriculation, entretien.date_entretien, entretien.description, garage.nom, entretien.cout from parc_auto.entretien
JOIN garage on entretien.garage_id = garage.id
JOIN vehicule on entretien.vehicule_id = vehicule.id
ORDER BY date_entretien DESC
LIMIT 3;");
    $dernierEntretiens = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage() . "\n");
}
?>