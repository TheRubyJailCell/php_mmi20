<?php
require("database.php");

class Users {
    function get_user($id)
    {
        global $db;

        $request = "SELECT * FROM Users WHERE id=$id";
        $resultat = $db->query($request);
        $user = $resultat->fetch();

        return($user);
    }

    function connect($username, $password)
    {
        global $db;
        echo($username);
        $request = "SELECT * FROM Users WHERE username=\"$username\"";
        $resultat = $db->query($request);
        $user = $resultat->fetch();

        if(password_verify($password, $user["password"]))
        {
            session_start();
            $_SESSION["account"] = [
                'id' => $user["id"],
                'username' => $user["username"]
            ];

            header('Location: index.php');
        }
        else
        {
            echo("Impossible de se connecter");
        }
    }
}

class Works {
    function get_works()
    {
        global $db;

        $request = "SELECT * FROM works";
        $resultat = $db->query($request);
        $user = $resultat->fetchAll();

        return($user);
    }

    function create($title, $description)
    {
        global $db;

        $request = $db->prepare('INSERT INTO works (title, description) VALUES (?, ?)');
        $request->execute([$title, $description]);

        header("Location: index.php");
    }

    function update($title, $description, $id)
    {
        global $db;

        $request = $db->prepare('UPDATE works SET title=?, description=? WHERE id=?');
        $request->execute([$title, $description, $id]);
    }

}

class AboutMe {
    function get_desc()
    {
        global $db;

        $edit_about = $db->prepare('SELECT * FROM aboutme');
        $edit_about->execute(array());
        $edit_about = $edit_about->fetch();

        return($edit_about);
    }

    function update_desc($desc)
    {
        global $db;

        $request = $db->prepare('UPDATE aboutme SET descme=?');
        $request->execute([$desc]);

        header('Location: index.php');
    }
}
?>