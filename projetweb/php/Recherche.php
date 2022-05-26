<?php
//identifier le nom de base de données
    $database = "web";
    $login = "" ;// recuperation du string mis dans le login
    $mdp ="" ; // recuperation du string mis dans le mdp
    $_recherche="";

    $choix = isset($_POST["choix"])? $_POST["choix"] : "";
    if (empty($choix)) {
    $choix = 0;
    }
    $choix = (int)$choix;

    if (isset($_POST["submit"])){ //si $_POST est declare. si formulaire soumis
        $_recherche = $_POST["recherche"]; 
    }
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitement
    if ($db_found) {
        switch ($choix) {
            case 1:
            $sql = "SELECT * FROM coach NATURAL JOIN sport WHERE nom LIKE '$_recherche'";
            $result = mysqli_query($db_handle, $sql);
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>" . "Nom" . "</th>";
            echo "<th>" . "Prénom" . "</th>";
            echo "<th>" . "Spécialité" . "</th>";
            echo "<th>" . "Etablissement" . "</th>";
            echo "<th>" . "Bureau" . "</th>";
            echo "<th>" . "Téléphone" . "</th>";
            echo "<th>" . "Email" . "</th>";
            //afficher le resultat
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['nom'] . "</td>";
                echo "<td>" . $data['prenom'] . "</td>";
                echo "<td>" . $data['nom_sport'] . "</td>";
                echo "<td>" . "ECE Paris" . "</td>";
                echo "<td>" . $data['bureau'] . "</td>";
                echo "<td>" . $data['telephone'] . "</td>";
                echo "<td>" . $data['email'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";  
            break;
            case 2:
            $sql = "SELECT * FROM coach NATURAL JOIN sport WHERE nom_sport LIKE '$_recherche'";
            $result = mysqli_query($db_handle, $sql);
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>" . "Spécialité" . "</th>";
            echo "<th>" . "Nom" . "</th>";
            echo "<th>" . "Prénom" . "</th>";
            echo "<th>" . "Etablissement" . "</th>";
            echo "<th>" . "Bureau" . "</th>";
            echo "<th>" . "Téléphone" . "</th>";
            echo "<th>" . "Email" . "</th>";
            //afficher le resultat
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['nom_sport'] . "</td>";
                echo "<td>" . $data['nom'] . "</td>";
                echo "<td>" . $data['prenom'] . "</td>";
                echo "<td>" . "ECE Paris" . "</td>";
                echo "<td>" . $data['bureau'] . "</td>";
                echo "<td>" . $data['telephone'] . "</td>";
                echo "<td>" . $data['email'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            break;
            case 3:
            $sql = "SELECT * FROM salle NATURAL JOIN adresse WHERE num_salle LIKE '$_recherche'";
            $result = mysqli_query($db_handle, $sql);
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>" . "Numéro de la salle" . "</th>";
            echo "<th>" . "Téléphone" . "</th>";
            echo "<th>" . "Email" . "</th>";
            echo "<th>" . "Adresse" . "</th>";
            //afficher le resultat
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['num_salle'] . "</td>";
                echo "<td>" . $data['telephone'] . "</td>";
                echo "<td>" . $data['email'] . "</td>";
                echo "<td>" . $data['num_rue'] . $data['nom_rue']  . $data['code_postal'] . $data['ville']  . $data['pays'] ."</td>";
                echo "</tr>";
            }
            echo "</table>";
            break;
        }
           
}//end if
    //si le BDD n'existe pas
    else {
        echo "Database not found";
        }//end else
    //fermer la connection
    mysqli_close($db_handle);
?>