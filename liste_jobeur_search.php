    
    
    <?php
    require('conn.php');
    $search=$_POST['search'];
    ?>
    <div class="card" >
          <div class="card-header" style="text-align:center;">liste Jobeur
             <div class="search-container">
               <form  action="admin_dashboard.php" method="post">
                <div class="input-group mb-3">
                   <input type="text" class="form-control" placeholder="Search.." id="search" name="search">
                   <button onclick="search_jobeur()" class="btn btn-secondary">rechercher</button>
                </div>
                  </form>
             </div>
          </div>
          <div class="card-body">
         

    <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>type de compte </th>
          </tr>
        </thead>
       
       <?php
            $search=
        $sql = "SELECT * FROM user WHERE pseudo like'%$search%' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>

        <tbody>
          <tr>
            <td><?php echo $row['pseudo'];?></td>
            <td>Doe</td>
            <td>john@example.com</td>
            <td> 
                <span class="badge badge-warning"> 
                    <?php echo $row['type_de_compte']; 
                        if($row['type_de_compte']=='demo') {
                          echo'
                           <button class="btn btn-primary" onclick="passe_reel()">passer en reel
                           </button>';
                        } else{
                           echo'
                          <button class="btn btn-dark" onclick="passe_demo()">passer en demo
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