<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title><?php echo $title; ?></title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

        <!-- Bootstrap core CSS -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="site.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <style>



            html, body{
                height:100%
            }

            .wrapper-login{
                min-height: 100%;
                padding: 20px ;

            }


            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="signin.css" rel="stylesheet">
    </head>
    <body class="text-center">

        <nav class="navbar navbar-expand-lg navbar-dark  bg-dark fixed-top ml-auto bg-dark-header-2">
            <a class="navbar-brand" href="#">CMScrude</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/CMS_Crude">Home <span class="sr-only">(current)</span></a>
                    </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="/CMS_Crude">Articles <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>

                </ul>

                <ul class="navbar-nav ml-auto">


                    <?php if (isset($_SESSION['logged'])): ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="material-icons">account_circle</i> <?php echo $_SESSION['user_email']; ?>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="home.php">Profile</a>
                                <a class="dropdown-item" href="#">Another action</a>

                                <a class="dropdown-item" href="http://localhost:8080/CMS_Crude/signout.php">Signout</a>
                            </div>
                        </li>     


                    <?php else : ?>
                        <li class="nav-item"> <a class="nav-link" href="login.php">Login</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="register.php">Register</a> </li>

                    <?php endif ?>

                </ul>

            </div>

        </nav>
