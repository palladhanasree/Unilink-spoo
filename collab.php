<?php
require_once('connection.php');
require('navigation.php');
session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
}
$join="Select * from team";
$join_proj = $con->query($join);
$sq= "Select * from projects";
$all_explore = $con->query($sq);

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="css/coll.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

        <body>
            <div class="otherproj">
               
                  
                <?php 
                 while($row = mysqli_fetch_assoc($all_explore)){
                    $did = $row['field_id']; 
                     $domain_query = "SELECT DName FROM domain WHERE Did = $did";
                     $domain_result = $con->query($domain_query); 
                      $domain_row = mysqli_fetch_assoc($domain_result); 
            
                      ?>
              <a href="">
                <div class="proj1 projcard">
                <form method="post">
                    <h4><?php echo $row["project_name"]; ?></h4>
                    <h5 class="hfield"><?php echo $domain_row["DName"]; ?></h5> 
                    <h5><?php echo $row["end_date"]; ?></h5>
                    <button type="submit" id="ex3" name="join" class="btn-primary pbutton">Join</button>
                 </form>
                </div>
            </a>
            <?php
        }
                    ?>
             <?php 
                        while($row = mysqli_fetch_assoc($join_proj)){
                    
                           ?>

                            <div  class="proj1 projcard">
                            <form method="post">
                             <h4><?php echo $row["title"]; ?></h4>
                             <h5 class="hfield"><?php echo $domain_row["DName"]; ?></h5> 
                             <h5><?php echo $row["deadline"]; ?></h5>
                             <button type="submit" id="ex3" name="join" class="btn-primary pbutton">Join</button>
                             </form>
            
                      
                    </div>
                   
                    <?php
                 }
                    ?>        
                </div>  
        </body>
        <?php 
   if(isset($_POST["join"])){
    $title ="EDA of Iris Dataset";
    $field = "Data Science";
    $description = "using jav springboot and angular";
    $size = "3";
    $deadline = "2021-07-08";
    $sql="INSERT INTO  team (`title`, `field`,`description`,`size`,`deadline`,`email`) VALUES ('$title','$field','$description','$size','$deadline','$email')";
    $query=mysqli_query($con,$sql);
    if($query){
        ?>
        <script>
        alert('succesfully hosted');
        window.location="project.php";
        </script>
        <?php
        }
        else{
          ?>
          <script>
          alert('failed');
          </script>
          <?php
          }
          }
          ?>
</html>
