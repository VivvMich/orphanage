<?php
    include_once "../../controller/role.php";
    include_once "../base.php";
    include_once "../../model/pdo.php";


    ///////FONCTIONS ////////////
    include_once "../../controller/tools.php";


    if($_SESSION['role'] >= Role::CUSTOMER->value ) {

    // Nombre d'enfant dans l'orphelinat
    $sql_children = "SELECT COUNT(*) FROM child WHERE isDelete != true";
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
        $sql = "SELECT * FROM child WHERE isDelete != true ORDER BY id_child ASC LIMIT $offset, $nbrByPage";
        $stmt = $pdo->query($sql);
        $children = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {
        header("Location:index_children.php?page=1");
    }






?>

<h1 class="text-center">Liste des enfants</h1>
<?php include_once "../message.php" ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <th>Origine</th>
            <th>Sexe</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(isset($_GET["page"])){
            $table = "";
            $p = $_GET["page"];
            $token = $_SESSION['token'];
            foreach($children as $child){
                $date = new DateTime($child["birthdate"]);
                $table .= "<tr>";
                $table .= "<td>" . htmlentities($child['first_name']) . "</td>";
                $table .= "<td>" . htmlentities($child['last_name']) . "</td>";
                $table .= "<td>" . dateToFrenchDate($date) ."</td>";
                $table .= "<td>" . htmlentities($child['origin']) ."</td>";
                $table .= "<td>$child[sex]</td>";
                if ($_SESSION['role'] >= Role::SECRETARY->value){
                    $table .= "<td><a class='destroy-child' data-toggle='tooltip' data-placement='top' title='Information sur l'enfant' href='view/children/read_children.php?id=$child[id_child]&page=$p'>👁️</a><a class='destroy-child bomb' data-bs-toggle='modal'  data-bs-target='#validation_delete'
                    data-link='controller/delete_ctrl_children.php?id=$child[id_child]&page=$p&token=$token' href=''>💣</a><a class='destroy-child' data-toggle='tooltip' data-placement='top' title='Modifier un gosse' href='view/children/update_children.php?id=$child[id_child]&page=$p'>🧬</a></td>";
                }else {
                    $table .= "<td><a class='destroy-child' data-toggle='tooltip' data-placement='top' title='Information sur l'enfant' href='view/children/read_children.php?id=$child[id_child]&page=$p'>👁️</a></td>";
                }
                $table .= "</tr>";
            }
            echo $table;
        }
        ?>           
    </tbody>
</table>

<nav aria-label="Page navigation children">
  <ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="view/children/index_children.php?page=1"><<</a></li>
    <?php 
        if(isset($_GET["page"])){
            $currentPage = (int)$_GET["page"];

            for($i = 1; $i <= $page; $i++){
                if( $i <= $currentPage + 2 && $i >= $currentPage - 2 ){
                    echo "<li class='page-item'><a class='page-link' href='view/children/index_children.php?page=$i'>$i</a></li>";
                }
            }
        }
    ?>
      <li class="page-item"><a class="page-link" href="view/children/index_children.php?page=<?= $page ?>">>></a></li>
  </ul>
</nav>

<div class="modal fade" id="validation_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Elimination du sujet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous supprimez cet enfant ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <a class="btn btn-primary" id="delete" >SUPPRIMER</a>
      </div>
    </div>
  </div>
</div>



</body>
</html>

<?php  } else {
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} ?>