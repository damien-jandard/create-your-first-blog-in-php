<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ajouter un article</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Damien JANDARD</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/">Accueil</a></li>
                    <?php
                    if (!empty($_SESSION)) {
                        if ($_SESSION['auth'] === true) {
                            echo '<li class="nav-item mx-0 mx-lg-1"><a class="btn btn-outline-light btn-social mx-1" title="Se déconnecter" href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i></a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Add Post Section-->
    <section class="masthead page-section" id="register">
        <div class="container">
            <!-- Add Post Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Ajouter un article</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Add Post Section Form-->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * Add Post Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <form id="addPostForm" method="post" action="?action=addpost">
                        <!-- Title input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" name="title" type="text" placeholder="Mon article" value="<?php if (isset($_GET['title'])) echo $_GET['title']  ?>" required />
                            <label for="title">Titre</label>
                        </div>
                        <!-- Chapo input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="chapo" name="chapo" type="text" placeholder="Mon chapô" value="<?php if (isset($_GET['chapo'])) echo $_GET['chapo']  ?>" />
                            <label for="chapo">Chapô</label>
                        </div>
                        <!-- Content input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="content" name="content" type="text" placeholder="Contenu de mon article" style="height: 20rem" required><?php if (isset($_GET['content'])) echo $_GET['content']  ?></textarea>
                            <label for="content">Contenu</label>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Localisation</h4>
                    <p class="lead mb-0">
                        01140 SAINT DIDIER SUR CHALARONNE
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Mes réseaux</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-github"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Administration</h4>
                    <?php
                    if (!empty($_SESSION)) {
                        if ($_SESSION['auth'] === true) {
                            echo '<a class="btn btn-outline-light btn-social mx-1" title="Se déconnecter" href="?action=logout"><i class="fa-solid fa-right-from-bracket"></i></a>';
                        }
                    } else {
                        echo '<a class="btn btn-outline-light btn-social mx-1" title="S\'enregistrer" href="?action=register"><i class="fa-solid fa-user-plus"></i></a>';
                        echo '<a class="btn btn-outline-light btn-social mx-1" title="Se connecter" href="?action=login"><i class="fa-solid fa-lock"></i></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>