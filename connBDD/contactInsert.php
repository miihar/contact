<?php
include ("connexionbdd.php");

$test = new MaConnexion("contact", "", "root", "localhost");

$inserContact = $test->insertionContact(
    $_POST['Nom'], $_POST['Prenom'], $_POST['Numero']
);

header("Location: interface.php");


?>