<!DOCTYPE html>
<html lang="zxx">

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
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
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
         session_destroy();
        
     }
    ?>
      <?php require("header.php"); ?>
    <!-- Header Section End -->

    <!-- chat et erreur -->
    <div class="fixed-bottom">
            <button class='btn btn-primary'>chat</button>
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
                            <p>+ 100 entreprises repertorie</p>
                        </div>
                        <div class="hero__search__form">
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
                        </div>
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

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Annuaire des entreprises </h2>
                        <p>Trouvez ici tous types d'entreprises dans n'importe quel domaine</p>
                    </div>
                    <div class="categories__item__list">
                        <div class="categories__item">
                            <img src="img/categories/cat-1.png" alt="">
                            <h5>Immobilier</h5>
                            <span>78 Listings</span>
                        </div>
                        <div class="categories__item">
                            <img src="img/categories/cat-2.png" alt="">
                            <h5>Banque/Assurance</h5>
                            <span>32 Listings</span>
                        </div>
                        <div class="categories__item">
                            <img src="img/categories/cat-3.png" alt="">
                            <h5>Commerce</h5>
                            <span>16 Listings</span>
                        </div>
                        <div class="categories__item">
                            <img src="img/categories/cat-4.png" alt="">
                            <h5>Agroalimentaire</h5>
                            <span>55 Listings</span>
                        </div>
                        <div class="categories__item">
                            <img src="img/categories/cat-5.png" alt="">
                            <h5>BTP/construction</h5>
                            <span>23 Listings</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    
    <!-- Most Search Section Begin -->
    <section class="most-search spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Tous les secteurs d'activité</h2>
                        <p></p>
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
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="listing__item__text__info__right"> <a href="link.html" style="color:green;">Ouvrir le lien</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <div class="listing__item__pic set-bg" data-setbg="img/listing/list-2.jpg">
                                            <img src="img/listing/list_icon-2.png" alt="">
                                            <div class="listing__item__pic__tag top_rate">Top Rate</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Shrimp floured and fried</h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <h6>$40 - $70</h6>
                                                </div>
                                                <ul>
                                                    <li><span class="icon_pin_alt"></span> 1012 Vesper Dr. Columbus,
                                                        Georgia(GA), United States</li>
                                                    <li><span class="icon_phone"></span> (+12) 345-678-910</li>
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <img src="img/listing/list_small_icon-2.png" alt="">
                                                    <span>Food & Drink</span>
                                                </div>
                                                <div class="listing__item__text__info__right closed">Closed</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <div class="listing__item__pic set-bg" data-setbg="img/listing/list-3.jpg">
                                            <img src="img/listing/list_icon-3.png" alt="">
                                            <div class="listing__item__pic__tag">Popular</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Sweet and sour pork ribs</h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <h6>$40 - $70</h6>
                                                </div>
                                                <ul>
                                                    <li><span class="icon_pin_alt"></span> 251 Wiley St. Forks,
                                                        Washington(WA), United States</li>
                                                    <li><span class="icon_phone"></span> (+12) 345-678-910</li>
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <img src="img/listing/list_small_icon-1.png" alt="">
                                                    <span>Restaurant</span>
                                                </div>
                                                <div class="listing__item__text__info__right">Open Now</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <div class="listing__item__pic set-bg" data-setbg="img/listing/list-4.jpg">
                                            <img src="img/listing/list_icon-4.png" alt="">
                                            <div class="listing__item__pic__tag">Popular</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Crab fried with tamarind</h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <h6>$40 - $70</h6>
                                                </div>
                                                <ul>
                                                    <li><span class="icon_pin_alt"></span> 14320 Keenes Mill Rd.
                                                        Cottondale, Alabama(AL), United States</li>
                                                    <li><span class="icon_phone"></span> (+12) 345-678-910</li>
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <img src="img/listing/list_small_icon-3.png" alt="">
                                                    <span>Hotel</span>
                                                </div>
                                                <div class="listing__item__text__info__right closed">Closed</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <div class="listing__item__pic set-bg" data-setbg="img/listing/list-5.jpg">
                                            <img src="img/listing/list_icon-5.png" alt="">
                                            <div class="listing__item__pic__tag hot_deal">Hot Deal</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Tortoise grilled on salt</h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <h6>$40 - $70</h6>
                                                </div>
                                                <ul>
                                                    <li><span class="icon_pin_alt"></span> 236 Littleton St. New
                                                        Philadelphia, Ohio, United States</li>
                                                    <li><span class="icon_phone"></span> (+12) 345-678-910</li>
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <img src="img/listing/list_small_icon-4.png" alt="">
                                                    <span>Shopping</span>
                                                </div>
                                                <div class="listing__item__text__info__right">Open Now</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <div class="listing__item__pic set-bg" data-setbg="img/listing/list-6.jpg">
                                            <img src="img/listing/list_icon-6.png" alt="">
                                            <div class="listing__item__pic__tag">Popular</div>
                                            <div class="listing__item__pic__btns">
                                                <a href="#"><span class="icon_zoom-in_alt"></span></a>
                                                <a href="#"><span class="icon_heart_alt"></span></a>
                                            </div>
                                        </div>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Fish cooked with fishsauce</h5>
                                                <div class="listing__item__text__rating">
                                                    <div class="listing__item__rating__star">
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star"></span>
                                                        <span class="icon_star-half_alt"></span>
                                                    </div>
                                                    <h6>$40 - $70</h6>
                                                </div>
                                                <ul>
                                                    <li><span class="icon_pin_alt"></span> 2604 E Drachman St. Tucson,
                                                        Arizona, United States</li>
                                                    <li><span class="icon_phone"></span> (+12) 345-678-910</li>
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <img src="img/listing/list_small_icon-3.png" alt="">
                                                    <span>Hotel</span>
                                                </div>
                                                <div class="listing__item__text__info__right">Open Now</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Most Search Section End -->

   
    <!--  Modal dashboard -->
    <div class="modal" id="dashboard">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Mon compte    
        </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            Modal body..
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
          <div class="modal-header">
            <h4 class="modal-title" >ajouter une entreprise</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="index.php" method="post">
                <div class="form-group row">
                      <div class="col-xs-2">
                        <input class="form-control" placeholder="URL" id="ex1" type="text">
                      </div>
                      <div class="col-xs-3">       
                        <input class="form-control"  placeholder="Nom de l'entreprise " id="ex2" type="text">
                      </div>
                      <div class="col-xs-4">                  
                        <select class="form-control" id="sel1">
                            <option>Secteur d'activite</option>
                           <option>Immobilier</option>
                           <option>Informatique</option>
                           <option value="">Commerce</option>
                           <option value="">Agence de securite</option>
                        </select>
                      </div>
                </div>
                <div class="form-group  row">
                    <div class="col-xs-3"> 
                         <input type="number" class="form-control"  placeholder="numero" id="usr">
                    </div>   
                    <div class="col-xs-3"> 
                         <input type="text" class="form-control"  placeholder="Adresse" id="usr">
                    </div>   
                </div>
                <button type="submit" name="save_url" class="btn btn-primary">Envoyer</button>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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