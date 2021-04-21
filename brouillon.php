<div id="liste_url" style="display: none;">
           <?php
           require('conn.php');
           ?>
           <div class="card" >
                 <div class="card-header"  id="res" style="text-align:center;">Url</div>
                 <div class="card-body">
           <table class="table table-dark table-hover ">
               <thead>
                 <tr>
                   <th>Url</th>
                   <th>Entreprise</th>    
                   <th>secteur d'activite</th>  
                   <th>Nom du concepteur</th>
                   <th>Numero du concepteur</th>
                   <th>Name server hebergeur</th>
                   <th>name server Domaine</th>
                   <th>valide</th>
                   <th>jobeur</th>
                 </tr>
               </thead>
              <?php

               $sql = "SELECT * FROM table_url WHERE valide='0'";
               $result = $conn->query($sql);

               if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) { ?>

               <tbody>
                 <tr>
                   <td> <a href="<?php echo $row['url_site'];?>">lien</a> </td>
                   <td><?php echo $row['nom_entre'];?></td>
                   <td><?php echo $row['cat_entre'];?></td>
                   <td><?php echo $row['site_concepteur'];?></td>
                   <td><?php echo $row['tel_concepteur'];?></td>
                   <td><?php echo $row['nameServer_h'];?></td>
                   <td><?php echo $row['nameServer_D'];?></td>
                   <td> 
                       <!-- <form methode name="form_validation"> -->
                            <input  type="hidden" id="id_v" value="<?php echo $row['id_url'] ;?>">
                            <button class="btn btn-success" onclick="valide_url()">valide</button>
                            <button class="btn btn-danger"  data-toggle="modal" data-target="#motif"> non valide</button>
                       <!-- </form> -->
                   </td>
                   <td><?php echo $row['jobeur'];?></td>
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
     </div>