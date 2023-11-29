<?php
    include_once "../../controller/role.php";
    include_once "../base.php";
    include_once "../../model/pdo.php";


    ///////FONCTIONS ////////////
    include_once "../../controller/tools.php";


    if($_SESSION['role'] == Role::ADMIN->value ) {

    // Nombre d'utilisateur
    $sql_users = "SELECT COUNT(*) FROM user WHERE isDelete != true";
    $nbr = $pdo->query($sql_users);
    $usersNbr = $nbr->fetch();
    $usersNbr = $usersNbr[0];
    $nbrByPage = 10;
    $page = ceil($usersNbr / $nbrByPage);

    if (isset($_GET["page"]) && $_GET["page"] != 0 && $_GET["page"] <= $page){
        // On arrondi à l'unité supérieur pour pas perdre des pages
        // où le nombre d'enfant n'atteint pas 10.
        $currentPage = (int)$_GET["page"];
        $offset = ($currentPage * $nbrByPage) - $nbrByPage;
        $sql = "SELECT * FROM user WHERE isDelete != true ORDER BY id_user ASC LIMIT $offset, $nbrByPage";
        $stmt = $pdo->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {
        header("Location:index_users.php?page=1");
    }






?>

<h1 class="text-center">Liste des utilisateurs</h1>
<?php include_once "../message.php" ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Role</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(isset($_GET["page"])){
            $table = "";
            $p = $_GET["page"];
            $token = $_SESSION['token'];
            $roleArray = ["Visiteur", "Client", "Secrétaire", "Administrateur"];
            foreach($users as $user){
                $table .= "<tr>";
                $table .= "<td>" . htmlentities($user['first_name']) . "</td>";
                $table .= "<td>" . htmlentities($user['last_name']) . "</td>";
                $table .= "<td>" . $roleArray[$user['role']] ."</td>";
                    $table .= "<td><a class='destroy-child' data-toggle='tooltip' data-placement='top' title='Information sur l'utilisateur' href='view/users/read_users.php?id=$user[id_user]&page=$p'>👁️</a><a class='destroy-child bomb' data-bs-toggle='modal'  data-bs-target='#validation_delete'
                    data-link='controller/delete_ctrl_users.php?id=$user[id_user]&page=$p&token=$token' href=''>💣</a><a class='destroy-child' data-toggle='tooltip' data-placement='top' title='Modifier un utilisateur' href='view/users/update_users.php?id=$user[id_user]&page=$p'>🧬</a><a class='destroy-child' data-toggle='tooltip' data-placement='top' title='Modifier un utilisateur' href='view/users/update_users_password.php?id=$user[id_user]&page=$p'>🔒</a></td>";
                $table .= "</tr>";
            }
            echo $table;
        }
        ?>           
    </tbody>
</table>

<nav aria-label="Page navigation users">
  <ul class="pagination justify-content-center">
  <li class="page-item"><a class="page-link" href="view/users/index_users.php?page=1"><<</a></li>
    <?php 
        if(isset($_GET["page"])){
            $currentPage = (int)$_GET["page"];

            for($i = 1; $i <= $page; $i++){
                if( $i <= $currentPage + 2 && $i >= $currentPage - 2 ){
                    echo "<li class='page-item'><a class='page-link' href='view/users/index_users.php?page=$i'>$i</a></li>";
                }
            }
        }
    ?>
      <li class="page-item"><a class="page-link" href="view/users/index_users.php?page=<?= $page ?>">>></a></li>
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
        Voulez-vous supprimez cet personne ?
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