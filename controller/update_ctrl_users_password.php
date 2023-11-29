<?php 
include_once '../model/sql.php';
include_once '../model/pdo.php';
include_once "tools.php";
session_start();



if(!empty($_POST["old_psw"]) && !empty($_POST["new_psw"])) {
        $id = $_POST['id_user'];
        $sql_old_psw = "SELECT password FROM user WHERE id_user=$id";
        $stmt_old_psw = $pdo->query($sql_old_psw);
        $password = $stmt_old_psw->fetch(PDO::FETCH_ASSOC);
        $password = $password['password'];
        if (password_verify($_POST["old_psw"],$password )){
            if ( $_POST["old_psw"] != $_POST["new_psw"]) {
                $psw = password_hash($_POST["new_psw"], PASSWORD_ARGON2I);
                try{
                    $sql = "UPDATE user SET password=?  WHERE id_user=?";
                    $stmt = $pdo->prepare($sql);
                    if ( $stmt->execute([$psw, $id]) ) {
                        $response = [
                            'message' => "Mot de passe changé avec succès.",
                            'status' => "success" 
                        ];
                        echo json_encode($response);
                    }else{
                        $response = [
                            'message' => "Erreur interne, veuillez recommencer plus tard",
                            'status' => "failed" 
                        ];
                        echo json_encode($response);
                    }

                }catch(Exception $e){
                    $response = [
                        'message' => $e->getMessage(),
                        'status' => "failed" 
                    ];
                    echo json_encode($response);

                }
            }else{
                $response = [
                    'message' => "l'ancien mot de passe correspon au nouveau, veuillez en choisir un autre.",
                    'status' => "failed" 
                ];
                echo json_encode($response);
                // envoyer message : l'ancien mot de passe correspon au nouveau, veuillez en choisir un autre.
            }

        }else{
            $response = [
                'message' => "l'ancien mot de passe ne correspond pas.",
                'status' => "failed" 
            ];
            echo json_encode($response);
            // envoyer message : l'ancien mot de passe ne correspond pas.
        }
}else {
    $response = [
        'message' => "Veuillez remplir le formulaire correctement.",
        'status' => "failed" 
    ];
    echo json_encode($response);

}