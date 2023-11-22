<?php
    include_once "../base.php";
    include_once "../../model/pdo.php";
    include_once "../../controller/tools.php";
?>

<h1 class="text-center">Connexion</h1>

<?php include_once "../message.php" ?>

<form id="form" class="mx-auto" action="" method="post">
  
    <label for="mail">Identifiant</label>
    <input class="form-control" type="text" name="mail" placeholder="Veuillez renseigner votre mail.">

    <label for="psw">Mot de passe</label>
    <input class="form-control" type="text" name="psw">

    <input type="submit" class="form-control btn btn-primary my-3" value="Connexion">

</form>

<?php

    if (!empty($_POST['mail']) && !empty($_POST['psw'])) {
        $mail = $_POST['mail'];
        $sql = "SELECT * FROM user WHERE mail='$mail'";
        $stmt = $pdo->query($sql);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if( $user ) {
            // Compte existe
            if(password_verify($_POST['psw'], $user['password'])){
                session_start();
                $_SESSION["name"] = $user['first_name'] . " " . $user['last_name'];
                $_SESSION["role"] = $user['role'];
                header('Location:../home.php');
            }else {
                sendMessage("Mot de passe incorrecte.", "failed", "login.php");
            }
        }else {
            // Le compte n'existe pas
            sendMessage("Le compte nexiste pas.", "failed", "login.php");
        }
    
    }

?>