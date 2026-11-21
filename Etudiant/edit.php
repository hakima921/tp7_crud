
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "SELECT * FROM Etudiant WHERE Numero = ?";
$statement = $pdo->prepare($sql);
$statement->execute([$id]);
$etudiant = $statement->fetch(PDO::FETCH_ASSOC);

if (!$etudiant) {
    die("Etudiant introuvable.");
}

$sql = "SELECT * FROM Formation";
$formations = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["modifier"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $id_formation = $_POST["id_formation"];

    $sql = "UPDATE Etudiant
            SET Nom = ?, Prenom = ?, Age = ?,
                Telephone = ?, Email = ?, id_formation = ?
            WHERE Numero = ?";

    $statement = $pdo->prepare($sql);
    $statement->execute([
        $nom, $prenom, $age, $telephone,
        $email, $id_formation, $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Etudiant</title>
     <link rel="stylesheet" href="../css/pages.css">
</head>
<body>

<h1>Modifier un étudiant</h1>

<form method="POST">

    Nom :
    <input type="text" name="nom"
        value="<?= htmlspecialchars($etudiant['Nom']) ?>" required><br><br>

    Prénom :
    <input type="text" name="prenom"
        value="<?= htmlspecialchars($etudiant['Prenom']) ?>" required><br><br>

    Age :
    <input type="number" name="age"
        value="<?= htmlspecialchars($etudiant['Age']) ?>" required><br><br>

    Téléphone :
    <input type="text" name="telephone"
        value="<?= htmlspecialchars($etudiant['Telephone']) ?>"><br><br>

    Email :
    <input type="email" name="email"
        value="<?= htmlspecialchars($etudiant['Email']) ?>"><br><br>

    Formation :
    <select name="id_formation" required>
        <?php foreach ($formations as $formation): ?>
            <option value="<?= $formation['ID'] ?>"
                <?= $formation['ID'] == $etudiant['ID_Formation'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($formation['Titre']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit" name="modifier">Modifier</button>

</form>

<a href="index.php">Retour</a>

</body>
</html>
