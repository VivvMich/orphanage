<?php
include_once "../model/pdo.php";
include_once "tools.php";

if(!empty($_POST["first_name"]) && 
!empty($_POST["last_name"]) && 
!empty($_POST["street_name"]) && 
!empty($_POST["city"]) &&
!empty($_POST["zip_code"]) &&
!empty($_POST["role"]) &&
!empty($_POST["password"]) &&
!empty($_POST["mail"])
) {

try{
    //Attaque en brute force: on test chaque combinaison tres vite.
    //Attaque au dictionnaire: c'est une liste qui englobe les mots de passe les plus connu ou les moins sécurisé.
    $psw = password_hash($_POST["password"], PASSWORD_ARGON2I);
    $sql = "INSERT INTO user (first_name, last_name, street_name, city, zip_code, role, password, mail) VALUE (?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST["first_name"], $_POST["last_name"], $_POST["street_name"], $_POST["city"], $_POST["zip_code"], $_POST["role"], $psw, $_POST["mail"] ]);
    sendMessage("Utilisateur ajouté(e)", "success", "../view/users/create_users.php");
} catch(Exception $e){
    sendMessage($e->getMessage(), "failed", "../view/users/create_users.php");
}
}else {
    sendMessage("Veuillez remplir correctement le formulaire", "failed", "../view/users/create_users.php");
}