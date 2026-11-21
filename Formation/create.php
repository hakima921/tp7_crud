
<?php

require_once "../database/connexion.php";

if (isset($_POST["ajouter"])) {

    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $durée = $_POST["durée"];
    $langue = $_POST["langue"];

    $sql = "INSERT INTO Formation
            (Titre, Description, Durée, Langue)
            VALUES (?, ?, ?, ?)";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        $titre,
        $description,
        $durée,
        $langue
    ]);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter une formation</title>
     <link rel="stylesheet" href="../css/pages.css">
</head>

<body>

    <h1>Ajouter une formation</h1>

    <form method="POST">

        <label>Titre :</label>
        <input type="text" name="titre" required>
        <br><br>

        <label>Description :</label>
        <textarea name="description"></textarea>
        <br><br>

        <label>Durée (mois) :</label>
        <input type="number" name="durée" required>
        <br><br>

        <label>Langue :</label>
        <input type="text" name="langue" required>
        <br><br>

        <button type="submit" name="ajouter">
            Ajouter
        </button>

    </form>

    <a href="index.php">Retour</a>

</body>
</html>
