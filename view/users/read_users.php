<?php
    include_once "../../controller/role.php";
    include_once "../base.php";
    include_once "../../model/pdo.php";
    include_once "../../controller/tools.php";

    if($_SESSION['role'] == Role::ADMIN->value ) {

if (isset($_GET['id']) && isset($_GET['page'])) {
    $id = $_GET['id'];

    // On récupère les données de l'utilisateur

    $sql ="SELECT * FROM user WHERE id_user=$id";
    $stmt = $pdo->query($sql);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // On récupère les enfant donc l'utilisateur est tuteur

    $sqlChildren = "SELECT CONCAT(first_name,' ', last_name) AS child_name FROM child WHERE user = $id ORDER BY first_name ASC";
    $stmtChildren = $pdo->query($sqlChildren);
    $children = $stmtChildren->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <h1 class="text-center"><?= "$user[first_name] $user[last_name]" ?></h1>

    <h2 class="text-center" id='message'></h2>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="text-center">
                    <img class="image-fluid rounded" width="50%" src="img/predateur.jpg" alt="imaginez un enfant malheureux sur cette photo">
                </div>

            </div>
            <div class="col-6">
                <ul class="list-group">
                    <li class="list-group-item text-center">Rue : <?= htmlentities($user['street_name'])  ?></li>
                    <li class="list-group-item text-center">Ville : <?= htmlentities($user['city']) ?></li>
                    <li class="list-group-item text-center">Code Postal : <?= htmlentities($user['zip_code']) ?></li>
                    <?php $roles = ['Visiteur', 'Client', 'Secrétaire', 'Admin'] ?>
                    <li  class="list-group-item text-center" >Role: <?= $roles[$user['role']] ?> </li>

                </ul>
                
                <div class="rounded border my-2 overflow-auto h-25">
                    <h2 class="text-center">Tuteur de :</h2>
                    <ul class="list-unstyled text-center">
                        <?php 
                            foreach($children as $child) {
                               echo "<li>$child[child_name]</li>"; 
                            }
                        ?>
                    </ul>
                </div>


            </div>
        </div>
    </div>
    <?php }?>
</body>
</html>

<?php  } else {
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} ?>