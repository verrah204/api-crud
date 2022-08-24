<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Crud</title>
</head>
<body>

    <?php
            

            // initialisation des variables relatives au formulaire
            $id = null;
            $nom = null;
            $prenoms = null;
            $date = null;
            $sexe = null ;
            $email = null ;
            $type = null ;
            // initialisation du compteur
            $compt = 0;
            
            if (!empty($_POST)) {
                    $id = $_POST["id"];           
                    $nom = $_POST["nom"];
                    $prenoms = $_POST["prenoms"];
                    $sexe = $_POST["sexe"];
                    $date = $_POST["date"];
                    $email = $_POST["email"];
                    $type = $_FILES['doc']["type"] ;
                    $name = $_FILES['doc']['name'] ;
                    $extension = pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION) ;
                    $size = $_FILES['doc']["size"] ;

            }     

    ?>
        
    <div class="row">

        <div class="col-3 bg-dark text-light justify-content-center align-items-center p-4  ">   
            <form action="" method="POST" id="form" class="p-3" ENCTYPE="multipart/form-data">
                <!-- Champs ID et traitement associé -->
                <div class="">
                    <label for="name" class=" form-label ">Numéro Matricule:</label>
                    <input type="text" class="form-control "  name="id" value="<?php echo $id ?>" >
                    <?php 
                    if (!empty($_POST)) {
                        if (empty($_POST["id"])) {
                            echo " <i class = ' text-danger'> Veuillez remplir ce champs </i> <br>" ;
                        }
                        else {
                            echo "<i class = ' text-success'> valide  </i>" ;
                            $compt = $compt + 1;
                        }
                    }
                    ?>
                </div>

                <!-- Champs Nom et traitement associé -->
                <div class=" mt-1 ">
                    <label for="name" class=" form-label  ">Nom:</label>
                    <input type="text" class="form-control "  name="nom" value="<?php echo $nom ?>" >
                    <?php 
                    if (!empty($_POST)) {
                        if (empty($_POST["nom"])) {
                            echo " <i class = ' text-danger'> Veuillez remplir ce champs </i> <br>" ;
                        }
                        else if (strlen($nom)<3 ) 
                            echo "<i class = ' text-danger'> Ce champs doit contenir au moins 3 carractères </i>  <br>" ;
                        else {
                            echo "<i class = ' text-success'> valide  </i>" ;
                            $compt = $compt + 1;
                        }
                    }
                    ?>
                </div>

                <!-- Champs Prénoms et traitement associé -->
                <div class="mt-1 ">
                    <label for="name" class="form-label ">Prénoms:</label>
                    <input type="text" class="form-control"  name="prenoms" value="<?php echo $prenoms ?>" >
                    <?php 
                    if (!empty($_POST)) {
                        if (empty($_POST["prenoms"])) {
                            echo " <i class = ' text-danger'> Veuillez remplir ce champs </i> <br>" ;
                        }
                        else if (strlen($prenoms)<3 ) 
                            echo "<i class = ' text-danger'> Ce champs doit contenir au moins 3 carractères </i>  <br>" ;   
                       else {
                                echo "<i class = ' text-success'> valide  </i>"  ;
                                $compt = $compt + 1;
                            }
                    }
                    ?>
                </div>

                

                <!-- Champs dateNaissance et traitement associé -->
                <div class="mt-1 ">
                    <label for="text" class="form-label ">Date de naissance:</label>
                    <input type="date" class="form-control"  name="date" value="<?php echo $date ?>">
                    <?php 
                    if (!empty($_POST)) {
                        if (empty($_POST["date"])) 
                            echo "<i class = ' text-danger'> Veuillez remplir ce champs </i>  <br>" ;
                            else {
                                echo "<i class = ' text-success'> valide  </i>"  ;
                                $compt = $compt + 1;
                            }
                    }
                    ?>
                </div>

                 <!-- Champs Sexe et traitement associé -->
                 <div class=" mt-1 row">
                        <label for="sexe" class="form-label  ">Sexe:</label>
                        <div class="form-check col mx-4">
                            <input type="radio" class="form-check-input " value = "masculin" checked  name="sexe">Masculin
                            <label class="form-check-label"  for="radio1"></label>
                        </div>
                        <div class="form-check col mx-2">
                            <input type="radio" class="form-check-input" value = "feminin" name="sexe" >Féminin
                            <label class="form-check-label"  for="radio2"></label>
                        </div>
                        <?php 
                        if (!empty($_POST)) {
                            if (empty($_POST["sexe"])) 
                                echo "<i class = ' text-danger'> Veuillez remplir ce champs </i>  <br>" ;
                                else {
                                    echo "<i class = ' text-success'> valide </i>";
                                    $compt = $compt + 1;
                                }
                        }
                        ?>
                    </div>

                <!-- Champs Email et traitement associé -->
                <div class=" mt-1 ">
                    <label for="text" class="form-label ">Email:</label>
                    <input type="email" class="form-control"  name="email" value="<?php echo $email ; ?>">
                    <?php 
                    if (!empty($_POST)) {
                        if (empty($_POST["email"])) 
                            echo "<i class = ' text-danger'> Veuillez remplir ce champs </i>  <br>" ;
                            else {
                                echo "<i class = ' text-success'> valide  </i>"  ;
                                $compt = $compt + 1;
                            }
                    }
                    ?>
                </div>

                <!-- Champs Photo et traitement associé -->
                <div class="mb-1 mt-1 ">
                    <label for="file" class="form-label ">Photo:</label>
                    <input type="file" class="form-control"  name="doc" value="<?php echo $name ; ?>"><br>
                    <?php 
                    if (!empty($_POST)) {
                        if (empty($_POST["doc"])) {
                            $valide = array('jpeg','jpg','gif','png','PNG','JPEG','JPG','GIF');
                            if ((in_array($extension, $valide)) && $size < (3*1024*1024))
                            { 
                                echo "<i class = ' text-success'> valide </i> " ;
                                $compt = $compt + 1;
                            } 
                            else if ((in_array($extension, $valide)) && $size > (3*1024*1024)) 
                                echo "Le fichier est trop lourd" ;
                            else
                            echo " <i class = ' text-danger'> Pas de fichier ou extension non valide </i>";
                        }
                    }    
                    ?>
                </div>
                <!-- boutton d'envoi -->
                <button type="submit" class="btn btn-sm btn-primary ">Ajouter +</button>

                <?php  
                
                if ($compt == 7)  { // Vérifier si les 6 champs sonts bien remplis
                    $statut = true ;
                }
                else {
                    $statut = false ;
                }
                
                if ($statut == true ) { // si les champs sont tous renseignés ->
                    // compteur remis à zéro
                    $compt = 0;
                    
                    // base de données

                    // $request= "CREATE TABLE IF NOT EXISTS `etudiants` (
                    //     `id` varchar(16) NOT NULL,
                    //     `nom` varchar(32) NOT NULL,
                    //     `prenoms` varchar(32) NOT NULL,
                    //     `dateNaissance` date NOT NULL,
                    //     `sexe` varchar(11) NOT NULL,
                    //     `email` varchar(32) NOT NULL,
                    //     `doc` varchar(128) NOT NULL
                    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                      

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
                        die();
                    }

                    
                }else {
                    // compteur mis à zéro
                    $compt = 0;
                }

                ?>
            </form>
        </div>

        <div class="col-9 p-2">
            <div class="row p-3 justify-content-center align-items-center">
                <h5 class="text-center">Informations relatives aux étudiants enregistrés et possibilité de modification</h5>
            </div>
            <div class="row bg-white text-dark justify-content-center align-items-center px-4 mx-2 " id="intro">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom(s)</th>
                            <th>Naissance</th>
                            <th>Email</th>
                            <th>sexe</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php 

                            try {
                                
                                $dbase = new PDO('mysql:host=localhost;dbname=apicrud','root', '');
                                $result = $dbase -> prepare('SELECT id,nom,prenoms,dateNaissance,email,sexe FROM etudiants'); 
                                $result -> execute();

                                if ($result) {
                                    
                                    while ($donnees = $result->fetch()){
                                        if (empty($donnees) ) {
                                            echo "Pas d'étudiant dans la table ! " ;
                                            
                                        } else {
                        ?>
                                    <td><?php echo $donnees["nom"] ; ?></td>
                                    <td><?php echo $donnees["prenoms"]; ?></td>
                                    <td><?php echo $donnees["dateNaissance"]; ?></td>
                                    <td><?php echo $donnees["email"]; ?></td>
                                    <td><?php echo $donnees["sexe"]; ?></td>
                                    <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">option</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" type="button" href="update.php?idEtu=<?php echo $donnees["id"]; ?>" >Modifier</a>
                                            <a class="dropdown-item" type="button" href="delete.php?idEtu=<?php echo $donnees["id"]; ?>" >Supprimer</a>
                                        </div>
                                    </div>
                                    </td>
                        </tr>
                        <?php
                                        }
                                    }
                                } else {
                                    echo "Erreur de lecture de la base de données.";
                                } 
                                
                            } catch(PDOException $e) {
                                echo $sql . "<br>" . $e->getMessage();
                            }
                            $dbase = null;
                        ?>

                    </tbody>
                </table>
            </div>
                
        </div>

    </div>

    
</body>
</html>