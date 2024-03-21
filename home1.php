<!DOCTYPE html>
<?php
require_once('connection.php');
require('navigation.php');
session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
}
$name = "select name from userdetail where email='$email'";
$namee=$con->query($name);
$sq= "Select * from projects";
$all_explore = $con->query($sq);


?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="css/project.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <body>
        <main>
           
            <!-- projects -->
        <section>
            <div class="projects">
                <h1 style="margin-bottom: 40px;">Explore Projects</h1>
                <div></div>       
                <div class="otherproj">
                <?php 
                    
                    while($row = mysqli_fetch_assoc($all_explore)){
                     
                        $did = $row['field_id']; 
                         $domain_query = "SELECT DName FROM domain WHERE Did = $did";
                         $domain_result = $con->query($domain_query); 
                          $domain_row = mysqli_fetch_assoc($domain_result); 
                
                          ?>
                  <a href="pcard.php">
                    <div class="proj1 projcard">
                        <h4><?php echo $row["project_name"]; ?></h4>
                        <h5 class="hfield"><?php echo $domain_row["DName"]; ?></h5> 
                        <h5><?php echo $row["end_date"]; ?></h5>
                    </div>
                </a>
                <?php
            }
                        
                    ?>
                </div>
               
                
            </div>
           
         
        </section>
        </main>
    </body>

</html>