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
            <nav>Les achats</nav>
        </header>
        <section class="contenu">
            <p>Date</p>
            <p>Acheteur</p>
            <p>Quatite</p>
            <p>total</p>
        <?php 
        $rep1 = $DB->connectBD()->query("SELECT *,date_format(date_paye, 'payer le %d/%m à %Hh') as date_pro FROM livre order by id desc");
        while($donnee1 = $rep1->fetch()){
            ?>
            <p> <?php echo $donnee1['date_pro']; ?></p>
            <p><?php echo strtoupper($donnee1['acheteur'])?></p>
            <p><?php echo strtoupper( $donnee1['quant_pro']).' produit(s)' ?></p>
            <p><?php echo $donnee1['total'].' $'; ?></p>
            <?php
            }
                    ?>
            
        </section>     
        </div>
    </section>
    <section class="affmobile">
        
    </section>
</body>
</html>
<?php
}      
    else{
        
        header('Location: ../index.html');
    }
?>