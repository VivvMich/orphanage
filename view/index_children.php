<?php
    include_once "base.php";
    include_once "../model/pdo.php";
    // $sql = "SELECT * FROM child";
    // $stmt = $pdo->query($sql);
    // $children = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ///////FONCTIONS ////////////

    function dateToFrenchDate(DateTime $date) : String {
        $formatter = new IntlDateFormatter("fr_FR", IntlDateFormatter::LONG );
        $formatter->setPattern('d MMMM Y');
        return $formatter->format($date) . "( " .getAgeFromDate($date) . " ans )";
    }

    function getAgeFromDate(DateTime $date) : int {
        return ((int)date_diff($date, new DateTime('now'))->y);
    }

    // PAGINATION

    // Nombre d'enfant dans l'orphelinat
    $sql_children = "SELECT COUNT(*) FROM child";
    $nbr = $pdo->query($sql_children);
    $childrenNbr = $nbr->fetch();
    $childrenNbr = $childrenNbr[0];
    $nbrByPage = 10;
    $page = ceil($childrenNbr / $nbrByPage);

    if (isset($_GET["page"]) && $_GET["page"] != 0 && $_GET["page"] <= $page){
        // On arrondi à l'unité supérieur pour pas perdre des pages
        // où le nombre d'enfant n'atteint pas 10.
        $currentPage = (int)$_GET["page"];
        $offset = ($currentPage * $nbrByPage) - $nbrByPage;
        $sql = "SELECT * FROM child ORDER BY id_child ASC LIMIT $offset, $nbrByPage";
        $stmt = $pdo->query($sql);
        $children = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {
        header("Location:index_children.php?page=1");
    }






?>

<h1 class="text-center">Liste des enfants</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Origine</th>
            <th>Sexe</th>
            <th>Options</th>
                <!-- //Permet de récupérer le nom des colonnes de la table child
                // $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'child' ORDER BY ORDINAL_POSITION";
                // $stmt = $pdo->query($sql);
                // $columns = $stmt->fetchAll(PDO::FETCH_NUM);
                // foreach($columns as $column){
                //     echo "<th>$column[0]</th>";
                //} -->
        </tr>
    </thead>
    <tbody>
        <?php 
            $table = "";
            foreach($children as $child){
                $date = new DateTime($child["birthdate"]);
                $table .= "<tr>";
                $table .= "<td>$child[first_name]</td>";
                $table .= "<td>$child[last_name]</td>";
                $table .= "<td>" . dateToFrenchDate($date) ."</td>";
                $table .= "<td>$child[origin]</td>";
                $table .= "<td>$child[sex]</td>";
                $table .= "<td><a href='../controller/delete_ctrl_children.php?id=$child[id_child]'><img src=''></a></td>";
                $table .= "</tr>";
            }
            echo $table;
        
        ?>           
    </tbody>
</table>

<nav aria-label="Page navigation children">
  <ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="index_children.php?page=1"><<</a></li>
    <?php 
        if(isset($_GET["page"])){
            $currentPage = (int)$_GET["page"];

            for($i = 1; $i <= $page; $i++){
                if( $i <= $currentPage + 2 && $i >= $currentPage - 2 ){
                    echo "<li class='page-item'><a class='page-link' href='index_children.php?page=$i'>$i</a></li>";
                }
            }
        }
    ?>
      <li class="page-item"><a class="page-link" href="index_children.php?page=<?= $page ?>">>></a></li>
  </ul>
</nav>


</body>
</html>