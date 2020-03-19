<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;
$work = new Works;
$aboutme = new AboutMe;
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virgil M - TheRubyJailCell</title>
</head>
<body>
<!--Accueil - à modifier -->
    <p>Welcome <?php if(isset($_SESSION["account"]["username"]))
    {
        echo($_SESSION["account"]["username"]);
    }
    else
    {
        echo "to this site.";
    }
        ?></p>

    <br>

    <!--Bio de moi - à faire-->
    <div id="about" style="margin-bottom: 50px;">
        <h2>About Me</h2>
        <?php 
            $desc = $aboutme->get_desc();
            echo $desc['descme'];

            if (isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"] == "admin") {
                ?>
                <br><br>
                <a href="edit_about.php">Modifer</a>
                <?php
            }
        ?>
    </div>

    <!--Projets réalisés-->
    <h2 style="margin-bottom: 0;">My Works</h2>
    <?php
        if (isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"] == "admin") {
            ?>
            <br><br>
            <a href="create_work.php">New Work</a>
            <br><br>
            <?php
        }

        $allworks = $work->get_works();
        foreach($allworks as $w)
        {
            echo($w["title"]);
            echo(" | ");
            echo($w["description"] . "<br>");
        }

    ?>

<br><br>
    <a href="login.php">Connexion</a>
    <br><br>
    <a href="logout.php">Déconnexion</a>

</body>
</html>