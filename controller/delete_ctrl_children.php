<?php

include_once "../model/pdo.php";
include_once "tools.php";
include_once "role.php";
session_start();

if($_SESSION['role'] >= Role::SECRETARY->value) {
    if(isset($_GET['id']) && isset($_GET['page']) && isset($_GET['token'])){
        if ( $_GET['token'] === $_SESSION['token']){
            try{
                $id = $_GET['id'];
                $page = $_GET['page'];
                $sql = "UPDATE child SET isDelete=? WHERE id_child=?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([true, $id]);
                sendMessage("Enfant Supprimé(e)", "success", "../view/children/index_children.php", $page);
            }catch(Exception $e){
                sendMessage($e->getMessage(), "failed", "../view/children/index_children.php", $page);
            }
        }else {
            sendMessage("Token invalide", "failed", "../view/children/index_children.php", $page);

        }
    }
}else {
    sendMessage("Action non autorisée.", "failed", "../view/children/index_children.php", $page);
}
