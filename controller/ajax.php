<?php 

include "../model/pdo.php";
session_start();

if (isset($_POST)) {

    if ( $_POST['tutor'] != "error" ) {

        $id_user = $_POST['tutor'];
        $id_child = $_POST['child'];
    
        // ici on verifie que l'enfant n'a pas le même tuteur.
    
        $sql = "SELECT user FROM user INNER JOIN child ON child.user = user.id_user WHERE user.id_user = $id_user AND child.id_child = $id_child";
        $stmt = $pdo->query($sql);
        $idUserChild = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( !$idUserChild) {
            // on continu l'ajax car les id sont différents
            $sql = "UPDATE child SET user=? WHERE id_child=?";
            $stmt = $pdo->prepare($sql);
            try {        
                $stmt->execute([$id_user, $id_child]);
                $sql = "SELECT CONCAT(first_name, ' ' , last_name) AS tutor FROM user WHERE id_user = $id_user";
                $stmt = $pdo->query($sql);
                $tutor = $stmt->fetch(PDO::FETCH_ASSOC);
                // tutor['tutor'] => "Jean mark troudu" 
                $tutor = $tutor['tutor'];
                // tutor = "Jean mark troudu"
    
                $response = [
                    "tutor" => $tutor,
                    "status" => "success",
                    "message" => "Modification réussie."
                ];
    
                echo json_encode($response);
            }catch(PDOException $p) {
                $response = [
                    "status" => "failed",
                    "message" => $p->getMessage(),
                ];
                echo json_encode($response);
            }
    }else {
        $response = [
            "status" => "failed",
            "message" => "Vous avez le même tuteur."
        ];
        echo json_encode($response);
    }


    }else {
        $response = [
            "status" => "failed",

            "message" => "Veuillez selectionner un tuteur."
        ];
        echo json_encode($response);
    }
}