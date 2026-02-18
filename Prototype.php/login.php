<?php
session_start();
include "users.php";


$msg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $pass = $_POST["pass"];

    // vérifier champs
    if (empty($name) || empty($pass)) {
        $msg = "⚠️ remplir tous les champs";
    } else {

        $found = false;

        foreach ($users as $u) {

            if ($u["name"] == $name && $u["password"] == $pass) {

                $found = true;

                if (!$u["active"]) {
                    $msg = "⛔ Compte désactivé";
                } else {
                    $_SESSION["user"] = $u;
                    header("Location: dashboard.php");
                    exit();
                }
            }
        }

        if (!$found) {
            $msg = "❌ Identifiants incorrects";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Login</h2>

<form method="post">
    <input type="text" name="name" placeholder="Nom"><br><br>
    <input type="password" name="pass" placeholder="Password"><br><br>
    <button type="submit">Se connecter</button>
</form>

<p><?php echo $msg; ?></p>

</body>
</html>
