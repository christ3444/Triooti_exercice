<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/my_style.css" type="text/css">
</head>
<body>

    <div class="topnav fixed-top" >
      
        <a>  
          <button class="btn btn-primary"  onclick="liste_url()">
          Liste des Url
          </button> 
        </a>
        <a>  
          <button class="btn btn-primary" onclick="liste_jobeur()">
            Liste des jobeurs
          </button> 
        </a>
        <a a href="statistique.php">  
          <button class="btn btn-primary" >
           Statistique
          </button> 
        </a>
      

      <div class="login-container">
         <button class="btn btn-primary" data-toggle="modal" data-target="#login">
            Login
          </button> 
      </div>

    </div>
    
        <!-- connexion -->
    <?php
      require('conn.php');

      if(isset($_POST['pseudo']))
      {

      $pseudo=$_POST['pseudo'];
      $pass=$_POST['pass'];

      $sql = "SELECT * FROM table_admin WHERE pseudo='$pseudo'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {

             if($row["pass"]==$pass){ 
              echo ' 
            
              <div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert">×</button>
                 bingoo
              </div>
        ';
            
              }
              else{
          echo ' 
                
                  <div class="alert alert-danger alert-dismissible">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                     pseudo ou mot de passe inccorecte
                       <button  type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal" data-target="#login"> réessayer </button>
                  </div>
            ';
      }
            }
      }else{
          echo ' 
                  <div class="alert alert-danger alert-dismissible">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                     pseudo ou mot de passe inccorecte
                       <button  type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal" data-target="#login"> réessayer </button>
                  </div>';
      }
      }

    ?>


        <!-- fin connexion -->
    <div id="my_section">
            
    <!-- afificher les listes  -->

       
    </div>















 
    <!--  Modal login -->
    <div class="modal" id="login">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" >LogIn</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body"> 
              <form action="admin_dashboard.php" method="post" name="connexion">
                  <div class="form-group">
                    <label for="pseudo">Pseudo:</label>
                    <input type="text" class="form-control" placeholder="pseudo" id="pseudo" name="pseudo">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="pass" name="pass">
                  </div>
                  <div class="form-group form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                  </div>
                  <button type="submit" name="connexion" class="btn btn-primary">Se connecter</button>
              </form>
              </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
    </div>
    <!--fin modal Login-->

   <!--  Modal motif -->
    <div class="modal" id="motif">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
 
            <!-- Modal body -->
            <div class="modal-body"> 
            
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="motif de refus" id="motif_txt" name="motif">
                  </div>
                  <button  name="connexion" id="btn_motif" class="btn btn-primary">envoyer</button>
            
              </div>

          </div>
        </div>
    </div>

    <!--fin modal motif-->

    <script>

      function passe_reel(id_job){
 

        $.ajax({ 
                type: 'post',
                url: 'type_compte.php',
                data: {

                   id_user: id_job,
                   action:"reel" 
                },
                success: function (response) {
                    $('#job').html(response);
                    $("#my_section").load("liste_jobeur.php");
                    liste_jobeur()
                    //$("#my_section").load("liste_jobeur.php");
                }
              });
              
              return false;

      }



      function passe_demo(id_job){
        
        $.ajax({ 
                type: 'post',
                url: 'type_compte.php',
                data: {

                   id_user: id_job,
                   action:"demo" 
                },
                success: function (response) {
                    $('#job').html(response);
                    $("#my_section").load("liste_jobeur.php");
                    liste_jobeur()
                    //$("#my_section").load("liste_jobeur.php");
                }
              });
              
              return false;
      }


    function liste_jobeur(){
     // $("#liste_url").hide();
        $("#my_section").load("liste_jobeur.php");
    }

    function liste_url(){ 
      $("#liste_jobeur").hide();
      $("#liste_url").show(); 
        $("#my_section").load("liste_url.php");
    }

    function valide_url(id_lien){
 
        $.ajax({ 
                type: 'post',
                url: 'valide.php',
                data: {

                   id_v:id_lien,  
                   action:"valide" 
                },
                success: function (response) {
                    $('#res').html(response);
                    $("#my_section").load("liste_url.php");
                    liste_url()
                    //$("#my_section").load("liste_jobeur.php");
                }
              });
              
              return false;
    }
var id_url_motif;
    function non_valide_url(id_url){
     id_url_motif=id_url;
    }
      $("#btn_motif").click(function(){
         //motif=document.getElementById("motif_txt").value;
       // alert(id_url_motif);
      // alert("helo");
     

      $.ajax({ 
                type: 'post',
                url: 'valide.php',
                data: {

                   id_v:id_url_motif,  
                   action:"non valide" ,
                   motif:document.getElementById("motif_txt").value
                },
                success: function (response) {
                    $('#motif').html(response);
                    $("#my_section").load("liste_url.php");
                    liste_url()
                    //$("#my_section").load("liste_jobeur.php");
                }
              });
              
              return false;
    });
   
   

    function search_jobeur(){

      
         $.ajax({ 
                type: 'post',
                url: 'liste_jobeur.php',
                data: {
                   search:document.getElementById("search").value,   
                },
                success: function (response) {
                    //$('#').html(response);
                    $("#my_section").load("liste_jobeur.php");
                }
              });
                
              return false;
              
            }
    
    </script>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

</body>
</html>
