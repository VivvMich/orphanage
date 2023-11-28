<?php
    include_once "../../controller/role.php";
    include_once "../base.php";
    include_once "../../model/pdo.php";
    include_once "../../controller/tools.php";

    if($_SESSION['role'] >= Role::CUSTOMER->value ) {

if (isset($_GET['id']) && isset($_GET['page'])) {
    $id = $_GET['id'];
    $sql ="SELECT child.*, CONCAT(user.first_name, ' ', user.last_name) AS tutor FROM child INNER JOIN user ON child.user = user.id_user WHERE id_child=$id";

    $stmt = $pdo->query($sql);
    $child = $stmt->fetch(PDO::FETCH_ASSOC);
    
    ?>

    <h1 class="text-center"><?= "$child[first_name] $child[last_name]" ?></h1>

    <h2 class="text-center" id='message'></h2>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="text-center">
                    <img class="image-fluid rounded" width="50%" src="img/children.jpeg" alt="imaginez un enfant malheureux sur cette photo">
                </div>


                <div class="bg-warning w-50 mx-auto my-3 p-2 rounded">
                    <h2 class="text-center">Attention</h2>
                    <p class="text-center">Il se peut que l'image du produit soit un peu trop optimiste.</p>
                </div>
            </div>
            <div class="col-6">
                <ul class="list-group">
                <?php $date = new DateTime($child["birthdate"]) ?>
                    <li class="list-group-item text-center">Date de naissance : <?= dateToFrenchDate($date)  ?></li>
                    <li class="list-group-item text-center">Sexe : <?= $child["sex"] == "homme" ? "<span class='h4'>♂</span>" : "<span class='h4'>♀</span>" ?> </li>
                    <li class="list-group-item text-center">Origine : <?= htmlentities($child['origin']) ?></li>
                    <li  class="list-group-item text-center" >Tuteur actuel : <span id="tutor"><?= $child['tutor'] ?></span></li>
                </ul>

                <!-- AJAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                <?php if($_SESSION['role'] >= Role::SECRETARY->value ) { ?>
                <form id="submit">
                <select class="form-select my-3" name="tutor" >
                    <option value="error" selected>Selectionner un nouveau tuteur</option>
                    <?php 
                    $sql = "SELECT id_user, first_name, last_name FROM user";
                    $stmt = $pdo->query($sql);
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($users as $user) {
                        echo "<option value='$user[id_user]'> $user[first_name] $user[last_name]</option>";
                    }
                    
                    ?>
                        <input type="hidden" name="child" value="<?= htmlentities($child["id_child"]) ?>">
                        <input class="btn btn-warning my-3 mx-auto" type="submit" value="Changer de tuteur" >


                </select>
                </form>
                <div class="text-center">
                    <?php 
                        echo "<a class='btn btn-primary my-4' href='view/children/update_children.php?id=$child[id_child]&page=$_GET[page]'>Modifier $child[first_name] $child[last_name]</a>";
                    ?>
                </div>
                <?php }?>
            </div>
        </div>
    </div>





    <?php }?>

</body>
</html>

<?php  } else {
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} ?>