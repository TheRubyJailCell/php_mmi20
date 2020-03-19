<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");
$work = new Works;

if (isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"] == "admin") {
    if (isset($_POST['valid']) && $_POST['valid'] === "OK") {
    	if (isset($_POST['titre']) != NULL && $_POST['desc'] != NULL) {
    		$work->create($_POST['titre'], $_POST['desc']);
    	}
    }
}
else {
	header("Location: index.php");
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Work</title>
</head>
<body>
    <h2>New Work</h2>

    <form action="create_work.php" method="post">
    <label for="titre"><b>Title:</b></label>
    <input type="text" name="titre" placeholder="Title..." required>
    <br><br>
    <label for="desc"><b>Description:</b></label>
    <input type="text" name="desc" placeholder="Description..." required>
    <button type='submit' name="valid" value="OK">Create</button>
    </form>
</body>
</html>