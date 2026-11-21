
<?php

require_once "../database/connexion.php";

$sql = "SELECT Etudiant.*, Formation.Titre
        FROM Etudiant
        INNER JOIN Formation
        ON Etudiant.id_formation = Formation.ID";

$statement = $pdo->query($sql);

$etudiants = $statement->fetchAll(
    PDO::FETCH_ASSOC
);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="../css/pages.css">
</head>

<body>

    <h1>Liste des étudiants</h1>

    <a href="create.php">Ajouter un étudiant</a>

    <table border="1">

        <thead>
            <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Formation</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($etudiants as $etudiant) { ?>

                <tr>

                    <td><?php echo $etudiant["Numero"]; ?></td>

                    <td><?php echo htmlspecialchars($etudiant["Nom"]); ?></td>

                    <td><?php echo htmlspecialchars($etudiant["Prenom"]); ?></td>

                    <td><?php echo $etudiant["Age"]; ?></td>

                    <td><?php echo htmlspecialchars($etudiant["Telephone"]); ?></td>

                    <td><?php echo htmlspecialchars($etudiant["Email"]); ?></td>

                    <td><?php echo htmlspecialchars($etudiant["Titre"]); ?></td>

                    <td>
                        <a href="edit.php?id=<?php echo $etudiant["Numero"]; ?>">
                            Modifier
                        </a>

                        |

                        <a href="delete.php?id=<?php echo $etudiant["Numero"]; ?>">
                            Supprimer
                        </a>
                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</body>
</html>
