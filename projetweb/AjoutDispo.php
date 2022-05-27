<?php
//identifier le nom de base de données
    $database = "web";
    $login = "" ;// recuperation du string mis dans le login
    $mdp ="" ; // recuperation du string mis dans le mdp

    if (isset($_POST["aprem"])){ //si $_POST est declare. si formulaire soumis
        $aprem = $_POST["aprem"];
    }
    else {
        $aprem = 0;
    }
    if (isset($_POST["matin"])){ //si $_POST est declare. si formulaire soumis
        $matin = $_POST["matin"];
    }
    else {
        $matin = 0;
    }
    if (isset($_POST["button"])){ //si $_POST est declare. si formulaire soumis
        $coach = $_POST["coach"];
        $date = $_POST["date"];
    }
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
        $sql = "SELECT id_coach FROM coach WHERE nom LIKE '$coach'";
        $result = mysqli_query($db_handle, $sql);
        if ($data = mysqli_fetch_assoc($result)){  
            $idcoach = $data['id_coach'];
        }

        else {
            $idcoach = 0;
            echo "Coach introuvable";
        }
        
        $sql2 = "INSERT INTO dispo (jour,matin,aprem,id_coach) VALUES ('$date','$matin','$aprem','$idcoach')";
        $result2 = mysqli_query($db_handle, $sql2);  
        }//end if
    //si le BDD n'existe pas
    else {
        echo "Database not found";
        }//end else
    //fermer la connection
    mysqli_close($db_handle);
?>