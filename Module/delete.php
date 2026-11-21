
<?php
require_once "../database/connexion.php";

$id = $_GET["id"];

$sql = "DELETE FROM Module WHERE ID_module = ?";
$statement = $pdo->prepare($sql);
$statement->execute([$id]);

header("Location: index.php");
exit;
?>
