<?php
include "process/config.php";

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contact Form Bootstrap</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

</head>
<body class="bg-dark">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary">Welcome</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="process/chk_login.php" method="post" id="form-box" class="p-2">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
          </div><br><br>
        
          <div class="form-group">
            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Log in">
          </div>
          
        </form>
      </div>
    </div>
  </div>
</body>

</html>