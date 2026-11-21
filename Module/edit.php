
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "SELECT * FROM Module WHERE ID_module = ?";
$statement = $pdo->prepare($sql);
$statement->execute([$id]);
$module = $statement->fetch(PDO::FETCH_ASSOC);

if (!$module) {
    die("Module introuvable.");
}

$sql = "SELECT * FROM Formation";
$formations = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["modifier"])) {
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $nbre_heures = $_POST["nbre_heures"];
    $id_formation = $_POST["id_formation"];

    $sql = "UPDATE Module
            SET Titre = ?, Description = ?,
                Nbre_heures = ?, id_formation = ?
            WHERE ID_module = ?";

    $statement = $pdo->prepare($sql);
    $statement->execute([
        $titre, $description, $nbre_heures,
        $id_formation, $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Module</title>
     <link rel="stylesheet" href="../css/pages.css">
</head>
<body>

<h1>Modifier un module</h1>

<form method="POST">

    Titre :
    <input type="text" name="titre"
        value="<?= htmlspecialchars($module['Titre']) ?>" required><br><br>

    Description :
    <textarea name="description"><?= htmlspecialchars($module['Description']) ?></textarea><br><br>

    Nombre d'heures :
    <input type="number" name="nbre_heures"
        value="<?= htmlspecialchars($module['Nbre_heures']) ?>" required><br><br>

    Formation :
    <select name="id_formation" required>
        <?php foreach ($formations as $formation): ?>
            <option value="<?= $formation['ID'] ?>"
                <?= $formation['ID'] == $module['id_formation'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($formation['Titre']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit" name="modifier">Modifier</button>

</form>

<a href="index.php">Retour</a>

</body>
</html>
