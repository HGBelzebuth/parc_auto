-- Active: 1764942691056@@127.0.0.1@3306@parc_auto

/*Lister les 20 premières personnes (id, nom, prénom, téléphone)*/
select * FROM parc_auto.personne WHERE id <= 20;


/* Lister les véhicules avec leur propriétaire (nom + prénom)*/
SELECT * FROM parc_auto.vehicule
JOIN parc_auto.personne on vehicule.proprietaire_id = personne.id;

/*  Compter le nombre total de véhicules dans la base */
select COUNT (*) FROM parc_auto.vehicule;

/* Compter le nombre de véhicules par type d’énergie */
select COUNT (*), energie  FROM parc_auto.vehicule
GROUP BY vehicule.energie;

/*Top 5 propriétaires qui ont le plus de véhicules*/
SELECT COUNT (*) AS nb_v, nom, prenom FROM parc_auto.vehicule
JOIN parc_auto.personne on vehicule.proprietaire_id = personne.id
GROUP BY vehicule.proprietaire_id
ORDER BY nb_v DESC
LIMIT 5;

/* Liste des contraventions avec immatriculation du véhicule et nom du conducteur */
SELECT contravention.id, date_contravention, montant, nom, immatriculation FROM parc_auto.contravention
JOIN parc_auto.personne on contravention.conducteur_id = personne.id
JOIN parc_auto.vehicule on contravention.vehicule_id = vehicule.id;

/* Montant total des contraventions par personne (conducteur) */
SELECT SUM (montant) as total, nom, prenom FROM parc_auto.contravention
JOIN parc_auto.personne on contravention.conducteur_id = personne.id
JOIN parc_auto.vehicule on contravention.vehicule_id = vehicule.id
GROUP BY conducteur_id;

 /*Montant total des contraventions par année et par commune*/
SELECT SUM (montant) as total, nom, EXTRACT(YEAR FROM date_contravention) AS annee FROM parc_auto.contravention
JOIN parc_auto.commune on contravention.lieu_id = commune.id
GROUP BY nom, annee
ORDER BY nom ASC, annee DESC;

/* Liste des 20 derniers entretiens avec garage et véhicule */
SELECT * from parc_auto.entretien
JOIN garage on entretien.garage_id = garage.id
JOIN vehicule on entretien.vehicule_id = vehicule.id
ORDER BY date_entretien DESC
LIMIT 20;

/* Véhicules qui cumulent plus de 300 € d’entretien et plus de 200 € d’amendes */
SELECT immatriculation ,SUM(cout) as total_entr, SUM(montant) as total_pv FROM parc_auto.vehicule
LEFT JOIN entretien on vehicule.id = entretien.vehicule_id
LEFT JOIN contravention on vehicule.id = contravention.vehicule_id
GROUP BY immatriculation
HAVING total_entr >= 300 AND total_pv >= 200
ORDER BY immatriculation ASC;
