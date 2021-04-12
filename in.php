<?php 
require("conn.php");
        if(isset($_POST["save_inscri"])){

            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $mail=$_POST["email"];
            $numero=$_POST["numero"];
            $adresse=$_POST["adresse"];
            $pseudo=$_POST["pseudo"];
            $pass=$_POST["pass"];
$sql = "INSERT INTO user (nom,prenom,mail,numero,adresse,pseudo,pass)
VALUES ('$nom', '$prenom', '$mail','$numero','$adresse','$pseudo','$pass')";

        if (mysqli_query($conn, $sql)) {
          echo 'inscription reussi';
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

                }
?>