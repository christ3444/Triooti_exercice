<?php
 // $_POST['site_url']="funk";
  if( isset( $_POST['site_url']))
  {
   require("conn.php");

   $site_url=$_POST['site_url'];
   $sql = "SELECT url_site FROM table_url WHERE url_site ='$site_url'" ;
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
    echo ' 
            <div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert">×</button>
                 <strong> Desole! </strong> ce lien a deja ete enregistre par un autre      
             </div>';
  
   } else {

    session_start();
    if(isset($_SESSION['pseudo']) && $_SESSION['login']=="1"){
      $jobeur=$_SESSION['pseudo'];
      //echo $jobeur;
    } else{
      $jobeur='anonyme';}
    //   echo $jobeur;
    // $nom_entre='nom_entre';
    // $numero_entre='numero_entre';
    // $cat_entre='cat_entre';
    // $adresse='adresse';
    // $nom_concepteur='nom_concepteur';
    // $numero_concepteur='numero_concepteur';
    // $nom_serveur_h='nom_serveur_h';
    // $nom_serveur_d='nom_serveur_d';
    
     $nom_entre=$_POST['nom_entre'];
     $numero_entre=$_POST['numero_entre'];
     $cat_entre=$_POST['cat_entre'];
     $adresse=$_POST['adresse'];
     $nom_concepteur=$_POST['nom_concepteur'];
     $numero_concepteur=$_POST['numero_concepteur'];
     $nom_serveur_h=$_POST['nom_serveur_h'];
     $nom_serveur_d=$_POST['nom_serveur_d'];
 
    $sql = "INSERT INTO table_url (url_site,
                                   nom_entre,
                                   cat_entre,
                                   tel_entre,	
                                   adresse_entre,	
                                   site_concepteur,	
                                   tel_concepteur,	
                                   nameServer_h,	
                                   nameServer_D,
                                   jobeur
                                  )
                           VALUES ('$site_url',
                                   '$nom_entre',
                                   '$cat_entre',
                                   '$numero_entre',	
                                   '$adresse',	
                                   '$nom_concepteur',	
                                   '$numero_concepteur',	
                                   '$nom_serveur_h',	
                                   '$nom_serveur_d',
                                   '$jobeur')";
    
    if (mysqli_query($conn, $sql)) {
      echo ' 
                     
                            <div class="alert alert-success alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                  <strong>Success!</strong> donnees envoye
                       
                     </div>';
    
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    };
    
    
   }

  };
   ?>