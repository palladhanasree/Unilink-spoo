<!DOCTYPE html>
<?php
require_once('connection.php');
require('navigation.php');
session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
}
$join="Select * from team where email='$email'";
$join_proj = $con->query($join);
$sql = "Select * from projects join userdetail on userdetail.username=projects.hostname where userdetail.email='$email' and projects.ongoing = 1";
$ong_project = $con->query($sql);

$sq= "Select * from projects join userdetail on userdetail.username=projects.hostname where userdetail.email='$email' and projects.ongoing = 0";
 
$all_project = $con->query($sq);
?>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="css/pro.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <body>
        <main>
           
            <!-- projects -->
        <section>
            <div class="projects">
               
                <div class="myproject">
                    <h1>Ongoing projects</h1> 
                    <div>
                    <?php 
                        while($row = mysqli_fetch_assoc($ong_project)){
                    
                           ?>

                            <div  class="mproj1 myproj">
                               
                                <div>
                                <h2><a href="pdesc.php?id=<?php echo $row["project_id"]; ?> "><?php echo $row["project_name"]; ?></a>
</a></h2>    
                                     <h4>End Date - <?php echo $row["end_date"]; ?></h4>
                                  
                                </div>
                                <div><img src="img\homeimage.png" alt=""></div>
                                
                            </div>
                      
                    </div>
                   
                    <?php
                 }
                    ?>
  <?php 
                        while($row = mysqli_fetch_assoc($join_proj)){
                    
                           ?>

                            <div  class="mproj1 myproj">
                               
                                <div>
                                    <h2><a href="join.php?id=<?php echo $row["project_id"]; ?>"><?php echo $row["project_name"]; ?></a></h2>  
                                     <h4>End Date - <?php echo $row["end_date"]; ?></h4>
                                  
                                </div>
                                <div><img src="img\homeimage.png" alt=""></div>
                                
                            </div>
                      
                    </div>
                   
                    <?php
                 }
                    ?>
                </div>
              
                
                <hr class="projdivider">
                <h2>My Projects</h2>
                <div class="otherproj">
                <?php 
             while($row = mysqli_fetch_assoc($all_project)){
                $did = $row['field_id']; 
                 $domain_query = "SELECT DName FROM domain WHERE Did = $did";
                 $domain_result = $con->query($domain_query); 
                  $domain_row = mysqli_fetch_assoc($domain_result); 
        
                  ?>
               <a href="pdesc.php?id=<?php echo $row["project_id"]; ?>">
            <div class="proj1 projcard">
         
            <img src="<?php echo $row["img"]; ?>" alt="">
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