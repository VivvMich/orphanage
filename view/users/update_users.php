<?php
    include_once "../../controller/role.php";
    include_once "../base.php";
    include_once "../../model/sql.php";
    include_once "../../controller/tools.php";

    if($_SESSION['role'] == Role::ADMIN->value ) {

    if (isset($_GET['id'])) {
        $user = selectAll("user", $_GET['id']);
    }
    
?>

<h1 class="text-center">Modifier un(e) gros(se) dégeulasse</h1>

<?php include_once "../message.php" ?>

<form id="form" class="mx-auto" action="controller/update_ctrl_users.php" method="post">

<label for="first_name">Prénom</label>
<input class="form-control" type="text" name="first_name" id="" value="<?= htmlentities($user['first_name']) ?>">

<label for="last_name">Nom</label>
<input class="form-control" type="text" name="last_name" id="" value="<?= htmlentities($user['last_name']) ?>">

<label for="street_name">Nom de la rue</label>
<input class="form-control" type="text" name="street_name" id="" value="<?= htmlentities($user['street_name']) ?>">

<label for="city">Ville</label>
<input class="form-control" type="text" name="city" id="" value="<?= htmlentities($user['city']) ?>">

<label for="zip_code">Code Postal</label>
<input class="form-control" type="text" name="zip_code" id="" value="<?= htmlentities($user['zip_code']) ?>">

<!-- // Pour eviter que l'administrateur se mette un role inferieur -->

<?php if ($user['role'] != Role::ADMIN->value ) { ?>

<label for="role">Role</label>
<select class="form-control" name="role" id="">
<?php 
$roles = ["Visiteur", "Client", "Secrétaire", "Administrateur"];
    foreach($roles as $index => $role){
        if ( $index == $user['role']){
            echo "<option value='$index' selected>$role</option>";
        }else{
            echo "<option value='$index'>$role</option>";
        }
        
    }

?>
</select>
<?php } else {
    
   echo '<input type="hidden" name="role" value=' . $user["role"] .'>';

    
    }?>

<label for="mail">Courriel</label>
<input class="form-control" type="text" name="mail" id="" value="<?= htmlentities($user['mail']) ?>">

<input type="hidden" name="id_user" value="<?= htmlentities($user['id_user']) ?>">
<input type="hidden" name="page" value="<?= htmlentities($_GET['page']) ?>">

<input class="form-control" type="submit" value="Modifier">
</form>

</body>
</html>

<?php  } else {
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} ?>