<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Public/css/index.css?d=<?=time();?>">
    <link rel="icon" href="../Public/favicon/chefs-hat.png">
    <title><?= App::getInstance()->title; ?></title>
</head>

<body>

    <header>

    <!-- NAVBAR
    =============================================================================================== -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand logo" href="index.php">Ofourneau</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav list-unstyled mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item ml-4">
                    <a class="nav-link" href="#">À propos</a>
                </li>

                <li class="nav-item dropdown ml-4">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Entrées
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Cakes</a>
                            <a class="dropdown-item" href="#">Entrées chaudes</a>
                            <a class="dropdown-item" href="#">Entrées froides</a>
                            <a class="dropdown-item" href="#">Pizzas</a>
                            <a class="dropdown-item" href="#">Quiches et tartes</a>
                            <a class="dropdown-item" href="#">Salades</a>
                            <a class="dropdown-item" href="#">Sandwichs</a>
                            <a class="dropdown-item" href="#">Soupes</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown ml-4">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pains
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Brioches et viennoiseries</a>
                            <a class="dropdown-item" href="#">Pains salés</a>
                        </div>
                    </div>
                </li>

                <li class="dropdown ml-4 drop">
                    <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown">Plâts</a>
                    <div class="dropdown">
                        <ul class="btn dropdown-menu" role="menu" aria-labelledby="dropdownMenuLink">
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Poissons</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">Coquillages</a></li>
                                    <li><a href="#" class="dropdown-item">Crevettes</a></li>
                                    <li><a href="#" class="dropdown-item">Rougets</a></li>
                                    <li><a href="#" class="dropdown-item">Saumon</a></li>
                                </ul>
                            </li>
                            <li class="dropdown dropdown-submenu">
                                <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Viandes</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="dropdown-item">Agneau</a></li>
                                    <li><a href="#" class="dropdown-item">Boeuf</a></li>
                                    <li><a href="#" class="dropdown-item">Canard</a></li>
                                    <li><a href="#" class="dropdown-item">Porc</a></li>
                                    <li><a href="#" class="dropdown-item">PorVeauc</a></li>
                                    <li><a href="#" class="dropdown-item">Volailles</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown ml-4">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Desserts
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Biscuits</a>
                            <a class="dropdown-item" href="#">Crèmes</a>
                            <a class="dropdown-item" href="#">Crêpes</a>
                            <a class="dropdown-item" href="#">Gâteaux</a>
                            <a class="dropdown-item" href="#">Pâtisseries</a>
                        </div>
                    </div>
                </li>


                <li class="nav-item ml-4">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <ul>
                <li class="nav-item list-unstyled ml-4">
                    <?= $navbarConnect; ?>

                </li>
            </ul>
        </div>
    </nav>


    <!-- BANNIERE
    ====================================================================================================-->

    <div class="container-fluid banner-img">

        <div class="banner-title">
            <h1>Bienvenue sur Ofourneau</h1>
            <small>Sed quoniam et advesperascit et mihi ad villam revertendum est, nunc quidem hactenus</small>
        </div>

    </div>

    <!-- BREADCRUMB
    ====================================================================================================-->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item"><a href="#">Data</a></li>
        </ol>
    </nav>

    </header>

    <!-- MAIN
    ====================================================================================================-->

    <main>

        <div class="container main-content">

            <?= $content; ?>

        </div>


        <!-- ####### PAGINATION ####### -->

        <!-- <div class="col-sm-4 offset-4">
    <nav aria-label="categories pagination">
    <ul class="pagination">
    <li class="page-item disabled">
    <span class="page-link">Previous</span>
    </li>
    <li class="page-item active">
    <span class="page-link">1
    <span class="sr-only">(current)</span>
    </span>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
    <a class="page-link" href="#">Next</a>
    </li>
    </ul>
    </nav>
    </div> -->

    </main>



    <!--Footer-->
    <footer class="page-footer font-small unique-color-dark pt-0">

        <div style="background-color: #EAB543 ;">
            <div class="container">
                <!--Grid row-->
                <div class="row py-4 d-flex align-items-center">

                    <!--Grid column-->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                        <!--Facebook-->
                        <a class="fb-ic ml-0">
                            <i class="fa fa-facebook white-text mr-lg-4"> </i>
                        </a>
                        <!--Twitter-->
                        <a class="tw-ic">
                            <i class="fa fa-twitter white-text mr-lg-4"> </i>
                        </a>
                        <!--Google +-->
                        <a class="gplus-ic">
                            <i class="fa fa-google-plus white-text mr-lg-4"> </i>
                        </a>
                        <!--Linkedin-->
                        <a class="li-ic">
                            <i class="fa fa-linkedin white-text mr-lg-4"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fa fa-instagram white-text mr-lg-4"> </i>
                        </a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->
            </div>
        </div>

        <!--Footer Links-->
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">

                <!--First column-->
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong>Company name</strong>
                    </h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong>Products</strong>
                    </h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">MDBootstrap</a>
                    </p>
                    <p>
                        <a href="#!">MDWordPress</a>
                    </p>
                    <p>
                        <a href="#!">BrandFlow</a>
                    </p>
                    <p>
                        <a href="#!">Bootstrap Angular</a>
                    </p>
                </div>
                <!--/.Second column-->

                <!--Third column-->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong>Useful links</strong>
                    </h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Your Account</a>
                    </p>
                    <p>
                        <a href="#!">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!">Help</a>
                    </p>
                </div>
                <!--/.Third column-->

                <!--Fourth column-->
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h6 class="text-uppercase font-weight-bold"><strong>Contact</strong></h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p><i class="fa fa-envelope mr-3"></i> info@example.com</p>
                    <p><i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
                </div>
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->

        <!-- Copyright-->
        <div class="footer-copyright py-3 text-center" style="background-color: #EAB543">
            © 2018 Copyright:
            <a href="https://mdbootstrap.com/material-design-for-bootstrap/">
                <strong> MDBootstrap.com</strong>
            </a>
        </div>
        <!--/.Copyright -->

    </footer>
    <!--/.Footer-->




    <!-- Bootstrap core CSS -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

    <script type="text/javascript" src="../Public/js/events.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
        $('dropdown-toggle').dropdown()
    });


    </script>



</body>


</html>
