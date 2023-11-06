<?php
include_once "../model/pdo.php";

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
    $sql = "INSERT INTO child (first_name, last_name, birthdate, origin, sex) VALUE (?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST["first_name"], $_POST["last_name"], $_POST["birthdate"], $_POST["origin"], $_POST["sex"] ]);
    $message = "Enfant ajouté(e)";
    header("Location:../view/create_children.php?message=$message&status=success");
    exit;
} catch(Exception $e){
    $message = $e->getMessage();
    header("Location:../view/create_children.php?message=$message&status=failed");
    exit;
}
}else {
    $message = "Veuillez remplir correctement le formulaire";
    header("Location:../view/create_children.php?message=$message&status=failed");
    exit;
}