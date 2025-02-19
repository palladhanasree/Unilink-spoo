<?php
require_once('connection.php');
require('navigation.php');
session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport", content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="css/host.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    
    <body>
       
        <main>
            <div>
                <h1>Host a project</h1>
                <div class="create">
                    <form method="post">
                    <label for="projtitle" class="projlabel">Project Title<input type="text" id="projtitle" name="title"></label><br>
                    <label for="projfield" class="projlabel">Field 
                        <select name="field" id="projfield">
                            <?php 
                             $domain = mysqli_query($con, "select * from domain");
                             while($c = mysqli_fetch_array($domain)) {
                            ?>
                           <option value="<?php echo $c['Did'] ?>"><?php echo $c['DName'] ?></option>
                            <?php } ?>
                        </select></label><br>
                    <label for="projdesc" class="projlabel">Description <textarea id="suggestions" name ="description" rows="3" cols="30" placeholder="Enter the description here..."></textarea></label><br>
                    <label for="projdesc" class="projlabel">Size of the team<input type="number" id="projmem" name="size"></label><br>
                    <label for="projdesc" class="projlabel">Estimated Deadline<input type="date" id="projdead" name="deadline"></label><br>
                    <button type="submit" id="ex3" name="host" class="btn-primary">Host</button>
                    </form>
                </div>
            </div>
        </main>
    </body>
<?php 
   if(isset($_POST["host"])){
    $title = $_POST["title"];
    $field = $_POST["field"];
    $description = $_POST["description"];
    $size = $_POST["size"];
    $deadline = $_POST["deadline"];
    
    $sql="INSERT INTO  team (`title`, `field`,`description`,`size`,`deadline`,`email`) VALUES ('$title','$field','$description','$size','$deadline','$email')";
    $query=mysqli_query($con,$sql);
    if($query){
        ?>
        <script>
        alert('succesfully hosted');
        window.location="home1.php";
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
