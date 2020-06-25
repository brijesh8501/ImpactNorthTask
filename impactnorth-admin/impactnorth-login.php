<?php session_start();
include '../form_csrf/csrf.php';
include 'login-request.php';
if(isset($_SESSION['name']) && isset($_SESSION['email'])){

  header("location: home.php");
  
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Impact North | Brijesh Ahir's Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link rel="icon" type="image/png" href="../assets/Charisma-on-the-Park.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container d-flex flex-column justify-content-center" id="login">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <?php if(isset($error_msg)){ echo "<div class='text-danger text-center pb-1'>".$error_msg."</div>"; }?>
            <form class="form-signin" id="form-signin" method="post">
              <input type="hidden" name="csrf_token" id="csrfToken" value="<?php echo generateToken('signin'); ?>"/>
              <div class="form-label-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?php if(isset($_COOKIE['member_login'])){ echo $_COOKIE['member_login']; }?>" required autofocus>
                <label for="email">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                  <?php if(isset($_COOKIE["member_login"])) { echo "checked"; } ?>
                >
                <label class="custom-control-label" for="remember">Remember me</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="sign-in" id="sign-in">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>