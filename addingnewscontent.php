<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="style/main.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style/main.css"/>
    <link rel="stylesheet" href="style/normalization.css"/>


</head>

<body id="page-top" class="index">

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Scroll Down <i class="fa fa-bars"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php">Clubs</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php">News</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php">Log In/ Log out</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>
    <div class="container">

        <div class="intro-text">
            <div class="intro-lead-in">Welcome To Sportlethen!</div>
            <div class="intro-heading">It's Nice To Meet You</div>
            <a href="index.php" class="page-scroll btn btn-xl">Tell Me More</a>

        </div>
    </div>
</header>

<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">About</h2>
                <h3 class="text-muted">We are an association of local and progressive sports clubs who are working together
                    to develop safe and fun sport & fitness activities in the Portlethen area.
                </h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                <p class="text-muted">We work with sportscotland and other organisations to develop our clubs</p>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                <p class="text-muted">Our website is a single access point to find out more about the fantastic
                    sporting opportunities in our area.
                </p>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
            </div>
        </div>
    </div>
</section>

<!--  Clubs Section -->
<section id="clubs" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Clubs</h2>
                <h3 class="section-subheading text-muted">Here you can view all the clubs available in the area.</h3>

            </div>
        </div>
        <div class="row">
            <?

            include("dbconnect.php");

            //MYSQL INJECTION PROTECTION
            //$ClubName = mysqli_real_escape_string($ClubName);
            //$Description = mysqli_real_escape_string($Description);

            $sql_query = "SELECT * FROM clubs";
            $result = $db->query($sql_query);

            while($row = $result->fetch_array())
            {
                $ClubName = $row["ClubName"];
                $Description = $row["Description"];

                echo "
                            <h3 class='section-heading'>{$ClubName}</h3>
                            <p class='text-muted'>{$Description}</p>
    ";
            }
            ?>

            <?php

            if (isset($_SESSION['Username'])) //SESSION DOES EXIST
            {
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    //        include("scripts/header.php");
                    ?>

                    <main>
                        <h2 class="section-heading">Add a new club</h2>
                        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                        <script>tinymce.init({selector: 'textarea'});</script>
                        <form action="addingnewscontent.php" method="post">
                            <input type="text" name="ClubName" placeholder="ClubName">
                            <input type="text" name="Genre" placeholder="Genre">
                            <textarea name="Description"></textarea>
                            <button type="submit" class="btn btn-xl">ADD</button>
                        </form>
                    </main>

                    <?

                    // include("scripts/footer.php");

                }
                elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    include ('dbconnect.php');
                    $ClubID = str_replace(' ', '-', $_POST["ClubName"]);
                    $ClubName = $_POST["ClubName"];
                    $Genre = $_POST["Genre"];
                    $Description = $_POST["Description"];
                    $AccessID = $_SESSION["AccessID"];
                    $PhotoID = $_SESSION["PhotoID"];
                    $GenreID = $_SESSION["GenreID"];
                    $CalanderID = $_SESSION["CalanderID"];

                    $sql = "INSERT INTO clubs (ClubID, ClubName, Genre, Description, AccessID, PhotoID, GenreID, CalanderID) VALUES ('".$ClubID ."', '".$ClubName."', '".$Genre."', '".$Description."', '" .$AccessID."', '".$PhotoID."', '".$GenreID."', '".$CalanderID."')";
                    if (mysqli_query($db, $sql)) {
                    } else {
                        echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
                    }
                    //      header("index.php");
                }
//test
            } else {
                //        header("location:index.php");
            }

            ?>
        </div>

    </div>
    </div>
</section>

<!-- News Section -->
<section id="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">News</h2>
                <h3 class="section-subheading text-muted">All the news happening in the area.</h3>
            </div>
        </div>
        <div class="row">

           <?php

            if (isset($_SESSION['Username'])) //SESSION DOES EXIST
            {
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //        include("scripts/header.php");
                    ?>

            <main>
                <h2 class="section-heading">Add a new aricle</h2>
                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                <script>tinymce.init({selector: 'textarea'});</script>
                <form action="addingnewscontent.php" method="post">
                    <input type="text" name="Title" placeholder="Title">
                    <textarea name="Content"></textarea>
                    <button type="submit" class="btn btn-xl">ADD</button>
                </form>
            </main>

            <?

                    //MYSQL INJECTION PROTECTION
                    //$ItemID = mysqli_real_escape_string($ItemID);
                    //$Title = mysqli_real_escape_string($Title);
                    //$Content = mysqli_real_escape_string($Content);
                    //$AccessID = mysqli_real_escape_string($AccessID);
                    //$PhotoID = mysqli_real_escape_string($PhotoID);

           // include("scripts/footer.php");

            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                include ('dbconnect.php');
                $ItemID = str_replace(' ', '-', $_POST["Title"]);
                $Title = $_POST["Title"];
                $Content = $_POST["Content"];
                $AccessID = $_SESSION["AccessID"];
                $PhotoID = $_SESSION["PhotoID"];
                $sql = "INSERT INTO health (ItemID, Title, Content, AccessID, PhotoID) VALUES ('".$ItemID ."', '".$Title."', '".$Content."', '".$AccessID."', '" .$PhotoID."')";
                if (mysqli_query($db, $sql)) {
                } else {
                    echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
                }
          //      header("index.php");
            }
//test
} else {
        //        header("location:index.php");
            }

?>

        </div>
        </div>

</section>

<!-- Log in/Log out Section -->
<section id="login" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Log In/Log out</h2>
                <h3 class="section-subheading text-muted">Log in to get more access.</h3>
            </div>
        </div>
        <div class="row">

            <?



            include ("dbconnect.php");
            //Check to see if the 'username' session variable is set.
            if (isset($_SESSION['Username'])) //SESSION DOES EXIST
            {
                echo "<p>Hello " . $_SESSION['Username'] . "</p>";
                $sql = "SELECT * FROM users WHERE Username='". $_SESSION['Username'] . "'";
                $result = $db->query($sql);
                while($row = $result->fetch_array())
                {
                    echo "<p>User type is " . $row['Username'] . "</p>";
                }
                ?>
                <button type="submit" class="btn btn-xl"> <a href="logout.php">Logout</a></button>
                <?
            }

            else //SESSION DOESNT EXIST
            {
                ?>

                <form method="post" action="checklogin.php">
                    <p><input type="text" name="Username" value="" placeholder="Username or Email"></p>
                    <p><input type="password" name="Password" value="" placeholder="Password"></p>
                    <button type="submit" class="btn btn-xl">Log In</button>

                    <input type="checkbox" checked="checked"> Remember me
                </form>

                <?
            }
            ?>

            <h2>Signup Form</h2>
            <form method="post" action="signup2.php">
                <p><input type="text" name="username" value="" placeholder="Username"></p>
                <p><input type="text" name="email" value="" placeholder="email"></p>
                <p><input type="password" name="password" value="" placeholder="Password"></p>
                <p><input type="password" name="passwordcheck" value="" placeholder="Confirm Password"></p>
                <button type="submit" class="btn btn-xl"> <a href="signup2.php">Submit</a></button>

            </form>

        </div>

    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Contact Us</h2>
                <h3 class="section-subheading text-muted">If you have any problems, message us.</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button type="submit" class="btn btn-xl">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; Created by Zaklina Rycko, Cara Henderson, Sarah Thomson, Sarah Valentine and Lucy Axford</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">

                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
