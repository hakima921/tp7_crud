
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "SELECT * FROM Formation WHERE ID = ?";
$statement = $pdo->prepare($sql);
$statement->execute([$id]);
$formation = $statement->fetch(PDO::FETCH_ASSOC);

if (!$formation) {
    die("Formation introuvable.");
}

if (isset($_POST["modifier"])) {
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $duree = $_POST["durée"];
    $langue = $_POST["langue"];

    $sql = "UPDATE Formation
            SET Titre = ?, Description = ?, Durée = ?, Langue = ?
            WHERE ID = ?";

    $statement = $pdo->prepare($sql);
    $statement->execute([
        $titre, $description, $duree, $langue, $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Formation</title>
     <link rel="stylesheet" href="../css/pages.css">
</head>
<body>

<h1>Modifier une formation</h1>

<form method="POST">
    Titre :
    <input type="text" name="titre"
        value="<?= htmlspecialchars($formation['Titre']) ?>" required><br><br>

    Description :
    <textarea name="description"><?= htmlspecialchars($formation['Description']) ?></textarea><br><br>

    Durée (mois) :
    <input type="number" name="durée"
        value="<?= htmlspecialchars($formation['Durée']) ?>" required><br><br>

    Langue :
    <input type="text" name="langue"
        value="<?= htmlspecialchars($formation['Langue']) ?>" required><br><br>

    <button type="submit" name="modifier">Modifier</button>
</form>

<a href="index.php">Retour</a>

</body>
</html>
