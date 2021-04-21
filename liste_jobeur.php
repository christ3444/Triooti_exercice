    
    
    <?php
    require('conn.php');
    ?>
    <div class="card" id="liste_jobeur" >
          <div class="card-header" id="job" style="text-align:center;">liste Jobeur
             <div class="search-container">
               
                <div class="input-group mb-3">
                   <input type="text" class="form-control" placeholder="Search.." id="search">
                   <button onclick="search_job()" class="btn btn-secondary">rechercher</button>
                </div>
                 
             </div>
          </div>
          <div class="card-body">
         
    <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>pseudo</th>
            <th>Nom </th>
            <th>numero</th>
            <th>type de compte </th>
          </tr>
        </thead>
       
       <?php

          if(isset($_POST['search']))
          { 
            $search=$_POST['search']; 
            $sql = "SELECT * FROM user WHERE pseudo='$search'";
          } else{ 
        $sql = "SELECT * FROM user ";
      }
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>

        <tbody>
          <tr>
            <td><?php echo $row['pseudo'];?></td>
            <td><?php echo $row['nom'];?></td>
            <td><?php echo $row['numero'];?></td>
            <td> 
            
                <span class="badge badge-warning"> 
               
                    <?php echo $row['type_de_compte']; 
                        if($row['type_de_compte']=='demo') {
                          echo'
                          
                           <button class="btn btn-primary" onclick="passe_reel('.$row['id_user'].')">passer en reel
                           </button>';
                        } else{
                           echo'
                          <button class="btn btn-dark" onclick="passe_demo('.$row['id_user'].')">passer en demo
                          </button>';}
                    
                    ?>
                </span>
           
            </td>
          </tr>
            
        </tbody>
            
            
             <?php

        } 
    }
        else{ 
            echo '0  Jobeurs'; ?>
            </table>

            </div>
        </div>
                <?php
        }

    ?>