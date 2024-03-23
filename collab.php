<?php
require_once('connection.php');
require('navigation.php');
session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
}
$join="Select * from projects where ongoing=1";
$join_proj = $con->query($join);

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="css/collaborate.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

        <body>
            <div class="otherproj">
               
                  
                <?php 
                 while($row = mysqli_fetch_assoc($join_proj)){
                    $did = $row['field_id']; 
                     $domain_query = "SELECT DName FROM domain WHERE Did = $did";
                     $domain_result = $con->query($domain_query); 
                      $domain_row = mysqli_fetch_assoc($domain_result); 
            
                      ?>
                <a href="pdesc.php?id=<?php echo $row["project_id"]; ?>">
                <div class="proj1 projcard">
                <form method="get">
                   <img src="<?php echo $row["img"]; ?>" alt="">
                    <h4><?php echo $row["project_name"]; ?></h4>
                    <h5 class="hfield"><?php echo $domain_row["DName"]; ?></h5> 
                    <h5><?php echo $row["end_date"]; ?></h5>
                    <input type="hidden" name="id" value="<?php echo $row["project_id"]; ?>">
                    <button type="submit" id="ex3" name="join" class="btn-primary pbutton">Join</button>
                 </form>
                </div>
            </a>
            <?php
        }
                    ?>
              
                </div>  
        </body>
        <?php 
   if(isset($_GET["id"])){
    $project_id=$_GET['id'];
    $new="Select * from projects where project_id='$project_id'";
    $new_proj = $con->query($new);
    while($row = mysqli_fetch_assoc($new_proj)){
        $title =$row["project_name"];
        $deadline = $row["end_date"];
         $sql="INSERT INTO  team (`project_id`,`project_name`,`end_date`,`email`) VALUES ('$project_id','$title','$deadline','$email')";
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
  
   
          }
          ?>
</html>
