<?php
//identifier le nom de base de données
    $database = "web";
    $login = "" ;// recuperation du string mis dans le login
    $mdp ="" ; // recuperation du string mis dans le mdp

    if (isset($_POST["envoi"])){ //si $_POST est declare. si formulaire soumis
        $login = $_POST["Login"];
        $mdp = $_POST["mdp"];
    
    }
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
            $sql = "SELECT * FROM coach WHERE email LIKE '$login'";
            $result = mysqli_query($db_handle, $sql);
            if ($data = mysqli_fetch_assoc($result)){
                    if($data['password']== $mdp ){
                        //$_SESSION["id_admin"] =$data['id_client'];
                        //session_start();
                        //header('Location:PageLogin-Client.html'); // connexion reussi chargement de la page suivante
                    }
                    else 
                    { echo "Mot de passe incorrect";}
                }
                else {
                    echo "Utilisateur introuvable";
                }
           
        }//end if
    //si le BDD n'existe pas
    else {
        echo "Database not found";
        }//end else
    //fermer la connection
    mysqli_close($db_handle);
?>