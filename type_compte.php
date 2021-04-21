 

 <?php
    
  
    require('conn.php');
 
    $id=$_POST['id_user'];
 
     if(isset($_POST['action'] ) && $_POST['action']=="reel") 
     { 
      $sql = "UPDATE user SET type_de_compte='reel'  WHERE id_user=$id";
     } 
     
     else{ 
        $sql = "UPDATE user SET type_de_compte='demo'  WHERE id_user=$id";}
 
       if ($conn->query($sql) === TRUE)
      {  
         echo' <div class="container">
         <div class="col-md-4">
             <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Success!</strong> valide
             </div>
         </div>    
     </div>';
     } else {
         echo "Error updating record: " . $conn->error;
     }
 
 
     ?>