<!DOCTYPE html>
<?php
require_once('connection.php');
require('navigation.php');
?>
<?php
// Check if the project ID is passed in the URL
session_start(); 
if(isset($_GET['id'])) {
    // Retrieve the project ID from the URL parameter
    $project_id = $_GET['id'];

    // You can now use $project_id in your code
}
$sq = "SELECT * FROM `projects`  where project_id = '$project_id' ";
$description = $con->query($sq);
?>
<html>  
    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="css/projdes.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    
    <body>
    <main>
                <div class="content">
                    <div class="wrapper">
                        <div class="sidebar">
                            <ul>
                                <li><a href="pdesc.php"><i class="fa-solid fa-file-lines fa-2x"></i></a></li>    
                                <li><a href="code.php?id=<?php echo $project_id; ?>"><i class="fa-solid fa-code fa-2x"></i></a></li>
                                <li><a href=""><i class="fa-solid fa-people-group fa-2x"></i></a></li>
                                <li><a href=""><i class="fa-solid fa-calendar-check fa-2x"></i></a></li>
                                <li><a href=""><i class="fa-solid fa-comments fa-2x"></i></a></li>
                                <li><a href=""><i class="fa-solid fa-book-bookmark fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>
              
                  
                </div>
         
            </main>
<div class="pdeatils"> 
              
                    <?php 
                        while($row = mysqli_fetch_assoc($description)){
                           ?>
                   
                         <div class="pdesc">
      
                         <h1><?php echo $row["project_name"]; ?></h1>
                        <h2>End date - <?php echo $row["end_date"]; ?></h2>
        
        <p>
        <?php echo $row["description"]; ?>
        </p>
   
        <?php
                 }
                 ?>
    </div>
    <span>Hosted by Spoorthi</span>
</div>
</main>
</body>
</html>