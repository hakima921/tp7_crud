
<?php

require_once "../database/connexion.php";

$sql = "SELECT * FROM Formation";
$statement = $pdo->query($sql);
$formations = $statement->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["ajouter"])) {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $id_formation = $_POST["id_formation"];

    $sql = "INSERT INTO Etudiant
            (Nom, Prenom, Age, Telephone, Email, id_formation)
            VALUES (?, ?, ?, ?, ?, ?)";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        $nom,
        $prenom,
        $age,
        $telephone,
        $email,
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
    <title>Ajouter un étudiant</title>
     <link rel="stylesheet" href="../css/pages.css">
</head>

<body>

    <h1>Ajouter un étudiant</h1>

    <form method="POST">

        <label>Nom :</label>
        <input type="text" name="nom" required>
        <br><br>

        <label>Prénom :</label>
        <input type="text" name="prenom" required>
        <br><br>

        <label>Age :</label>
        <input type="number" name="age" required>
        <br><br>

        <label>Téléphone :</label>
        <input type="text" name="telephone">
        <br><br>

        <label>Email :</label>
        <input type="email" name="email" required>
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
