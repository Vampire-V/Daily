<html >
  <head>
    <meta charset="UTF-8">
    <title>Daily Check Sheet</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/shortcut.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    body {
        background: url() no-repeat center center fixed;
        background-size: cover;
    }
 </style><!--bg img-->
    </head>
<body >
<div class="container">
<img src="img/LogoHaier.jpg">

  <form class="form-horizontal" action="check.php" method="post">
  <h1>Daily Check Sheet</h1>
    <div class="form-group">
      <label class="control-label col-sm-2" for="user">Username:</label>
      <div class="col-sm-3">
        <input type="text" name="user" class="form-control" id="user" placeholder="Enter Username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-3">
        <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter Password">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-3">
        <button type="submit" class="btn btn-success">Login</button>
      </div>
      <h3><marquee direction="right"><font color='red'>ระบบนี้รองรับการแสดงผลกับ Browser Chrome</font></marquee></h3>
    </div>
  </form>
</body>
</html>
