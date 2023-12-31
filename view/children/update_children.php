<?php
    include_once "../../controller/role.php";
    include_once "../base.php";
    include_once "../../model/sql.php";
    include_once "../../controller/tools.php";

    if($_SESSION['role'] >= Role::SECRETARY->value ) {

    if (isset($_GET['id'])) {
        $child = selectAll("child", $_GET['id']);
        $d = new DateTime($child['birthdate']);
    }
    
?>

<h1 class="text-center">Modifier un enfant</h1>

<?php include_once "../message.php" ?>

<form id="form" class="mx-auto" action="controller/update_ctrl_children.php" method="post">

<label for="first_name">Prénom</label>
<input class="form-control" type="text" name="first_name" id="" value="<?= htmlentities($child['first_name']) ?>">

<label for="last_name">Nom</label>
<input class="form-control" type="text" name="last_name" id="" value="<?= htmlentities($child['last_name']) ?>">

<label for="birthdate">Date de Naissance</label>
<input class="form-control" type="date" name="birthdate" id="" value="<?= $d->format('Y-m-d')?>">

<label for="origin">Pays de naissance</label>
<input class="form-control" type="text" name="origin" id="" value="<?= htmlentities($child['origin']) ?>">

<?php
    $gender = ['homme', 'femme'];
    echo createCheckButton("sex", $child['sex'], $gender);
?>

<input type="hidden" name="id_child" value="<?= htmlentities($child['id_child']) ?>">
<input type="hidden" name="page" value="<?= htmlentities($_GET['page']) ?>">

<input class="form-control" type="submit" value="Modifier">
</form>

</body>
</html>

<?php  } else {
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} ?>