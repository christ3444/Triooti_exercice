
<?php 

if(isset($_POST["connexion"])){

    $pseudo=$_POST["pseudo"];
    $pass=$_POST["pass"];

    $sql = "SELECT pseudo,pass FROM user WHERE pseudo='$pseudo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

           if($row["pass"]==$pass){ 
            session_start();
            $_SESSION["pseudo"] =$row["pseudo"];
            $_SESSION["pass"] = $row["pass"];
            $_SESSION["login"]=1;
            }
          }
    }else{
        echo ' 
        <div class="container">
            <div class="col-md-4">
                <div class="alert alert-danger alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                   pseudo ou mot de passe inccorecte
                     <button  type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal" data-target="#login"> réessayer </button>
                </div>
            </div>    
        </div>';
    }
}

?>
<header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                       <p style="color:green;">272 taches a faire</p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./index.php">Accueil</a></li>
                                <li><a href="#">Entreprises</a>
                                <li><a href="#">Categories</a>
                                    <ul class="dropdown">
                                        <li><a href="#">agence immobilier</a></li>
                                        <li><a href="#">restoration</a></li>
                                        <li><a href="#">hotel</a></li>
                                        <li><a href="#">agence de securite</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">A propos</a></li>
                                <li><a href="#">Contact</a></li>
                                

                            </ul>
                        </nav>
                        <div class="header__menu__right">
                            <a href="#" class="primary-btn" data-toggle="modal" data-target="#addlink"><i class="fa fa-plus"></i>Ajouter un lien</a>
                           <?php 
                                  if(isset($_SESSION["login"]) && $_SESSION["login"]==1) {
                                    echo '<a style="color:white;">'. $_SESSION["pseudo"].'</a>' ; 
                                 } else{?><button type="button" class="btn btn-lg btn-dark" data-toggle="modal" data-target="#login">LogIn</button>
                                  <?php } ;
                            ?> 
                            <a href="#" class="login-btn" data-toggle="modal" data-target="#dashboard"><i class="fa fa-user"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap">
                <div class="slicknav_menu"> 
                    <!-- <a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_open" style="outline: none;">
                        <span class="slicknav_menutxt">MENU</span>
                            <span class="slicknav_icon"><span class="slicknav_icon-bar"></span>
                            <span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span>
                        </span>
                    </a> -->
                    <nav class="slicknav_nav" aria-hidden="false" role="menu" style="">
                         <!--<ul>
                            <li><a href="#" role="menuitem">Entreprises</a>
                            </li><li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row" style="outline: none;"><a href="#">Categories</a>
                                <span class="slicknav_arrow">►</span></a><ul class="dropdown slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                                    <li><a href="#" role="menuitem" tabindex="-1">agence immobilier</a></li>
                                    <li><a href="#" role="menuitem" tabindex="-1">restoration</a></li>
                                    <li><a href="#" role="menuitem" tabindex="-1">hotel</a></li>
                                    <li><a href="#" role="menuitem" tabindex="-1">agence de securite</a></li>
                                </ul>
                            </li>
                            <li><a href="#" role="menuitem">A propos</a></li>
                            <li><a href="#" role="menuitem">Contact</a></li> -->
                            <a href="#" class="primary-btn" data-toggle="modal" data-target="#addlink"><i class="fa fa-plus"></i>Ajouter un lien</a>
                            <?php 
                            if(isset($_SESSION["login"]) &&$_SESSION["login"]==1) {
                                echo '<a style="color:white;">'. $_SESSION["pseudo"].'</a>' ; 
                                 } else{?> <button type="button" class="btn btn-lg btn-dark" data-toggle="modal" data-target="#login">LogIn</button>
                                  <?php } ;
                            ?> 
                                <a href="#" type="button" class="login-btn" data-toggle="modal" data-target="#dashboard" ><i class="fa fa-user"></i></a>
        <!-- 
                        </ul> -->
                    </nav>
                </div>
            </div>
        </div>
    </header>