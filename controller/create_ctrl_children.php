<?php
include_once "../model/pdo.php";
include_once "tools.php";
session_start();

// Empty ======>
// 1 => '',
// 2 => "",
// 3 => null,
// 4 => array(),
// 5 => FALSE,
// 6 => NULL,
// 7 =>'0',
// 8 =>0,

if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["birthdate"]) && !empty($_POST["origin"])) {

try{
    $sql = "INSERT INTO child (first_name, last_name, birthdate, origin, sex, isDelete) VALUE (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST["first_name"], $_POST["last_name"], $_POST["birthdate"], $_POST["origin"], $_POST["sex"], 0 ]);
    sendMessage("Enfant ajouté(e)", "success", "../view/children/create_children.php");
} catch(Exception $e){
    sendMessage($e->getMessage(), "failed", "../view/children/create_children.php");
}
}else {
    sendMessage("Veuillez remplir correctement le formulaire", "failed", "../view/children/create_children.php");
}