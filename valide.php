 

 <?php
    
  
   require('conn.php');

   $id=$_POST['id_v'];
   $motif=$_POST['motif'];

    if(isset($_POST['action'] ) && $_POST['action']=="valide") 
    { 
     $sql = "UPDATE table_url SET valide='1'  WHERE id_url=$id";
    } 
    
    else{ 
          $sql = "UPDATE table_url SET motif='$motif'  WHERE id_url=$id"; }

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