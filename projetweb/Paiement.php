<?php
session_start();

if(isset($_SESSION['id_client']))
{

             if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            {
               $url = "https";
           }
           else
           {
               $url = "http";
           }
           $url .= "://";
           $url .= $_SERVER['HTTP_HOST'];
           $url .= $_SERVER['REQUEST_URI'];
          // echo $url;
             list($url,$dateheure ) = explode("?", $url);
             $bout = "confirmation.php?".$dateheure."";
          
//identifier le nom de base de données
    $database = "web";

    if (isset($_POST["envoi"])){ //si $_POST est declare. si formulaire soumis
        $type = $_POST["paiement"];
        $numero = $_POST["num"];
        $nom = $_POST["nom"];
        $date = $_POST["date"];
        $code = $_POST["code"];

    }
    header("Refresh: 1;URL=".$bout);
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    /*$db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
    //si le BDD existe, faire le traitements
    if ($db_found) {
        $id_client = $_SESSION['id_client'];
        $sql1 = "SELECT * FROM client WHERE id_client LIKE  $id_client "; // $id_paiement de la session...
        $result1 = mysqli_query($db_handle, $sql1);
        if($data1 = mysqli_fetch_assoc($result1))
        {
            $id_paiement = $data1['id_paiement'];
            echo $id_paiement;
            $sql = "SELECT * FROM paiement WHERE id_paiement LIKE $id_paiement"; // $id_paiement de la session...
            $result = mysqli_query($db_handle, $sql);
            if ($data = mysqli_fetch_assoc($result)){
                $type1 = $data['type'];
                $numero1 = $data['numero'];
                $nom1 = $data['nom'];
                $date1 = $data['expiration'];
                $code1 = $data['securite'];
            }
            if ($type == $type1 && $numero == $numero1 && $nom == $nom1 && $date == $date1 && $code == $code1){
                echo "Paiement réussi";
                header("Refresh: 1;URL=".$bout);
            }else{
                echo "Paiement échoué";
                header("Refresh: 1;URL=Paiement.php");
            }
        }
        }//end if
    //si le BDD n'existe pas
        else {
        echo "Database not found";
        }//end else
    //fermer la connection
    mysqli_close($db_handle);*/
}else
{

   header("Refresh: 1;URL=Login-Client.html");

}
?>
