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

<?php
$pdo = new PDO("mysql:host=localhost;dbname=curriculum_vitae", "root", "" , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

if (empty($_COOKIE["connecte"]))
  {
    header("Location: login.php");
    exit();
  }


if (!empty($_POST)) {
    $pdo = new PDO("mysql:host=localhost;dbname=curriculum_vitae", "root", "" , array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    if (!empty($_POST["nom"])){
        $result = $pdo->exec("UPDATE utilisateur set NOM = '" . $_POST['nom']."';");
    }
    if (!empty($_POST["prenom"])){
        $result = $pdo->exec("UPDATE utilisateur set PRENOM = '" . $_POST['prenom']."';");
    }
    if (!empty($_POST["contenu"])){
        $result = $pdo->exec("UPDATE utilisateur set DESCRIPTION = '" . $_POST['contenu']."';");
    }
    if (!empty($_POST["tel"])){
        $result = $pdo->exec("UPDATE utilisateur set TELEPHONE = '" . $_POST['tel']."';");
    }
    if (!empty($_POST["email"])){
        $result = $pdo->exec("UPDATE utilisateur set EMAIL = '" . $_POST['email']."';");
    }
    if(!empty($_POST["adresse"])){
        $result = $pdo->exec("UPDATE utilisateur set ADRESSE = '" . $_POST['adresse']."';");
    }
    if (!empty($_POST["facebook"])){
        $result = $pdo->exec("UPDATE utilisateur set FACEBOOK = '"."https://www.facebook.com/". $_POST['facebook']."';");
    }
    if (!empty($_POST["linkedin"])){
        $result = $pdo->exec("UPDATE utilisateur set LINKEDIN = '"."https://www.linkedin.com/in/". $_POST['linkedin']."';");
    }
    if (!empty($_POST["twitter"])){
        $result = $pdo->exec("UPDATE utilisateur set TWITTER = '"."https://twitter.com/" . $_POST['twitter']."';");
    }
    if (!empty($_POST["github"])){
        $result = $pdo->exec("UPDATE utilisateur set GITHUB = '"."https://github.com/" . $_POST['github']."';");
    }
    if (!empty($_POST["mdp"])){
        $result = $pdo->exec("UPDATE utilisateur set MDP = '". md5($_POST['mdp'])."';");
        setcookie("connecte", "", time()-1, '/');
    }
    if (!empty($_FILES)) {

        foreach ($_FILES["img"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["img"]["tmp_name"][$key];
                move_uploaded_file($tmp_name, "img/photodeprofil.jpg");
            }
        }
    }
}

if(!empty($_GET))
{
    if(!empty($_GET["idexp"]))
    {
        $result = $pdo->exec("DELETE FROM experiences WHERE id_experience = " .$_GET['idexp'].";");
    }

    if(!empty($_GET["idforma"]))
    {
        $result = $pdo->exec("DELETE FROM formation WHERE id_education = " .$_GET['idforma'].";");
    }
}

if(!empty($_POST))
{
    if(!empty($_POST["titreExperience"]))
    {
        $result = $pdo->exec("INSERT INTO experiences (titre, entreprise, description, date_debut, date_fin) VALUES('".$_POST['titreExperience']."','".$_POST['entrepriseExperience']."','".$_POST['descriptionExperience']."','".$_POST['dateDebutExperience']."','".$_POST['dateFinExperience']."');");
        echo "INSERT INTO experiences (titre, entreprise, description, date_debut, date_fin) VALUES('".$_POST['titreExperience']."','".$_POST['entrepriseExperience']."','".$_POST['descriptionExperience']."','".$_POST['dateDebutExperience']."','".$_POST['dateFinExperience']."');";
    }
    if(!empty($_POST["titreFormation"]))
    {
        $result = $pdo->exec("INSERT INTO formation (institution, description, date_debut, date_fin) VALUES('".$_POST['titreFormation']."','".$_POST['descriptionFormation']."','".$_POST['dateDebutFormation']."','".$_POST['dateFinFormation']."');");
    }
}
?>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Administration
        </span>
    </a>
  </nav>

  <div class="container-fluid p-0">
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <h1 class="mb-0">Administration</h1>
        
        <div>
            <form action="" method = "POST" class="form-info" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titre">Nom<br></label>
                <input type="texte" class="form-control" id="nom" name="nom">
            </div>

            <div class="form-group">
                <label for="contenu">Prénom<br></label>
                <input type="texte" class="form-control" id="prenom" name="prenom">
            </div>

            <div class="form-group">
                <label for="contenu">Description<br></label>
                <textarea class="form-control" id="description" name="contenu" rows="5" ></textarea>
            </div>

            <div class="form-group">
                <label for="contenu">Téléphone<br></label>
                <input type="texte" class="form-control" id="tel" name="tel">
            </div>

            <div class="form-group">
                <label for="contenu">Email<br></label>
                <input type="texte" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="contenu">Adresse<br></label>
                <input type="texte" class="form-control" id="adresse" name="adresse">
            </div>

            <div class="form-group">
                <label for="contenu">Facebook<br></label>
                <input type="texte" class="form-control" id="facebook" name="facebook">
            </div>

            <div class="form-group">
                <label for="contenu">LinkedIn<br></label>
              <input type="texte" class="form-control" id="linkedin" name="linkedin">
            </div>

            <div class="form-group">
                <label for="contenu">Twitter<br></label>
                <input type="texte" class="form-control" id="twitter" name="twitter">
            </div>

            <div class="form-group">
                <label for="contenu">GitHub<br></label>
                <input type="texte" class="form-control" id="github" name="github">
            </div>

            <div class="form-group">
                <label for="titre">Image de profil (.jpg)<br></label>
                <input type="file" class="form-control-file" id="img" name="img[]">
            </div>
            <div class="form-group">
                <label for="contenu">Mot de passe<br></label>
                <input type="password" class="form-control" id="mdp" name="mdp">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Enregister</button>

            </form>
        </div>
         
        
      </div>
    </section>


    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
      <h2 class="mb-5">Ajouter une expérience</h2>
      <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <div>
            <form action="" method = "POST" class="form-info">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="texte" class="form-control" id="titre" name="titreExperience">
            </div>

            <div class="form-group">
                <label for="contenu">Description</label>
                <input type="texte" class="form-control" id="description" name="descriptionExperience">
            </div>

            <div class="form-group">
                <label for="contenu">Entreprise</label>
                <input type="texte" class="form-control" id="entreprise" name="entrepriseExperience">
            </div>

            <div class="form-group">
                <label for="contenu">Date de début</label>
                <input type="date" class="form-control" id="dateDebut" name="dateDebutExperience">
            </div>

            <div class="form-group">
                <label for="contenu">Date de fin</label>
                <input type="date" class="form-control" id="dateDebut" name="dateFinExperience">
            </div>
            <button type="submit" class="btn btn-primary">Enregister</button>

            </form>
        </div>
    

    <div class="w-100">
    <h2 class="mb-5">Supprimer une expérience</h2>
        <?php 
        $resultat = $pdo->query("SELECT * FROM experiences ;");
        
        while($tableau_experiences = $resultat->fetch(PDO::FETCH_OBJ)) {
        ?>
            <h3 class="mb-0"><?php echo $tableau_experiences->titre?></h3>
            <a type="submit" href="ebd20f5dd2bcff2044e9e37c97a6c70e.php?idexp=<?php echo $tableau_experiences->id_experience?>"class="btn btn-light">Supprimer l'expérience</a>
        <?php
        }
        ?>
    </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="formation">
      <h2 class="mb-5">Ajouter une formation</h2>
      <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="w-100">
        <div>
            <form action="" method = "POST" class="form-info">
            <div class="form-group">
                <label for="titre">Institution</label>
                <input type="texte" class="form-control" id="institution" name="titreFormation">
            </div>

            <div class="form-group">
                <label for="contenu">Description</label>
                <input type="texte" class="form-control" id="description" name="descriptionFormation">
            </div>

            <div class="form-group">
                <label for="contenu">Date de début</label>
                <input type="date" class="form-control" id="dateDebut" name="dateDebutFormation">
            </div>

            <div class="form-group">
                <label for="contenu">Date de fin</label>
                <input type="date" class="form-control" id="dateDebut" name="dateFinFormation">
            </div>
            <button type="submit" class="btn btn-primary">Enregister</button>

            </form>
        </div>
    

    <div class="w-100">
    <h2 class="mb-5">Supprimer une formation</h2>
        <?php 
        $resultat = $pdo->query("SELECT * FROM formation ;");
        
        while($tableau_formations = $resultat->fetch(PDO::FETCH_OBJ)) {
        ?>
            <h3 class="mb-0"><?php echo $tableau_formations->institution?></h3>
            <a type="submit" href="ebd20f5dd2bcff2044e9e37c97a6c70e.php?idforma=<?php echo $tableau_formations->id_education?>"class="btn btn-light">Supprimer la formation</a>
        <?php
        }
        ?>
    </div>
    </section>









  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>
