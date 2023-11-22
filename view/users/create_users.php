<?php
    include_once "../base.php";
?>

<h1 class="text-center">Ajouter un tortionaire</h1>

<?php include_once "../message.php" ?>

<form id="form" class="mx-auto" action="controller/create_ctrl_user.php" method="post">

<label for="first_name">Prénom</label>
<input class="form-control" type="text" name="first_name" id="">

<label for="last_name">Nom</label>
<input class="form-control" type="text" name="last_name" id="">

<label for="street_name">Nom de la rue</label>
<input class="form-control" type="text" name="street_name" id="">

<label for="city">Ville</label>
<input class="form-control" type="text" name="city" id="">

<label for="zip_code">Code postal</label>
<input class="form-control" type="text" name="zip_code" id="">

<label for="role">Role</label>
<input class="form-control" type="text" name="role" id="">

<label for="password">Mot de passe</label>
<input class="form-control" type="text" name="password" id="">

<label for="mail">Courriel</label>
<input class="form-control" type="text" name="mail" id="">

<input class="btn btn-primary my-2 form-control" type="submit" value="Ajouter">
</form>




</body>
</html>