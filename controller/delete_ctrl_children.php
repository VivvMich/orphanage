<?php

include_once "../model/pdo.php";
include_once "tools.php";

if(isset($_GET['id']) && isset($_GET['page'])){
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

}