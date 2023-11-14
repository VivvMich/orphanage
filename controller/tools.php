<?php 

function sendMessage(string $message, string $status, string $location, int|null $page = null) :void {
    if ($page == null){
        header("Location:$location?message=$message&status=$status");
        exit;
    }else{
        header("Location:$location?page=$page&message=$message&status=$status");
        exit; 
    }

}

/**
 * Cette fonction va créer des inputs radio à partir 
 * de la base de données.
 * CollumName -> Correspond au nom de la colonne dans la BDD.
 * dBValue -> Correspond à la valeur venu de la BDD pour selectioner l'input radio parmis les $values.
 */
function createCheckButton(string $collumnName, string $dBValue, array $values) : string {
    $result = '';
    foreach ($values as $value) {
    $result .= "<div class='form-check'>";
    $upper = ucfirst($value);
        if($value === $dBValue){
            $result .= "<input class='form-check-input' type='radio' name='$collumnName' checked value='$value' id=''>";
        }else{
            $result .= "<input class='form-check-input' type='radio' name='$collumnName' value='$value' id=''>";
        }
    
    $result .= "<label class='form-check-label' for='$collumnName'>$upper</label></div>";
    }
    return $result;
}