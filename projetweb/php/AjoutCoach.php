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
        

    
    }
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
            $sport = "SELECT id_sport FROM sport WHERE nom_sport LIKE '$spe'";
            $result1 = mysqli_query($db_handle, $sport);
            if ($data = mysqli_fetch_assoc($result1)){  
                $spe = $data['id_sport'];

            }
            $sql = "INSERT INTO coach (`nom`, `prenom`, `telephone`, `email`, `password`, `bureau`, `id_sport`) VALUES ('$nom','$prenom','$telephone','$email','$password','$bureau','$spe')";
            $result = mysqli_query($db_handle, $sql);
            echo "Inscription réussie";
          
        }//end if
    //si le BDD n'existe pas
    else {
        echo "Database not found";
        }//end else
    //fermer la connection
    mysqli_close($db_handle);
?>