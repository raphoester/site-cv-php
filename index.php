<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Resume - Start Bootstrap Theme</title>
  <?php header("Cache-Control:no-cache"); ?>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php 
  $pdo = new PDO("mysql:host=localhost;dbname=curriculum_vitae", "root", "" , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
  
  $resultat = $pdo->query("SELECT * FROM utilisateur WHERE id_utilisateur = 1;");
  $utilisateur = $resultat->fetch(PDO::FETCH_OBJ);
?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">

<?php if (!empty($_COOKIE["connecte"]))
{?>
  <a class="nav-link js-scroll-trigger" href="admin.php">Admin</a>
<?php
}
else
{
  ?>
  <a class="nav-link js-scroll-trigger" href="login.php">Admin</a>
  <?php
}
?>

    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none"><?php echo $utilisateur->prenom ." ". $utilisateur->nom;?>
      </span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/photodeprofil.jpg?<?php echo time()?>">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#a_propos">À propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Experiences</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#formation">Formations</a>
        </li>
      </ul>
    </div>
    
  </nav>

  <div class="container-fluid p-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="a_propos">
      <div class="w-100">
        <h1 class="mb-0"><?php echo $utilisateur->prenom ;?>
          <span class="text-primary"><?php echo $utilisateur->nom;?></span>
        </h1>
        <div class="subheading mb-5"><?php echo $utilisateur->adresse."<br>";?>
          <a href="mailto:<?php echo $utilisateur->email;?>"><?php echo $utilisateur->email."<br>";?></a>
          <a href="tel:<?php echo $utilisateur->telephone;?>"><?php echo $utilisateur->telephone;?></a>
        </div>
        <p class="lead mb-5"><?php echo $utilisateur->description;?></p>
        <div class="social-icons">
          <a href="<?php echo $utilisateur->linkedin;?>">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="<?php echo $utilisateur->github;?>">
            <i class="fab fa-github"></i>
          </a>
          <a href="<?php echo $utilisateur->twitter;?>">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="<?php echo $utilisateur->facebook;?>">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <div class="w-100">
      <h2 class="mb-5">Experiences</h2>
        <?php 

        $resultat = $pdo->query("SELECT * FROM experiences ;");
        
        while($tableau_experiences = $resultat->fetch(PDO::FETCH_OBJ)) {
          
        ?>
          
          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0"><?php echo $tableau_experiences->titre?></h3>
            <div class="subheading mb-3"><?php echo $tableau_experiences->entreprise?></div>
            <p><?php echo $tableau_experiences->description?></p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary"><?php echo $tableau_experiences->date_debut. " - ";
            if ($tableau_experiences->date_fin)
            {
                echo $tableau_experiences->date_fin;
            }
            else
            {
              ?>
                Maintenant
              <?php
            }
            
            ?>
            
            
            </span>
          </div>
        </div>
        <?php
        }
        ?>

      </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="formation">
      <div class="w-100">
        <h2 class="mb-5">Formations</h2>
        <?php 

        $resultat = $pdo->query("SELECT * FROM formation ;");
        
        while($tableau_formations = $resultat->fetch(PDO::FETCH_OBJ)) {
          
        ?>
        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
            <h3 class="mb-0"><?php echo $tableau_formations->description?></h3>
            <div class="subheading mb-3"><?php echo $tableau_formations->institution?></div>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary"><?php echo $tableau_formations->date_debut. " - ";
            if ($tableau_formations->date_fin)
            {
                echo $tableau_formations->date_fin;
            }
            else
            {
              ?>
                Maintenant
              <?php
            }
            
            ?>
            </span>
          </div>
        </div>
        <?php
        }
        ?>
    </section>

    <hr class="m-0">
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>
