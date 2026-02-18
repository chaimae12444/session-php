<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html>
<body>

<h2>Bienvenue <?php echo $user["name"]; ?></h2>

<?php
if ($user["role"] == "administrateur") {
    echo "👑 Vous êtes administrateur";
} elseif ($user["role"] == "formateur") {
    echo "📘 Vous êtes formateur";
} else {
    echo "🎓 Vous êtes apprenant";
}
?>

<br><br>
<a href="logout.php">Se déconnecter</a>

</body>
</html>
