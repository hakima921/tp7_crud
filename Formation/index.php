
<?php

require_once "../database/connexion.php";

$sql = "SELECT * FROM Formation";

$statement = $pdo->query($sql);

$formations = $statement->fetchAll(
    PDO::FETCH_ASSOC
);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des formations</title>
    <link rel="stylesheet" href="../css/pages.css">
</head>

<body>

    <h1>Liste des formations</h1>

    <a href="create.php">Ajouter une formation</a>

    <table border="1">

        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Durée</th>
                <th>Langue</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($formations as $formation) { ?>

                <tr>

                    <td><?php echo $formation["ID"]; ?></td>

                    <td><?php echo htmlspecialchars($formation["Titre"]); ?></td>

                    <td><?php echo htmlspecialchars($formation["Description"]); ?></td>

                    <td><?php echo $formation["Durée"]; ?> mois</td>

                    <td><?php echo htmlspecialchars($formation["Langue"]); ?></td>

                    <td>
                        <a href="edit.php?id=<?php echo $formation["ID"]; ?>">
                            Modifier
                        </a>

                        |

                        <a href="delete.php?id=<?php echo $formation["ID"]; ?>">
                            Supprimer
                        </a>
                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</body>
</html>
