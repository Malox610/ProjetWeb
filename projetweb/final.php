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
        $sql = "INSERT INTO `rdv`( `date`, `heure`, `id_coach`, `id_sport`) VALUES ('$date','$heure','$coach','$sport')";
        $result= mysqli_query($db_handle, $sql);
            echo "Inscription réussie";
            echo $sql;
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Rdv Pris")';  
            echo '</script>';  

            // header ('location:index.php');
        }//end if
    //si le BDD n'existe pas
    else {
        echo "Database not found";
        }//end else
    //fermer la connection
    mysqli_close($db_handle);
   // header ('location:index.php');
    ?>