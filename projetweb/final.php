<?php
session_start();
$database = "web";
if (isset($_POST["envoi"])){ //si $_POST est declare. si formulaire soumis
    $sport = $_POST["sport"];
    $coach= $_POST["coach"];
    $date = $_POST["date"];
    $heure = $_POST["heure"];
}
//connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
        $ad = "INSERT INTO `adresse`( `nom_rue`, `num_rue`, `code_postal`, `pays`, `ville`) VALUES ('$adresse','$numero','$codepostal','$pays','$ville')";
        $result= mysqli_query($db_handle, $ad);
            $sport = "SELECT id_adresse FROM adresse WHERE nom_rue LIKE '$adresse'";
            $result1 = mysqli_query($db_handle, $sport);
            if ($data = mysqli_fetch_assoc($result1)){
                $idadresse = $data['id_adresse'];

            }
            $sql = "INSERT INTO `client` (`nom`, `prenom`, `telephone`, `email`, `password`, `num_etudiant`,`id_adresse`) VALUES ('$nom','$prenom','$telephone','$email','$password','$numEtudiant','$idadresse')";
            $result = mysqli_query($db_handle, $sql);
            echo "Inscription réussie";
             header ('location:index.php');
        }//end if
    //si le BDD n'existe pas
    else {
        echo "Database not found";
        }//end else
    //fermer la connection
    mysqli_close($db_handle);
   // header ('location:index.php');
    ?>