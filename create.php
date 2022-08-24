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
            $type = $_FILES['doc']["type"] ;
            $name = $_FILES['doc']['name'] ;

    }     
        $request="INSERT INTO  etudiants  (id,nom,prenoms,dateNaissance,sexe,email,doc)
                VALUES('".$id."','".$nom."','".$prenoms."','".$date."','".$sexe."','".$email."','".$name."')" ;
        
            try {
                $dbh = new PDO('mysql:host=localhost;dbname=apicrud','root', '');                
                $sth = $dbh->prepare($request);
                $sth->execute();
            
                
                $sth = null;
                $dbh = null;

            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
            }

            echo json_encode(["réponse"=>12])
   
    ?>