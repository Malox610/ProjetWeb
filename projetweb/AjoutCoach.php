<?php
//identifier le nom de base de données
    $database = "web";
    $login = "" ;// recuperation du string mis dans le login
    $mdp ="" ; // recuperation du string mis dans le mdp

    if (isset($_POST["envoi"])){ //si $_POST est declare. si formulaire soumis
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $telephone = $_POST["telephone"];
        $email = $_POST["email"];
        $password = $_POST["mdp"];
        $bureau = $_POST["bureau"];
        $spe = $_POST["spe"];
        $image_name = $_FILES["image"]["name"];
        $image_size = $_FILES["image"]["size"];
        $image_type = $_FILES["image"]["type"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        //$donnees = file_get_contents($_FILES["image"]["tmp_name"]);
    
    }
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
        $donnees = addslashes(fread(fopen($image_tmp, "r"), $image_size));
        
        $ima = "INSERT INTO `image` (`nom_image`,`taille`,`type`,`donnees`) VALUES('$image_name','$image_size','$image_type','$donnees')";
        $result = mysqli_query($db_handle,$ima);
        
        $idi = "SELECT id_image FROM `image` WHERE nom_image LIKE '$image_name'";
        $result2 = mysqli_query($db_handle,$idi);
        if ($data = mysqli_fetch_assoc($result2)){  
            $image_name = $data['id_image'];
        }

        $sport = "SELECT id_sport FROM `sport` WHERE nom_sport LIKE '$spe'";
        $result3 = mysqli_query($db_handle, $sport);
        if ($data = mysqli_fetch_assoc($result3)){  
            $spe = $data['id_sport'];
        }
           
        $sql = "INSERT INTO coach (`nom`, `prenom`, `telephone`, `email`, `password`, `bureau`, `id_sport`,`id_image`) VALUES ('$nom','$prenom','$telephone','$email','$password','$bureau','$spe','$image_name')";
        $result4 = mysqli_query($db_handle, $sql);
        echo "Inscription réussie";
          
        }//end if
    //si le BDD n'existe pas
    else {
        echo "Database not found";
        }//end else
    //fermer la connection
    mysqli_close($db_handle);
?>