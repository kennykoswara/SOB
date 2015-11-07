<!DOCTYPE html>
<html>
<head>
  <title>HansKD - Sign In or Register</title>
  <link href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url();?>asset/login/css/my_styles.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div class="container-fluid">
    <form class="form-inline col-xs-offset-7" style="margin-top: 1.5em">
      <div class="row">
        <div class="form-group">
            <input type="text" class="form-control input-md" id="inputUsername" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control input-md" id="inputPassword" placeholder="Password">
        </div>
        <button type="submit " class="btn btn-default"><b>Sign In</b></button>
      </div>
    </form>
  </div>


  <div class="container-fluid" style="margin-top: 7em">
    <div class="col-md-offset-2 col-md-4">
      <div class="row">
        <h1>Help Other People.</h1>
      </div>
      <div class="row">
        <h3>HHAHFAHFHFAHFHAHGFAH</h3>
      </div>
    </div>
    <div class="col-md-offset-1 col-md-4">
      <div class="row">
        <h4><b>Want to help others?</b> Join us today!</h4>
      </div>
      <form class="form">
        <div class="row">
          <div class="form-group">
            <input type="text" class="form-control input-lg" id="fullName" placeholder="Full Name">
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <input type="email" class="form-control input-lg" id="eMail" placeholder="Email">
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <input type="password" class="form-control input-lg" id="passWord" placeholder="Password">
          </div>
        </div>
      </form>
      <button type="submit" class="btn btn-default btn-lg btn-info" style="margin-left:79%"><b>Sign Up</b></button>
    </div>

  </div>
  <hr/>

  <script src="<?php echo base_url();?>asset/js/jquery-2.1.4.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>asset/login/js/my_js.js" type="text/javascript"></script>
</body>
</html>
