<?php 
include_once '../model/sql.php';
include_once "tools.php";



if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["birthdate"]) && !empty($_POST["origin"]) && !empty($_POST['id_child'])) {

    $data = [$_POST["first_name"], $_POST["last_name"], $_POST["birthdate"], $_POST["origin"], $_POST["sex"], $_POST['id_child']];
    try{
        updateData('child', $data);
        sendMessage("Altération réussi", "success", "../view/index_children.php", $_POST["page"]);
    }catch(Exception){
        sendMessage($e->getMessage(), "failed", "../view/update_children.php?id=$_POST[id_child]");

    }
    
}