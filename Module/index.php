
<?php

require_once "../database/connexion.php";

$sql = "SELECT Module.*, Formation.Titre AS nom_formation
        FROM Module
        INNER JOIN Formation
        ON Module.id_formation = Formation.ID";

$statement = $pdo->query($sql);

$modules = $statement->fetchAll(
    PDO::FETCH_ASSOC
);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des modules</title>
    <link rel="stylesheet" href="../css/pages.css">
</head>

<body>

    <h1>Liste des modules</h1>

    <a href="create.php">Ajouter un module</a>

    <table border="1">

        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Nombre d'heures</th>
                <th>Formation</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($modules as $module) { ?>

                <tr>

                    <td><?php echo $module["ID_module"]; ?></td>

                    <td><?php echo htmlspecialchars($module["Titre"]); ?></td>

                    <td><?php echo htmlspecialchars($module["Description"]); ?></td>

                    <td><?php echo $module["Nbre_heures"]; ?></td>

                    <td><?php echo htmlspecialchars($module["nom_formation"]); ?></td>

                    <td>
                        <a href="edit.php?id=<?php echo $module["ID_module"]; ?>">
                            Modifier
                        </a>

                        |

                        <a href="delete.php?id=<?php echo $module["ID_module"]; ?>">
                            Supprimer
                        </a>
                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</body>
</html>
