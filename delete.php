<?php 
try {
    $dbase = new PDO('mysql:host=localhost;dbname=apicrud','root', '');
    $result = $dbase -> prepare("DELETE FROM etudiants WHERE id=:id"); 
    $id=$_GET['idEtu'] ;
    $result -> execute(array(':id' => $id));

        if ($result) {

            echo "Etudiant supprimé !";
            
        } else {
            echo "Erreur de lecture de la base de données.";
        } 
        
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $dbase = null;


?>