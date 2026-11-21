
<?php

require_once "../database/connexion.php";

$sql = "SELECT * FROM Formation";
$statement = $pdo->query($sql);
$formations = $statement->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["ajouter"])) {

    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $nbre_heures = $_POST["nbre_heures"];
    $id_formation = $_POST["id_formation"];

    $sql = "INSERT INTO Module
            (Titre, Description, Nbre_heures, id_formation)
            VALUES (?, ?, ?, ?)";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        $titre,
        $description,
        $nbre_heures,
        $id_formation
    ]);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un module</title>
     <link rel="stylesheet" href="../css/pages.css">
</head>

<body>

    <h1>Ajouter un module</h1>

    <form method="POST">

        <label>Titre :</label>
        <input type="text" name="titre" required>
        <br><br>

        <label>Description :</label>
        <textarea name="description"></textarea>
        <br><br>

        <label>Nombre d'heures :</label>
        <input type="number" name="nbre_heures" required>
        <br><br>

        <label>Formation :</label>

        <select name="id_formation" required>

            <option value="">Choisir une formation</option>

            <?php foreach ($formations as $formation) { ?>

                <option value="<?php echo $formation["ID"]; ?>">
                    <?php echo htmlspecialchars($formation["Titre"]); ?>
                </option>

            <?php } ?>

        </select>

        <br><br>

        <button type="submit" name="ajouter">
            Ajouter
        </button>

    </form>

    <a href="index.php">Retour</a>

</body>
</html>
