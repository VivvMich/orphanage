<?php
    include_once "base.php";
    include_once "../model/pdo.php";
    $sql = "SELECT * FROM child";
    $stmt = $pdo->query($sql);
    $children = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ///////FONCTIONS ////////////

    function dateToFrenchDate(DateTime $date) : String {
        $formatter = new IntlDateFormatter("fr_FR", IntlDateFormatter::LONG );
        $formatter->setPattern('d MMMM Y');
        return $formatter->format($date) . "( " .getAgeFromDate($date) . " ans )";
    }

    function getAgeFromDate(DateTime $date) : int {
        return ((int)date_diff($date, new DateTime('now'))->y);
    }

?>

<h1 class="text-center">Liste des enfants</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <?php
                //Permet de récupérer le nom des colonnes de la table child
                $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'child' ORDER BY ORDINAL_POSITION";
                $stmt = $pdo->query($sql);
                $columns = $stmt->fetchAll(PDO::FETCH_NUM);
                foreach($columns as $column){
                    echo "<th>$column[0]</th>";
                }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php 
            $table = "";
            foreach($children as $child){
                $date = new DateTime($child["birthdate"]);
                $table .= "<tr>";
                $table .= "<td>$child[id_child]</td>";
                $table .= "<td>$child[first_name]</td>";
                $table .= "<td>$child[last_name]</td>";
                $table .= "<td>" . dateToFrenchDate($date) ."</td>";
                $table .= "<td>$child[origin]</td>";
                $table .= "<td>$child[sex]</td>";
                $table .= "</tr>";
            }
            echo $table;
        
        ?>           
    </tbody>
</table>




</body>
</html>