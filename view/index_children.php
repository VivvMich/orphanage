<?php
    include_once "base.php";
    include_once "../model/pdo.php";
    $sql = "SELECT * FROM child";
    $stmt = $pdo->query($sql);
    $children = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($children)
?>

<h1 class="text-center">Liste des enfants</h1>




</body>
</html>