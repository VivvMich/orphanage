<?php
    include_once "../../controller/role.php";
    include_once "../base.php";
    include_once "../../model/sql.php";
    include_once "../../controller/tools.php";

    if($_SESSION['role'] == Role::ADMIN->value ) {

    
?>

<h1 class="text-center">Modifier du mot de passe</h1>

<div id="message_psw"></div>

<form id="form_psw" class="mx-auto">

<label for="old_psw">Ancien mot de passe</label>
<input class="form-control" type="password" name="old_psw">

<label for="new_psw">Nouveau mot de passe</label>
<input class="form-control" type="password" name="new_psw">


<input type="hidden" name="id_user" value="<?= htmlentities($_GET['id']) ?>">
<input type="hidden" name="page" value="<?= htmlentities($_GET['page']) ?>">

<input class="form-control" type="submit" value="Modifier">
</form>

</body>
</html>

<?php  } else {
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} ?>