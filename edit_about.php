<!DOCTYPE html>
<?php 
session_start();
include_once("php/code.php");
$aboutme = new AboutMe;

if (isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"] == "admin") {
    
    //récup de la descr
    $desc = $aboutme->get_desc();

    //si form validé
    if (isset($_POST['valid']) && $_POST['valid'] === "OK") {
    	if (isset($_POST['description'])) {
    		$aboutme->update_desc($_POST['description']);
    	}
    }
}
else {
	header("Location: index.php");
}
?>

<html>
<head>
	<title>Description Modification</title>
	<meta charset="utf-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<form action="edit_about.php" method="post">
		<label for="description"><b>Description Personnelle:</b></label><br>
		<textarea style="min-width: 80%; min-height: 75px; font-size: 16px; margin: 10px 0px;" name="description" placeholder="Description..."><?= $desc['descme']; ?></textarea><br>
		<button type="submit" name="valid" value="OK">Submit</button>
	</form>

</body>
</html>