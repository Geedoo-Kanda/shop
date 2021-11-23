<?php 
session_start();
require '../bd.class.php';
$DB = new BD();
    if($_SESSION['online']){
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/detail.css" />
    <title></title>
</head>
<body>
<section class=" affmobile col-md-12 col-sm-12 col-xs-12"> 
    <div class="desc col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <section class="aff col-md-12 col-sm-12 col-xl-12">
                <div class="logo col-md-12 col-sm-12 col-xs-12">
                    <p class=""><img src="../img/optimus.png" /></p>
                    <h1>OPTIMUS <span>Shop</span></h1>
                    <p class="para">Une plateforme de vente en ligne de type consommateurs vers
                        consommateurs qui vous permet non seulement d'acheter de bon produits
                        mais aussi de vendre ces proprès produits via le paiement VISA, MASTERCARD,
                        M-PESA, AIRTEL MONEY, ORANGE MONEY...</p>
                </div>
                <div class="profil col-md-12 col-sm-12 col-xs-12">
                    <h2>Votre profil</h2>
                        <?php
                        $rep1 = $DB->connectBD()->query("SELECT * FROM users");
                        while($donnee1 = $rep1->fetch()){
                        if($donnee1['email'] == $_SESSION['online']){
                                $photo = $donnee1['photo_users'];
                                $nom = $donnee1['nom_users'];
                                $prenom = $donnee1['prenom_users'];
                                $email = $donnee1['email'];
                                if($photo != null){
                                    ?> <div class="col-md-12 col-sm-12 col-xs-12">
                                        <img src="../img/profil/<?php echo $photo ?>"> 
                                        
                                    
                                        <h3 class="col-md-12 col-sm-12 col-xs-12"><?php echo strtoupper($prenom.' '.$nom) ?></h3>
                                        <p class="col-md-12 col-sm-12 col-xs-12"><?php echo $email ?></p>
                                    </div><?php
                                } else{
                                    ?> <div class="col-md-12 col-sm-12 col-xs-12">
                                        <img src="../img/profil/defaut.jpg" >
                                        

                                        <h3 class="col-md-12 col-sm-12 col-xs-12"><?php echo strtoupper($prenom.' '.$nom) ?></h3>
                                        <p class="col-md-12 col-sm-12 col-xs-12"><?php echo $email ?></p>
                                    </div><?php
                                }
                        }
                        } 
                ?>
                
        
    </ul>
                </div>
            </section>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <header>
            <a href="javascript:history.back()"><i class="fa fa-reply "></i></a> 
            <nav>Les produits vendus</nav>
        </header>
        <section class="contenu">
            <p>Photo</p>
            <p>noms</p>
            <p>Categorie</p>
            <p>Prix</p>
        <?php 
        $rep1 = $DB->connectBD()->query("SELECT * FROM produit where etat='vendu'order by id_produit desc");
        while($donnee1 = $rep1->fetch()){
           
            ?>
            <p>
                <img src="../img/produits/<?php echo  $donnee1['photo'];?>">
            </p>
            <p><?php echo $donnee1['nom']; ?></p>
            <p><?php echo $donnee1['categorie']; ?></p>
            <p><?php echo $donnee1['prix']; ?>$</p>
            <?php
            }
                    ?>
            
        </section>   
        </section> 
</body>
</html>
<?php
}      
    else{
        
        header('Location: ../index.html');
    }
?>