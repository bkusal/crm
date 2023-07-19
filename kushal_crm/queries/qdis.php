<?php
session_start(); 

if(!isset($_SESSION['email'])){
    header('location:../admin/loginad.php');
    exit;
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Queries Display Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     <!-- navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-info">
     <a class="navbar-brand" href="../admin/indexa.php">CRM System</a>
  <div class="container-fluid">
  <nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
        </li>
        
    </ul>
  </div>
</nav>
<div class="container mt-3">
  <h2>Customer's Queries</h2>
  <div class="table-responsive">    
  <table class="table  table-stripped">
    <thead>
      <tr>
        <th>id</th>
        <th>subject</th>
        <th>Product Name</th>
        <th>Customer Name</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
     <?php
     include '../include/connect.php';
    $sql = "SELECT 
    customer_queries.id,
    customer_queries.subject, 
    products.product_name as product_name,
    products.id as product_id,
    customers.name as customer_name,
    customers.id as customer_id,
    customer_queries.image
    FROM ((customer_queries
    INNER JOIN products ON customer_queries.product_id = products.id)
    INNER JOIN customers ON customer_queries.customer_id = customers.id)";
   
        $result = mysqli_query($con,$sql);
        // $rows=mysqli_fetch_assoc($result);
        // echo "<pre>";
        // print_r($rows);die();
        if($result){
            while($row=mysqli_fetch_assoc($result)){
     if($result){
        $id=$row['id'];
        $subject=$row['subject'];
        $product_id=$row['product_name'];
        $customer_id=$row['customer_name'];
        $image= $row['image'];
        
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$subject.'</td>
        <td><a href="#" target="_blank">'.$product_id.'</a></td>
        <td>'.$customer_id.'</td>
        <td>'.$image.'</td>

        </tr>';
     }
    }
     }
     ?>
    </tbody>
  </table>
  </div>
</div>

</body>
</html>
