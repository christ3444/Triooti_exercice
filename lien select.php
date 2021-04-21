
    
    <?php
    require('conn.php');
    ?>
    <div class="card" >
          <div class="card-header" style="text-align:center;">Url</div>
          <div class="card-body">
    <table class="table table-dark table-hover ">
        <thead>
          <tr>
            <th>Url</th>
            <th>Lastname</th>      
            <th>Jobeur</th>
            <th>valide</th>
          </tr>
        </thead>
        
       <?php

        $sql = "SELECT * FROM table_url ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>

        <tbody>
          <tr>
            <td> <a href="<?php echo $row['url_site'];?>">lien</a> </td>
            <td>Doe</td>
           
           
            <td><?php echo $row['jobeur'];?></td>
            <td> 
                <?php if($row['valide']=='0'){echo '<span class="badge badge-success">Valide</span>';} 
                      else{ echo '<span class="badge badge-danger"> non Valide</span>' ;} 
                
                ?>
            </td>
          </tr>
            
        </tbody>
            
            
             <?php

        } 
    }
        else{ 
            echo '0  Url'; ?>
            </table>

            </div>
        </div>
                <?php
        }

    ?>