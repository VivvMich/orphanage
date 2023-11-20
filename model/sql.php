<?php
/** Cette fonction permetra de racourcir le code permettant de  
* récupérer chaques mioches par rapport à son id, ou de récupérer tous les enfants.
* Si nous ne mettons pas d'id dans cette fonction alors
* la fonction récupéra tous les gosses.
* exemple $children = selectAll("child")
* sinon elle selectionera l'enfant avec l'id indiqué
* exemple $child = selectAll("child", 40)*/
function selectAll(string $tableName, int|null $id=null) :array {
    $pdo = new PDO("mysql:host=localhost;dbname=orphanage", "formateur", "1234");

    // Dans le cas ou il n'y a pas d'id
    if( $id == null) {
        $sql = "SELECT * FROM $tableName WHERE isDelete != 1";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else{
        // ici on concatène le nom de la table avec id_
        // pour avoir le nom de la colonne "id" associée 
        // à cette table
        $idName = "id_" . $tableName;
        $sql = "SELECT * FROM $tableName WHERE $idName = $id AND isDelete != 1";
        $stmt = $pdo->query($sql);
        // On retourne le tableau associatif de la requête.
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


function updateData(string $tableName, array $data) {
    $pdo = new PDO("mysql:host=localhost;dbname=orphanage", "formateur", "1234");
    // Ici Nous allons fabriquer la requete sql à partir uniquement du nom de sa table.
    $columnName = getColumn($tableName);
    $header_sql = "UPDATE $tableName SET ";
    // Ce qui est entre le SET et le WHERE
    $body_sql = "";
    // WHERE jusqu'a la fin
    $footer_sql = "";
    // Nous avons besoin de connaitre la taille du tableau
    // qui contient les noms des collones
    $columnCount = count($columnName);
    foreach($columnName as $index => $name) {
        // Ici nous allons faire le footer de la requete en premier
        // car le nom de la colonne est en premier dans la base de donnée
        if ( $index === 0) {
            $footer_sql = " WHERE $name=?";
        } elseif ($index > 0 && $index < $columnCount - 1 ) {
            $body_sql .= "$name=?,";
        }else {
            $body_sql .= "$name=?";
        }
    }
    try{
        $stmt = $pdo->prepare($header_sql . $body_sql . $footer_sql);
        $stmt->execute($data);
    }catch(Exception $e){
        throw new Exception($e->getMessage());
    }

}

function getColumn(string $tableName) : array{
    $array = [];
    $pdo = new PDO("mysql:host=localhost;dbname=orphanage", "formateur", "1234");
    $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='$tableName' ORDER BY ORDINAL_POSITION";
    $stmt = $pdo->query($sql);
    $columns = $stmt->fetchAll(PDO::FETCH_NUM);
    foreach($columns as $column){
        if ( $column[0] != "isDelete" && $column[0] != "user"){
            $array[] = $column[0];
        }

    }
    return $array;
}