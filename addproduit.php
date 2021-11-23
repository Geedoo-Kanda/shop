<?php 
session_start();
require 'bd.class.php';
require 'panier.class.php';
$DB = new BD();
$panier = new panier($DB);
    if($_SESSION['online']){
        ?>
<!DOCTYPE h
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/addproduit.css" />

    <title>OPTIMUS Shop/login</title>
</head>
<body>
<section class="fond col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <li class="limg"><img src="img/f4.jpg" /></li>
    <section class="ombre col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="porto col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <section class="main col-md-12 col-sm-12 col-xs-12 ">
                    <div class="profil">
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
                                        <img src="img/profil/<?php echo $photo ?>"> 
                                        <a href="editer.php"><i class="fa fa-paint-brush"></i></a>
                                    
                                        <h3 class="col-md-12 col-sm-12 col-xs-12"><?php echo strtoupper($prenom.' '.$nom) ?></h3>
                                        <p class="col-md-12 col-sm-12 col-xs-12"><?php echo $email ?></p>
                                    </div><?php
                                } else{
                                    ?> <div class="col-md-12 col-sm-12 col-xs-12">
                                        <img src="img/profil/defaut.jpg" >
                                        <a href="editer.php"><i class="fa fa-paint-brush"></i></a>

                                        <h3 class="col-md-12 col-sm-12 col-xs-12"><?php echo strtoupper($prenom.' '.$nom) ?></h3>
                                        <p class="col-md-12 col-sm-12 col-xs-12"><?php echo $email ?></p>
                                    </div><?php
                                }
                        }
                    } 
            ?>
                    </div>
                    </section>
                    <div class="gestProduit">
                        <a href="addproduit.php" class="col-md-12 col-sm-12 col-xs-12">Ajouter un nouveau produit</a>
                        <a href="modif.php" class="col-md-12 col-sm-12 col-xs-12">Modifier/retirer un produit</a>
                        <a href="deconnexion.php" class="btn btn-danger"><i class="fa fa-power-off"></i> Deconnexion</a>
                    </div>
            </div>
            
            <div class="second col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form class="editer" action="addproduit_post.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <nav>**Tous les champs sont obligatoires**</nav>
                            <input type="text" name="nom" id="" placeholder="Nom du produit" required>
                            <input type="decimal" name="prix" id="" placeholder="Prix du produit" required>
                            <label for="">Categorie</label>
                            <select name="categorie" id="cat">
                                <option value="itech">Itech</option>
                                <option value="mode">Mode</option>
                            </select>
                            <label for="">Description</label>
                            <textarea name="description" id="" rows="2" required></textarea>
                            <label for="">Photo du produit</label>
                            <input type="file" name='produit' id="" placeholder="" required>
                    
                            <button type="submit" name="">Ajouter</button>
                        </fieldset>
                    </form>
                </div>   
            </section>     
    </section>
    <?php require 'footer.php'; ?>
    </section>
</body>
</html>
<?php
}      
    else{
        
        header('Location: index.html');
    }
?>