<?php
require_once('projdesc.php');
if(isset($_GET['id'])) {
    // Retrieve the project ID from the URL parameter
    $project_id = $_GET['id'];

    // You can now use $project_id in your code

    $sq = "SELECT * FROM `projects`  WHERE project_id = '$project_id'";
    $description = $con->query($sq);

    // Rest of your code to display project details
    // ...
}
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
    <style>
        button{
            white-space: nowrap; padding:8px 19px; border-radius: 6px; border-width: 0.01px;
            background-color:#211C6A;
            margin-bottom: 10px;
            margin-left:1120px;
        }
        button>a{
            color: white;
        }
    </style>
    <body>
<div class="pdeatils">
    <h1>Code</h1>
    <?php 
                        while($row = mysqli_fetch_assoc($description)){
                           ?>
     <button><a href="<?php echo $row["git_repo"]; ?>">view repo</a></button>
     <div style="height: 400px; overflow: auto;">
        <script src="<?php echo $row["gistfile"]; ?>"></script>
    </div>
    <span>Hosted by Spoorthi</span>
    <?php
                 }
                 ?>
</div>
</main>
</body>
</html>