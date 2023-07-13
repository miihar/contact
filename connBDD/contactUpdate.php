<?php
include ("connexionbdd.php");

$test = new MaConnexion("contact", "", "root", "localhost");

$updateContact = $test->maj_contact(
    $_POST['Nom'], $_POST['Prenom'], $_POST['Numero'],$_POST['ID_Contact']
);

header("Location: interface.php");


?>