<?php
require "../src/requetes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_responsive.css">
</head>

<body>
    <main>
        <section class="top">
            <div class="card">
                <div>
                    <p class="label">Total Véhicules</p>
                    <p class="value"><?= $totalVehicule ?></p>
                </div>
                <img class="" alt="">
                <div class="background_icone car">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                        <path fill="#0a5af4" d="m29.338 15.934l-7.732-2.779l-3.232-4.058A2.99 2.99 0 0 0 16.054 8H8.058a3 3 0 0 0-2.48 1.312l-2.712 3.983A5 5 0 0 0 2 16.107V24a1 1 0 0 0 1 1h2.142a3.98 3.98 0 0 0 7.716 0h6.284a3.98 3.98 0 0 0 7.716 0H29a1 1 0 0 0 1-1v-7.125a1 1 0 0 0-.662-.941M9 26a2 2 0 1 1 2-2a2.003 2.003 0 0 1-2 2m14 0a2 2 0 1 1 2-2a2.003 2.003 0 0 1-2 2m5-3h-1.142a3.98 3.98 0 0 0-7.716 0h-6.284a3.98 3.98 0 0 0-7.716 0H4v-6.893a3 3 0 0 1 .52-1.688l2.711-3.981A1 1 0 0 1 8.058 10h7.996a1 1 0 0 1 .764.355l3.4 4.268a1 1 0 0 0 .444.318L28 17.578Z" />
                    </svg>
                </div>
            </div>
            <div class="card">
                <div>
                    <p class="label">Total Propriétaires</p>
                    <p class="value"><?= $totalProprietaires ?></p>
                </div>
                <div class="background_icone user">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <g fill="none" stroke="#0ba820" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M16 3.128a4 4 0 0 1 0 7.744M22 21v-2a4 4 0 0 0-3-3.87" />
                            <circle cx="9" cy="7" r="4" />
                        </g>
                    </svg>
                </div>
            </div>
            <div class="card">
                <div>
                    <p class="label">Amendes en cours</p>
                    <p class="value"><?= $totalContraventions . "K€" ?></p>
                </div>
                <div class="background_icone pv">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path fill="#d91010" d="M8 9a.75.75 0 0 1-.75-.75v-3.5a.75.75 0 0 1 1.5 0v3.5A.75.75 0 0 1 8 9m-1 3a1 1 0 1 1 2 0a1 1 0 0 1-2 0" />
                        <path fill="#d91010" fill-rule="evenodd" d="m.325 11.6l5.02-9.99c1.1-2.19 4.21-2.19 5.31 0l5.02 9.99c1 2-.436 4.36-2.66 4.36h-10c-2.22 0-3.66-2.36-2.66-4.36zm.894.449l5.02-9.99c.733-1.46 2.79-1.46 3.52 0l5.02 9.99c.676 1.35-.301 2.91-1.76 2.91h-10c-1.46 0-2.44-1.57-1.76-2.91z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="card">
                <div>
                    <p class="label">Entretiens</p>
                    <p class="value"><?= $totalEntretiens ?></p>
                </div>
                <div class="background_icone repair">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 2048 2048">
                    <path fill="#f47d0a" d="M1930 220q26 45 47 86t38 83t24 87t9 100q0 79-20 152t-58 138t-91 117t-117 90t-137 58t-153 21q-23 0-46-2t-47-6l-806 806q-48 48-109 73t-129 25q-69 0-130-26t-106-72t-72-107t-27-130q0-67 25-128t73-110l806-806q-4-23-6-46t-2-47q0-79 20-152t58-138t91-117t117-90t137-58t153-21q54 0 99 8t88 25t83 37t86 48l-394 394l102 102zm-458 804q93 0 174-35t142-96t96-142t36-175q0-73-24-141l-360 359l-282-282l359-360q-68-24-141-24q-93 0-174 35t-142 96t-96 142t-36 175q0 35 6 68t14 66l-855 856q-29 29-45 67t-16 80t16 80t45 66t66 44t80 17q42 0 80-16t67-45l856-855q33 8 66 14t68 6" />
                </svg>
                </div>
            </div>
        </section>
        <section class="midle">
            <div class="card_midle left">
                <div class="card-header">
                    <h2>Véhicules à Risque (>300€ Entr. & >200€ Amendes)</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="#868686" d="M1 3.5c0-.626.292-1.165.7-1.59c.406-.422.956-.767 1.579-1.041C4.525.32 6.195 0 8 0s3.475.32 4.722.869c.622.274 1.172.62 1.578 1.04c.408.426.7.965.7 1.591v9c0 .626-.292 1.165-.7 1.59c-.406.422-.956.767-1.579 1.041C11.476 15.68 9.806 16 8 16c-1.805 0-3.475-.32-4.721-.869c-.623-.274-1.173-.62-1.579-1.04c-.408-.426-.7-.965-.7-1.591Zm1.5 0c0 .133.058.318.282.551c.227.237.591.483 1.101.707C4.898 5.205 6.353 5.5 8 5.5s3.101-.295 4.118-.742c.508-.224.873-.471 1.1-.708c.224-.232.282-.417.282-.55s-.058-.318-.282-.551c-.227-.237-.591-.483-1.101-.707C11.102 1.795 9.647 1.5 8 1.5s-3.101.295-4.118.742c-.508.224-.873.471-1.1.708c-.224.232-.282.417-.282.55m0 4.5c0 .133.058.318.282.551c.227.237.591.483 1.101.707C4.898 9.705 6.353 10 8 10s3.101-.295 4.118-.742c.508-.224.873-.471 1.1-.708c.224-.232.282-.417.282-.55V5.724c-.241.15-.503.286-.778.407C11.475 6.68 9.805 7 8 7s-3.475-.32-4.721-.869a6 6 0 0 1-.779-.407Zm0 2.225V12.5c0 .133.058.318.282.55c.227.237.592.484 1.1.708c1.016.447 2.471.742 4.118.742s3.102-.295 4.117-.742c.51-.224.874-.47 1.101-.707c.224-.233.282-.418.282-.551v-2.275c-.241.15-.503.285-.778.406c-1.247.549-2.917.869-4.722.869s-3.475-.32-4.721-.869a6 6 0 0 1-.779-.406"/></svg>
                </div>
                <div class="grid">
                    <table>
                        <tr>
                            <th>IMMATRICULATION</th>
                            <th>COÛT ENTR;</th>
                            <th>TOTAL AMENDES</th>
                            <th>STATUT</th>
                        </tr>
                        <?php
                        foreach ($vehiculeRisques as $vehiculeRisque): ?>
                            <tr>
                                <td class="plaque"><?= $vehiculeRisque["immatriculation"] ?></td>
                                <td class="maintenance_price"><?= $vehiculeRisque["total_entr"] ?></td>
                                <td class="total_penalty"><?= $vehiculeRisque["total_pv"] ?></td>
                                <td class="status">Action Requise</td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
            <div class="card_midle rigth">
                <div class="card-header">
                    <h2>Contraventions Récentes</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="#868686" d="M1 3.5c0-.626.292-1.165.7-1.59c.406-.422.956-.767 1.579-1.041C4.525.32 6.195 0 8 0s3.475.32 4.722.869c.622.274 1.172.62 1.578 1.04c.408.426.7.965.7 1.591v9c0 .626-.292 1.165-.7 1.59c-.406.422-.956.767-1.579 1.041C11.476 15.68 9.806 16 8 16c-1.805 0-3.475-.32-4.721-.869c-.623-.274-1.173-.62-1.579-1.04c-.408-.426-.7-.965-.7-1.591Zm1.5 0c0 .133.058.318.282.551c.227.237.591.483 1.101.707C4.898 5.205 6.353 5.5 8 5.5s3.101-.295 4.118-.742c.508-.224.873-.471 1.1-.708c.224-.232.282-.417.282-.55s-.058-.318-.282-.551c-.227-.237-.591-.483-1.101-.707C11.102 1.795 9.647 1.5 8 1.5s-3.101.295-4.118.742c-.508.224-.873.471-1.1.708c-.224.232-.282.417-.282.55m0 4.5c0 .133.058.318.282.551c.227.237.591.483 1.101.707C4.898 9.705 6.353 10 8 10s3.101-.295 4.118-.742c.508-.224.873-.471 1.1-.708c.224-.232.282-.417.282-.55V5.724c-.241.15-.503.286-.778.407C11.475 6.68 9.805 7 8 7s-3.475-.32-4.721-.869a6 6 0 0 1-.779-.407Zm0 2.225V12.5c0 .133.058.318.282.55c.227.237.592.484 1.1.708c1.016.447 2.471.742 4.118.742s3.102-.295 4.117-.742c.51-.224.874-.47 1.101-.707c.224-.233.282-.418.282-.551v-2.275c-.241.15-.503.285-.778.406c-1.247.549-2.917.869-4.722.869s-3.475-.32-4.721-.869a6 6 0 0 1-.779-.406"/></svg>
                </div>
                <div class="grid">
                    <table>
                        <tr>
                            <th>DATE</th>
                            <th>VÉHICULE</th>
                            <th>CONDUCTEUR</th>
                            <th>MONTANT</th>
                        </tr>
                        <?php foreach ($contraventionRecentes as $contraventionRecente): ?>
                            <tr>
                                <td><?= $contraventionRecente["date_contravention"] ?></td>
                                <td><?= $contraventionRecente["immatriculation"] ?></td>
                                <td><?= $contraventionRecente["nom"] ?></td>
                                <td><?= $contraventionRecente["montant"] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </section>
        <section class="bot">
            <div class="card-header">
                <h2>Derniers Entretiens</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="#868686" d="M1 3.5c0-.626.292-1.165.7-1.59c.406-.422.956-.767 1.579-1.041C4.525.32 6.195 0 8 0s3.475.32 4.722.869c.622.274 1.172.62 1.578 1.04c.408.426.7.965.7 1.591v9c0 .626-.292 1.165-.7 1.59c-.406.422-.956.767-1.579 1.041C11.476 15.68 9.806 16 8 16c-1.805 0-3.475-.32-4.721-.869c-.623-.274-1.173-.62-1.579-1.04c-.408-.426-.7-.965-.7-1.591Zm1.5 0c0 .133.058.318.282.551c.227.237.591.483 1.101.707C4.898 5.205 6.353 5.5 8 5.5s3.101-.295 4.118-.742c.508-.224.873-.471 1.1-.708c.224-.232.282-.417.282-.55s-.058-.318-.282-.551c-.227-.237-.591-.483-1.101-.707C11.102 1.795 9.647 1.5 8 1.5s-3.101.295-4.118.742c-.508.224-.873.471-1.1.708c-.224.232-.282.417-.282.55m0 4.5c0 .133.058.318.282.551c.227.237.591.483 1.101.707C4.898 9.705 6.353 10 8 10s3.101-.295 4.118-.742c.508-.224.873-.471 1.1-.708c.224-.232.282-.417.282-.55V5.724c-.241.15-.503.286-.778.407C11.475 6.68 9.805 7 8 7s-3.475-.32-4.721-.869a6 6 0 0 1-.779-.407Zm0 2.225V12.5c0 .133.058.318.282.55c.227.237.592.484 1.1.708c1.016.447 2.471.742 4.118.742s3.102-.295 4.117-.742c.51-.224.874-.47 1.101-.707c.224-.233.282-.418.282-.551v-2.275c-.241.15-.503.285-.778.406c-1.247.549-2.917.869-4.722.869s-3.475-.32-4.721-.869a6 6 0 0 1-.779-.406"/></svg>
            </div>
            <div class="cards_bot">
                <?php foreach ($dernierEntretiens as $dernierEntretien):
                    //vehicule.immatriculation, entretien.date_entretien, entretien.description, garage.nom, entretien.cout
                ?>
                    <div class="card_bot">
                        <div>
                            <div class="immat"><?= $dernierEntretien["immatriculation"] ?></div>
                            <div class="info"><?= $dernierEntretien["date_entretien"] ?></div>
                        </div>
                        <p><?= $dernierEntretien["description"] ?></p>
                        <div class="end_card">
                            <div class="info"><?= $dernierEntretien["nom"] ?></div>
                            <divc class="fixed_price"><?= $dernierEntretien["cout"] . "€" ?></divc>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </section>
    </main>
</body>

</html>