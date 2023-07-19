


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
   <!-- bootstrap CSS link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
     <!-- navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-info">
     <a class="navbar-brand" href="./admin/indexa.php">CRM System</a>
  <div class="container-fluid">
  <nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="./admin/logout.php" class="nav-link">Logout</a>
        </li>
        
    </ul>
  </div>
</nav>
    <h2>Email</h2>
    <form action="" method="post">
        
               TO:<input type="text" name="to" size="20"><br><br>
                
            Subject:<input type="text" name="subject" size="20"><br><br>
                
            Message:<textarea name="message" cols="30" rows="3"></textarea><br><br>
                
       <p><input type="submit" name="submit"></p>
    </form>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $to = $_POST['email'];
    $subject = $_POST['subject'];
    $message= $_POST['message'];
    $from = $_POST['iamluffy72@gmail.com'];
    $headers = "to: $to";

    mail($to,$subject,$message,$headers);
    echo "mail sent";
    }

?>