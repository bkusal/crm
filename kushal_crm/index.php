<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer's Queries</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }

      html,
body {
  height: 100%;
}

.form-signin {
  max-width: 530px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<?php session_start(); ?>
<main class="form-signin w-100 m-auto">
  <form action="index_process.php" method="POST" >
    <h1 class="h3 mb-3 fw-normal">Customer's Queries</h1>
    <p>Please post your queries</p>

    <?php if(isset($_SESSION['error_message'])){ ?>

    <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['error_message']; ?> </div>

    <?php } ?>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" name="subject">
      <label for="floatingInput">Subject</label>
    </div>
    <div class="form-floating mb-3">
      <input type="tel" class="form-control" id="floatingInput" name="phone">
      <label for="floatingInput">Phone</label>
    </div>
    <div class="form-floating mb-3">
    <select class="form-control" name="product_id" id="product_id">
                        <?php
                        include './include/connect.php';
                        $sql="select id, product_name from products";
                        $result = mysqli_query($con,$sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                              echo "<option value=" . $row["id"] . ">" . $row["product_name"] . "</option>";
                            }
                          }
                        
                         ?>
    </select>
      <label for="floatingInput">Product</label>
    </div>
    <div class="form-floating mb-3">
    <select class="form-control" name="customer_id" id="customer_id">
                        <?php
                        include './include/connect.php';
                        $sql="select id, name from customers";
                        $result = mysqli_query($con,$sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                              echo "<option value=" . $row["id"] . ">" . $row["name"] . "</option>";
                            }
                          }
                        
                         ?>

                    </select>
      <label for="floatingPassword">Customer</label>
    </div>
    <div class="form-floating mb-3"> 
        <label for="floatingInput">Description</label>
        <textarea name="description" class="form-control" placeholder="Enter your queries" rows="15" colunm="10"></textarea>
    </div>
    <div class="mb-3">
        <label for="floatingInput">Image</label>
        <input type="file" id="photo" name="image" accept="image/*">
    </div>

   
    <button class="btn btn-primary w-100 py-2" type="submit" name="Submit">Submit</button>

    
  </form>
</main>
</body>
</html>