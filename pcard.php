<?php
require_once('projdesc.php');
$sq= "Select * from projects where project_id = 3";
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