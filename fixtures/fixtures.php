<?php

include_once "../model/pdo.php";
// A EVITER !
    // $data = file_get_contents("https://randomuser.me/api/");
    // $json = json_decode($data);
    // var_dump($json);

    // Ici cette requete SQL recupère tous les enfants et les comptes
$sql_children = "SELECT COUNT(*) FROM child";
$nbr = $pdo->query($sql_children);
$resultNumber = $nbr->fetch();

if($resultNumber[0] < 100){
    // On initialise curl.
    $ch = curl_init();

    // On donne à curl l'url de l'API
    curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api/?results=100");
    // On demande à curl de stringifier ( mettre en chaine de caractère la réponse de l'API)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Ici on met la methode d'envoi ou de reception comme un formulaire.
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

    // Ici on modifie l' entête de notre requete (métadonnées de notre requete)
    $header = ["Accept: application/json"];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    // On execute curl et on transforme la chaine de caractère récupérée en fichier json ensuite on le transforme en tableau
    // afin de pouvoir l'utiliser en php.
    $children = json_decode(curl_exec($ch),true);
    // Ne pas oublier de ferme curl pour des raisons d'optimisation de la mémoire.
    curl_close($ch);
    // var_dump($children["results"]);
    $results = $children["results"];

    foreach($results as $child){
        
        $firstName = $child["name"]["first"];
        $lastName = $child["name"]["last"];
        $sex = $child["gender"] === "male" ? "homme" : "femme";
        $origin = $child["location"]["country"];
        
        $today = new DateTime();
        $older = $today->getTimestamp() - 536112000; // On enlève 17 ans à la date du jour.
        $younger = $today->getTimestamp() - 15552000 ; // né en 2023 janvier
        // Nous utilisons les timestamps pour générer des dates de naissance aléatoire.
        $randAge = rand($older, $younger);
        // Ici nous allons convertir le timestamp en date lisible.
        $date = new DateTime();
        $date->setTimestamp($randAge);

        $sql = "INSERT INTO child (first_name, last_name, birthdate, origin, sex) VALUES (?,?,?,?,?)";
        try{
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$firstName, $lastName, $date->format("Y-m-d"), $origin, $sex]);
            echo "Tout s'est bien passé, merci de votre patience.";
        }catch(Exception $e){
            echo $e->getMessage();
        }

    }
}else {
    echo "Quota atteint !";
}





