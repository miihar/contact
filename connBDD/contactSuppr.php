<?php
include "connexionbdd.php";

$test = new MaConnexion("contact", "", "root", "localhost");
// à definir commet integrer
$supprContact = $test->deleteContact($id);

header("Location: interface.php");


?>