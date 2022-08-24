<?php 

 // initialisation des variables relatives au formulaire
    $id = null;
    $nom = null;
    $prenoms = null;
    $date = null;
    $sexe = null ;
    $email = null ;
    $name = null ;
    if (!empty($_POST)) {
        $id = $_POST["id"];           
        $nom = $_POST["nom"];
        $prenoms = $_POST["prenoms"];
        $sexe = $_POST["sexe"];
        $date = $_POST["date"];
        $email = $_POST["email"];
        $name = $_FILES['doc']['name'] ;
    } 
    try {
        
        $dbase = new PDO('mysql:host=localhost;dbname=apicrud','root', '');
        $result = $dbase ->msqli-> prepare("UPDATE etudiants SET nom = ?, prenoms = ?,dateNaissance=?,sexe=?,email=?doc=?  WHERE id= ?"); 
        $result->bind_param('si',$nom,$prenoms,$dateNaissance,$sexe,$email,$doc,$id) ;
        $result-> execute();
        // $result -> execute(array(':id' => $id));

            if ($result) {

                echo "Informations modifiées !";
                
            } else {
                echo "Erreur de lecture de la base de données.";
            } 
            
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $dbase = null;


?>