<?php
//identifier le nom de base de données
    $database = "ProjetWeb";
    $login = "" ;// recuperation du string mis dans le login
    $mdp ="" ; // recuperation du string mis dans le mdp

    if (isset($_POST["nom"])){ //si $_POST est declare. si formulaire soumis
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
    
    }
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
            $sql = "SELECT * FROM 'client' WHERE 'email'=$login ";
            $result = mysqli_query($db_handle, $sql);
                    if($data['mdp']== $mdp ){
                        $_SESSION["ID-client"] =$data['IDClient'];
                        session_start();

                     header('Location:accueil.html'); // connexion reussi chargement de la page suivante
                    }
                    else 
                    { echo "Utilisateur non trouvé mot de passe ou login erroné";}
           
        }//end if
    //si le BDD n'existe pas
    else {
        echo "Database not found";
        }//end else
    //fermer la connection
    mysqli_close($db_handle);
?>