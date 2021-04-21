<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TRIOOTI</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

    <!-- Header Section Begin -->

  
    <?php

     require("conn.php");

     if(isset($_POST["logout"]) && isset( $_SESSION["login"])){
      $_SESSION['login']=="0";
      session_destroy();
        
        
     }
    ?>
      <?php require("header.php"); ?>
    <!-- Header Section End -->

    <!-- chat et erreur -->
    <div class="fixed-bottom">
    <a href="https://api.whatsapp.com/send?phone=+228 98 674 198">   <img src="img/wha_icon.png" width="50px" height="50px"></img></a> 
            <button class='btn btn-danger'>signaler une erreur</button>
            
            <?php 

             if(isset($_POST["save_inscri"])){
                 $pseudo=$_POST["pseudo"];

                 $sql = "SELECT pseudo FROM user WHERE pseudo='$pseudo'";
                 $result = $conn->query($sql);

                 if ($result->num_rows > 0) {
                     echo ' 
                     <div class="container">
                         <div class="col-md-4">
                             <div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                 Vous avez deja un compte si
                                  <button  type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal" data-target="#inscri"> non choisisez un autre pseudo </button>
                             </div>
                         </div>    
                     </div>';
                   }
                 else {
             
                    
            $nom=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $mail=$_POST["email"];
            $numero=$_POST["numero"];
            $adresse=$_POST["adresse"];
       
            //    hash mot de passe
       
            $pass=$_POST["pass"];
            $sql = "INSERT INTO user (nom,prenom,mail,numero,adresse,pseudo,pass)
                    VALUES ('$nom', '$prenom', '$mail','$numero','$adresse','$pseudo','$pass')";

                     if (mysqli_query($conn, $sql)) {
                       echo ' 
                        <div class="container">
                            <div class="col-md-4">
                                <div class="alert alert-success alert-dismissible">
                                     <button type="button" class="close" data-dismiss="alert">×</button>
                                     <strong>Success!</strong> inscription reussi
                                </div>
                            </div>    
                        </div>';
                     $_POST["save_inscri"]=null;
                     }
                      else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                     }

                }
            }
    ?>
<!--////////////////////////////////////////////////////////////////////////-->

    </div>
    <!--fin chat et erreur -->

    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="img/bg_img.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <div class="section-title">
                            <h2>Gagner de l'argent sur ce site en envoyant des liens de site web des entreprises</h2>
                            <p>+ 100 entreprises repertorie dans tous les secteurs </p>
                        </div>
                        <!-- <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="Rechercher une entreprise">
                                <div class="select__option">
                                    <select>
                                        <option value="">Categories</option>
                                        <option value="">Agroalimentaire</option>
                                        <option value="">Commerce</option>
                                        <option value="">Banque/Assurance</option>
                                        <option value="">Immobilier</option>
                                        <option value="">Informatique</option>
                                    </select>
                                </div>
                                <div class="select__option">
                                    <select>
                                        <option value="">pays/ville</option>
                                        <option value="">lome</option>
                                        <option value="">pkalime</option>
                                        <option value="">kara</option>
                                    </select>
                                </div>
                                <button type="submit">Chercher</button>
                            </form>
                        </div> -->
                        <ul class="hero__categories__tags">
                            <li><a href="#"><img src="img/hero/cat-7.png" width="20px" height="20px"> Agroalimentaire</a></li>
                            <li><a href="#"><img src="img/hero/cat-7.png" width="20px" height="20px"> Commmerce</a></li>
                            <li><a href="#"><img src="img/hero/cat-7.png" width="20px" height="20px"> Banque/Assurance</a></li>
                            <li><a href="#"><img src="img/hero/cat-7.png" width="20px" height="20px"> Immobilier</a></li>
                            <li><a href="#"><img src="img/hero/cat-7.png" width="20px" height="20px"> Informatique</a></li>
                            <li><a href="#"><img src="img/hero/cat-6.png" width="20px" height="20px"> Tous les categories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    
    <!-- Most Search Section Begin -->
    <section class="most-search spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Annuaire des entreprises </h2>
                        <p>Trouvez ici tous types d'entreprises dans n'importe quel domaine</p>
                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="most__search__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tech" role="tab">
                                    <!-- <span class="flaticon-039-fork"></span> -->
                                    Technologie
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#immo" role="tab">
                                    <!-- <span class="flaticon-039-fork"></span> -->
                                    Immobilier
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                         <div class="tab-pane active" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <!-- <div class="listing__item__pic set-bg" data-setbg="img/listing/list-1.jpg">
                                            <img src="img/listing/list_icon-1.png" alt="">
                                            <div class="listing__item__pic__tag">Technologieblabla</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div> -->
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Microsoft </h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <img src="img/hero/cat-7.png" width="40px" height="40px">
                                                    <h6>Technologie</h6>
                                                </div>
                                                <ul> 
                                                    
                                                     <li>lorem ipsum bla bla boom ipso laco homos  </li>
                                                    <li>adress : 435 rue de la belle lome </li>
                                                   
                                                    <!-- <li><span class="icon_phone"></span> (+228) 90-09-99-00</li> -->
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <!-- <img src="img/hero/cat-7.png" alt=""> -->
                                                    <span class="icon_phone">(+228) 90-09-99-00</span> 
                                                    <span>Technologie</span>
                                                </div>
                                                <div class="listing__item__text__info__right"> <a href="link.html" style="color:green;">Ouvrir le lien</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <!-- <div class="listing__item__pic set-bg" data-setbg="img/listing/list-1.jpg">
                                            <img src="img/listing/list_icon-1.png" alt="">
                                            <div class="listing__item__pic__tag">Technologieblabla</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div> -->
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Immo House </h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <img src="img/hero/cat-7.png" width="40px" height="40px">
                                                    <h6>Immobilier</h6>
                                                </div>
                                                <ul> 
                                                    
                                                     <li>lorem ipsum bla bla boom ipso laco homos  </li>
                                                    <li>adress : 435 rue de la belle lome </li>
                                                   
                                                    <!-- <li><span class="icon_phone"></span> (+228) 90-09-99-00</li> -->
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <!-- <img src="img/hero/cat-7.png" alt=""> -->
                                                    <span class="icon_phone">(+228) 90-09-99-00</span> 
                                                    <span>Lorem Immobilier</span>
                                                </div>
                                                <div class="listing__item__text__info__right"> <a href="link.html" style="color:green;">Ouvrir le lien</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tech" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <!-- <div class="listing__item__pic set-bg" data-setbg="img/listing/list-1.jpg">
                                            <img src="img/listing/list_icon-1.png" alt="">
                                            <div class="listing__item__pic__tag">Technologieblabla</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div> -->
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Microsoft </h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <img src="img/hero/cat-7.png" width="40px" height="40px">
                                                    <h6>Technologie</h6>
                                                </div>
                                                <ul> 
                                                    
                                                     <li>lorem ipsum bla bla boom ipso laco homos  </li>
                                                    <li>adress : 435 rue de la belle lome </li>
                                                   
                                                    <!-- <li><span class="icon_phone"></span> (+228) 90-09-99-00</li> -->
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <!-- <img src="img/hero/cat-7.png" alt=""> -->
                                                    <span class="icon_phone">(+228) 90-09-99-00</span> 
                                                    <span>.......</span>
                                                </div>
                                                <div class="listing__item__text__info__right"> <a href="link.html" style="color:green;">Ouvrir le lien</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <!-- <div class="listing__item__pic set-bg" data-setbg="img/listing/list-1.jpg">
                                            <img src="img/listing/list_icon-1.png" alt="">
                                            <div class="listing__item__pic__tag">Technologieblabla</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div> -->
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Apple </h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <img src="img/hero/cat-7.png" width="40px" height="40px">
                                                    <h6>Technologie</h6>
                                                </div>
                                                <ul> 
                                                    
                                                     <li>lorem ipsum bla bla boom ipso laco homos  </li>
                                                    <li>adress : 435 rue de la belle lome </li>
                                                   
                                                    <!-- <li><span class="icon_phone"></span> (+228) 90-09-99-00</li> -->
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <!-- <img src="img/hero/cat-7.png" alt=""> -->
                                                    <span class="icon_phone">(+228) 90-09-99-00</span> 
                                                    <span>.......</span>
                                                </div>
                                                <div class="listing__item__text__info__right"> <a href="link.html" style="color:green;">Ouvrir le lien</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="immo" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <!-- <div class="listing__item__pic set-bg" data-setbg="img/listing/list-1.jpg">
                                            <img src="img/listing/list_icon-1.png" alt="">
                                            <div class="listing__item__pic__tag">Technologieblabla</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div> -->
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Lock Immo </h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <img src="img/hero/cat-7.png" width="40px" height="40px">
                                                    <h6>Immo</h6>
                                                </div>
                                                <ul> 
                                                    
                                                     <li>lorem ipsum bla bla boom ipso laco homos  </li>
                                                    <li>adress : 435 rue de la belle lome </li>
                                                   
                                                    <!-- <li><span class="icon_phone"></span> (+228) 90-09-99-00</li> -->
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <!-- <img src="img/hero/cat-7.png" alt=""> -->
                                                    <span class="icon_phone">(+228) 90-09-99-00</span> 
                                                    <span>.......</span>
                                                </div>
                                                <div class="listing__item__text__info__right"> <a href="link.html" style="color:green;">Ouvrir le lien</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <!-- <div class="listing__item__pic set-bg" data-setbg="img/listing/list-1.jpg">
                                            <img src="img/listing/list_icon-1.png" alt="">
                                            <div class="listing__item__pic__tag">Technologieblabla</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div> -->
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>grace Immo </h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <img src="img/hero/cat-7.png" width="40px" height="40px">
                                                    <h6>Immo</h6>
                                                </div>
                                                <ul> 
                                                    
                                                     <li>lorem ipsum bla bla boom ipso laco homos  </li>
                                                    <li>adress : 435 rue de la belle lome </li>
                                                   
                                                    <!-- <li><span class="icon_phone"></span> (+228) 90-09-99-00</li> -->
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <!-- <img src="img/hero/cat-7.png" alt=""> -->
                                                    <span class="icon_phone">(+228) 90-09-99-00</span> 
                                                    <span>.......</span>
                                                </div>
                                                <div class="listing__item__text__info__right"> <a href="link.html" style="color:green;">Ouvrir le lien</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Most Search Section End -->

   
    <!--  Modal dashboard -->
    <div class="modal" id="dashboard">

    <!-- tache valide -->
      <?php
         $pseudo=$_POST["pseudo"];
         $sql = " SELECT COUNT(url_site) AS `tache_valide`  FROM table_url WHERE jobeur='$pseudo' AND valide=1";
         $result = $conn->query($sql);
         $row_array=$result->fetch_array(MYSQLI_ASSOC);
         $taches_valide= $row_array['tache_valide'];
      ?>
    <!-- fin tache valide -->
 <!-- tache valide -->
 <?php
         $pseudo=$_POST["pseudo"];
         $sql = " SELECT COUNT(url_site) AS `tache_invalide`  FROM table_url WHERE jobeur='$pseudo' AND valide=0";
         $result = $conn->query($sql);
         $row_array=$result->fetch_array(MYSQLI_ASSOC);
         $taches_invalide= $row_array['tache_invalide'];
      ?>
    <!-- fin tache valide -->
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"> 
            <?php
            $pseudo=$_POST["pseudo"];
            $sql2 = "SELECT type_de_compte FROM user  WHERE pseudo='$pseudo'";
            $result2 = $conn->query($sql2);
            
            if ($result2->num_rows > 0) {
              // output data of each row
              while($row2 = $result2->fetch_assoc()) {
                  if($row2['type_de_compte']=='demo'){
                      echo' <span class="badge badge-info">'.$row2['type_de_compte'].' </span>';
                  }else{ echo' <span class="badge badge-success">'.$row2['type_de_compte'].' </span>';}
               
               
                }
            }
           ?> 
            
           Mon compte   
        </h4>
      
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

             <div class="card">
               <div class="card-body">
                 <h5 class="card-title" style="text-align:center;">Informations personnelles</h5>
                 <p class="card-text">
                
                     Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                 <a class="card-link">Card link</a>
                 <a class="card-link">Another link</a>
               </div>
             </div>
             <!-- <p style=" border-top-style: solid;border-top-color: #bbb;"></p> -->
             <div class="card" style="margin-top:5px;" >
               <div class="card-body">
                 <h5 class="card-title"  style="text-align:center;">Taches</h5>
                 <a class="card-link">
                    <button type="button" class="btn btn-primary">
                       taches valides <span class="badge badge-light"><?php echo $taches_valide;?></span>
                    </button>
                  </a>
                 <a class="card-link">
                    <button type="button" class="btn btn-danger">
                       taches invalides <span class="badge badge-light"><?php echo $taches_invalide;?></span>
                    </button>
                  </a>
                  <a class="card-link">
                    <button type="button" class="btn btn-success">
                       remuneration <span class="badge badge-light">X- FCFA</span>
                    </button>
                  </a>
                  <a class="card-link">
                    <button type="button" class="btn btn-warning">
                      SE FAIRE PAYER
                    </button>
                  </a>
               </div>
             </div>
             
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
          <?php 
                                  if(isset($_SESSION["login"]) && $_SESSION["login"]==1) {
                                    echo '
                                    <form method="post" action="index.php">
                                         <button style="color:black;  float:left;"  type="submit" name="logout">se deconnecter
                                            <i class="fa fa-sign-out"></i>
                                         </button>
                                         </form>' ; 

                                 } else{?><button type="button" class="btn btn-lg btn-dark" data-toggle="modal" data-target="#login">LogIn</button>
                                  <?php } ;
                            ?>  
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <!--fin modal dashboard-->
    
    <!--  Modal addlink -->
    <div class="modal" id="addlink">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header" >
            <h4 class="modal-title" >ajouter une entreprise</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form name="addlink_form">
                <div class="form-group row">
                      <div class="col-xs-2">
                        <input class="form-control" placeholder="URL" id="input8" type="text" name="site_url" id="site_url">
                      </div>
                      <div class="col-xs-3">       
                        <input class="form-control"  placeholder="Nom de l'entreprise " id="input7" name="nom_entre" type="text">
                      </div>
                      <div class="col-xs-3">                  
                      <input class="form-control"  placeholder="Type de lien:site web/reseau social" id="input10" name="type_lien" type="text">
                      </div>
                </div>
                <div class="form-group  row">
                    <div class="col-xs-3"> 
                         <input type="text" class="form-control" name="numero" placeholder="numero" id="input1">
                    </div>   
                    <div class="col-xs-3"> 
                         <input type="text" class="form-control" name="adresse" placeholder="Adresse" id="input2">
                    </div>  
                    <div class="col-xs-4">                  
                        <select class="form-control" name="cat_entre" id="input9">
                            <option  value="">Secteur d'activite</option>
                           <option>Immobilier</option>
                           <option value="informatique">Informatique</option>
                           <option value="commerce">Commerce</option>
                           <option value="agence de securite">Agence de securite</option>
                        </select>
                      </div> 
                </div>
                <div class="form-group  row">
                    <div class="col-xs-3"> 
                         <input type="text" class="form-control" name="nom_concepteur" placeholder="concepteur du site" id="input3">
                    </div>   
                    <div class="col-xs-3"> 
                         <input type="text" class="form-control" name="numero_concepteur" placeholder="telephone du concepteur" id="input4">
                    </div>   
                </div>
                <div class="form-group  row">
                    <div class="col-xs-3"> 
                         <input type="text" class="form-control" name="nom_serveur_h" placeholder=" serveur d'hebergement" id="input5">
                    </div>   
                    <div class="col-xs-3"> 
                         <input type="text" class="form-control"  name="nom_serveur_d"placeholder="serveur de noms de domaine" id="input6">
                    </div>   
                </div>
            </form>
            <button type="button"  class="btn btn-primary" onclick="sendUrl()"> envoyer</button>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
          <div id="addlink_result"></div>
            <button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <!--fin modal add link-->
    
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
            <form action="index.php" method="post" name="connexion">
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
            <p data-toggle="modal" data-dismiss="modal" data-target="#inscri" style="float: right; color:green;"> vous n'avez pas de compte</p>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <!--fin modal Login-->

  <!--  Modal Inscription -->
    <div class="modal" id="inscri">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Inscription</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body"> 
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="inscription">
            <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Prenom" id="prenom" name="prenom">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="email" id="email" name="email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Pseudo" id="pseudo" name="pseudo">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Adresse" id="adresse" name="adresse">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="pays" id="pays" name="pays">
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" placeholder="Numero" id="numero" name="numero">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Enter password" id="pass" name="pass">
                </div>
                <button type="submit" name="save_inscri" class="btn btn-primary">S'inscrir</button>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <!--fin modal inscription-->
  
    <!-- Footer Section Begin -->
    <script>

      function sendUrl()
            {
           //alert("hello");
 
              $.ajax({
                type: 'post',
                url: 'save_url.php',
                data: {
                   site_url:document.forms["addlink_form"]["site_url"].value,
                   nom_entre:document.forms["addlink_form"]["nom_entre"].value,
                   numero_entre:document.forms["addlink_form"]["numero"].value,
                   cat_entre:document.forms["addlink_form"]["cat_entre"].value,
                   adresse:document.forms["addlink_form"]["adresse"].value,
                   nom_concepteur:document.forms["addlink_form"]["nom_concepteur"].value,
                   numero_concepteur:document.forms["addlink_form"]["numero_concepteur"].value,
                   nom_serveur_h:document.forms["addlink_form"]["nom_serveur_h"].value,
                   nom_serveur_d:document.forms["addlink_form"]["nom_serveur_h"].value
 
                },
                success: function (response) {
                  $('#addlink_result').html(response);
                  document.getElementById('input1').value="";
                  document.getElementById('input2').value="";
                  document.getElementById('input3').value="";
                  document.getElementById('input4').value="";
                  document.getElementById('input5').value="";
                  document.getElementById('input6').value="";
                  document.getElementById('input7').value="";
                  document.getElementById('input8').value="";
                  document.getElementById('input9').value="";
                  //alert("succes");
                }
              });
                
              return false;
            }
    </script>


   <?php require("footer.php"); ?>
    <!-- Footer Section End -->
    <script>
        $(document).ready(function(){
          $('.toast').toast('show');

       
        });
        
    </script>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    
    <?php mysqli_close($conn);?>
</body>

</html>