<footer class="navbar navbar-fixed-top">  
    
    <div class="logo navbar-header">
        <p class=""><img src="img/optimus.png" /></p>
        <h1>OPTIMUS <p class="shop">Shop</p></h1>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
    data-target="#navbarResponsive">
        <p class="fa fa-list"></p>    
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item"><a href="home.php" class="nav-link">Acceuil</a></li>
        <li id="ligne" class="dropdown nav-item">
            <a data-toggle="dropdown" href="#">Categories<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="nav-item"><a class="nav-link" href="detail.php?details=M">Mode</a></li>
                <li class="nav-item"><a class="nav-link" href="detail.php?details=I">Itech</a></li>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="panier.php" >Panier <?php if($panier->count() !=0){?><span><?php echo($panier->count()); ?></span><?php } ?><i class="fa fa-cart-plus"></i></a></li>
        <div class="search nav-item">
                <form action="search.php" method ="POST">
                    <input name="search" id="search" placeholder="   Recherche..."/>
                    <button type="submit" name="" class="fa fa-search">
                    </button>
                </form>
        </div>
        <li class="nav-item"><?php 
            $rep1 = $DB->connectBD()->query("SELECT * FROM users");
            while($donnee1 = $rep1->fetch()){
                if($donnee1['email'] == $_SESSION['online']){
                    $photo = $donnee1['photo_users'];
                    if($photo != null){
                        ?> <a class="nav-link" href="profil.php"><img style="width: 30px; height: 30px; border-radius: 50%;
                            border: 1px solid black; background-size: cover;" src="img/profil/<?php echo $photo ?>"> </a>
                        
                        <?php
                    } else{
                        ?> <a class="nav-link" href="profil.php"><img style="width: 30px; height: 30px; border-radius: 50%;
                        border: 1px solid black; background-size: cover;" src="img/profil/defaut.jpg" ></a>
                        <?php
                    }
                }
            } 
    ?>  </li>
    </ul>
    </div>
    
</footer>
<script src="bootstrap/jquery/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
