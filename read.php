<?php 

    try {
    $dbase = new PDO('mysql:host=localhost;dbname=apicrud','root', '');
    $result = $dbase -> prepare('SELECT id,nom,prenoms,dateNaissance,email,sexe FROM etudiants'); 
    $result -> execute();
    $response = array();

        if ($result) {
            
            while ($donnees = $result->fetch()){
             //   array_push($response,$donnees);
             echo $donnees ;

            }

        } else {
            echo "Erreur de lecture de la base de données.";
        } 
        
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $dbase = null;
   // echo json_encode($response) ;
?>