<!DOCTYPE html>
<?php
require_once('connection.php');
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title>Home | Unilink</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <body>
         <!-- header section starts  -->
         <header>
            <div class="headerleft">
                <div class="logo"><img id="logo" src="img\logo.png"></div>
                <div class="headernav hmargin">
                    <nav>
                        <ul>
                             <li><a href="home1.php" class="h_anchor">Home</a></li>
                             <li><a href="project.php" class="h_anchor">Projects</a></li>
                             <li><a href="collab.php" class="h_anchor">Collaborate</a></li>
                             <li><a href="host.php" class="h_anchor">Host</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="headerright hmargin">
                <div>
                    <input type="search" name="" placeholder="Search here..." id="searchbox">
                </div>
                 <div><a href="logout.php">Log Out</a></div>
            </div>
        </header>
</html>