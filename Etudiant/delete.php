
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "DELETE FROM Etudiant WHERE Numero = ?";
$statement = $pdo->prepare($sql);
$statement->execute([$id]);

header("Location: index.php");
exit;
?>
