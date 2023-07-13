<?php
class MaConnexion{
    // étape 1 : ici on met les proprietées
    private $nomBaseDeDonnees;
    private $motDePasse;
    private $nomUtilisateur;
    private $hote;
    private $connexionPDO;

    public function __construct($nomBaseDeDonnees, $motDePasse, $nomUtilisateur, $hote){
        
        $this -> nomBaseDeDonnees = $nomBaseDeDonnees;
        $this -> motDePasse = $motDePasse;
        $this -> nomUtilisateur = $nomUtilisateur;
        $this -> hote = $hote;

        try {
            $dsn = "mysql:host=$this->hote;dbname=$this->nomBaseDeDonnees;charset=utf8mb4";
            $this->connexionPDO = new PDO($dsn, $this->nomUtilisateur, $this->motDePasse);
            $this->connexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "erreur : ".$e->getMessage();
        }        
    }

    //fonction pour selectionner des elements dans la bdd
    public function selectContact($table){
        try {
            $requete = "SELECT * from $table";
            $requete_preparee = $this->connexionPDO->prepare($requete);
            $resultat = $requete_preparee->execute();
            $resultat = $requete_preparee->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;

        } catch (PDOException $error) {
            return "Erreur : " . $error->getMessage();
        }
    }

    public function insertionContact($nom,$prenom,$tel){
        try {
            $requete = " INSERT INTO contact(Nom, Prenom, Numero) 
                VALUES (:Nom, :Prenom, :Numero)" ;
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindParam(':Nom',$nom,PDO::PARAM_STR,30);
            $requete_preparee->bindParam(':Prenom',$prenom,PDO::PARAM_STR,50);
            $requete_preparee->bindParam(':Numero',$tel,PDO::PARAM_INT,10);

            $requete_preparee->execute();
            echo ("insertion reussi");
            return "insertion reussi";

        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    // Fonction de mis à jour du statut de la salle dans la table Salle 
    public function maj_contact($contactName,$contactPrenom,$contactNum, $id){
        try {

            $requete = "UPDATE contact 
                SET Nom = ?, Prenom = ?, Numero = ?
                WHERE ID_Contact = $id ";

            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->bindValue(1,$contactName,PDO::PARAM_STR);
            $requete_preparee->bindValue(2,$contactPrenom,PDO::PARAM_STR);
            $requete_preparee->bindValue(3,$contactNum,PDO::PARAM_STR);


            $requete_preparee->execute();

            echo("mise a jour reussi");
            return "mise a jour reussi";
        
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteContact($id){
        try{
            $requete = "DELETE FROM contact WHERE ID_Contact = $id";
            $requete_preparee = $this->connexionPDO->prepare($requete);

            $requete_preparee->execute();
            echo 'modification reussie';
            return $requete_preparee;

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}




//$inser = $test->insertionContact("doe","john","mail@mail.co");
//var_dump($inser);

// $sallee = $test->maj_contact("doe","john","9000123452");
// var_dump($sallee);


?>