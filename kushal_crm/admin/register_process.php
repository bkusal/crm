
<?php

include('../include/connect.php');

if(isset($_POST['up'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password']; 
    $hash_password=password_hash($password,PASSWORD_BCRYPT);
    
    $errors= array();
    if(empty($name) OR empty($phone) OR empty($email) OR empty($password)  ){
        array_push($errors,"All fields are required");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Email is not valid");
    }
    if (strlen($password)<8){
        array_push($errors,"Passwords must be at leasr 8 characters long");
    }
    $sql = "select * from admin where email = '$email';";
    $final= mysqli_query($con,$sql);
    $rowcount = mysqli_num_rows($final);
    if($rowcount>0){
        array_push($errors,"Email already exists!");
    }
    if(count($errors)>0){
        foreach($errors as $error){
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
            
    
    

    $insertquery= "insert into admin(name,phone,email,password) values('$name','$phone','$email','$hash_password')";

    $result = mysqli_query($con,$insertquery);

    if($result){
        ?>
        <script>
            alert("data inserted");
        </script> 
        <?php
    }else{
        ?>
        <script>
            alert("data not inserted");
        </script>
        <?php
        
    } 
}
?>