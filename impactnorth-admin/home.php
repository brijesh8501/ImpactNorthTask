<?php include 'template-parts/header.php'; ?>
<div class="container home-body">
  <?php
  if(isset($_REQUEST['error'])){

    $error = $_REQUEST['error'];

    if($error === "logout"){

      echo '<div class="alert alert-danger">Logout error, try again!</div>';

    }

  } 
  if(!isset($_REQUEST['error'])){

    echo '<div class="alert alert-success">'.$_SESSION['name'].', welcome to Admin Panel!</div>';

  }
?>
</div>
<?php include 'template-parts/footer.php'; ?>