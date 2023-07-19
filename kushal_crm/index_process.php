
<?php
session_start(); // Start the session

include './include/connect.php';
if (isset($_POST['Submit'])) {
   
    $subject = $_POST['subject'];
    $product_id=$_POST['product_id'];
    $customer_id=$_POST['customer_id'];
    $image = $_POST['image'];
    $errors= array();
    if(empty($subject) OR empty($product_id) OR empty($customer_id) OR empty($description)){
        $_SESSION['error_message']="Required fields cannot be empty";
        header('Location:index.php');
    }

   
   
        $insertdata="insert into customer_queries(subject, product_id, customer_id, image) values('$subject','$product_id','$customer_id', '$image')" ;
        $result= mysqli_query($con,$insertdata);

        
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
    


?>
