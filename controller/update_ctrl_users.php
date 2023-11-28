<?php 
include_once '../model/sql.php';
include_once '../model/pdo.php';
include_once "tools.php";
session_start();



if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["street_name"]) && !empty($_POST["city"]) && !empty($_POST['zip_code']) && !empty($_POST['mail']) && !empty($_POST['id_user']) && !empty($_POST['page'])) {

    $data = [$_POST["first_name"], $_POST["last_name"], $_POST["street_name"], $_POST["city"], $_POST["zip_code"],$_POST["role"], $_POST['mail'], $_POST["id_user"] ];
    try{
        $sql = "UPDATE user SET first_name=?, last_name=?, street_name=?, city=?, zip_code=?, role=?, mail=? WHERE id_user=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        sendMessage("Altération réussi", "success", "../view/users/index_users.php", $_POST["page"]);
    }catch(Exception $e){
        sendMessage($e->getMessage(), "failed", "../view/users/update_users.php?id=$_POST[id_user]", $_POST["page"], true);

    }
    
}else {
    sendMessage("Veuillez remplir le formulaire correctement.", "failed", "../view/users/update_users.php?id=$_POST[id_user]", $_POST["page"], true);

}