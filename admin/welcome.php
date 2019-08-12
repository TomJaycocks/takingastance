<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: ../tj-admin");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139750462-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-139750462-1');
  </script>
  <meta name="p:domain_verify" content="9094070b3d03892b34fed3966dffe629" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Taking a Stance was founded in 2019 and is based on the real world problems going on that no one wants to talk about.">
  <meta name="keyword" content="podcast, real world, world problems, daily issues, problems, youtube, taking a stance, taking a stance podcast, daily life, music">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- Google Fonts CSS -->
  <link href="https://fonts.googleapis.com/css?family=Mukta:200,300,400,700" rel="stylesheet">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="../assets/css/animate.css">
  <!-- Media Player CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
  <!-- Scroll Reveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- Stylesheets css -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/style2.css">
  <title>Taking a Stance | Podcast</title>
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src='https://cdn.tiny.cloud/1/ojwzd5kllsc7l4rm1f4bnx101t6wa7aedms9gpbt0w3xz66c/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
</head>

<body>
  <!-- Welcome Page Section Start -->
  <div class="backend" style="padding:50px;">

    <div class="menu">
      <center>
        <ul>
          <li><a href="welcome">Content Manager</a></li>
          <li><a href="upload">Upload Content</a></li>
          <li><a href="content-manager">Create Post</a></li>
          <li><a href="blog-creator">Create Blog</a></li>
        </ul>
      </center>
    </div>

    <div class="form" style="padding-top:30px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the dashboard.</h1>
            </div>
            <p>
              <a href="logout" class="btn btn-danger">Sign Out of Your Account</a>
              <a href="upload" class="btn btn-primary">Upload Content</a>
              <a href="content-manager" class="btn btn-success">Create Post</a>
              <a href="blog-creator" class="btn btn-warning">Create Blog</a>
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Welcome Page Section End -->


  <!-- jQuery first, then Tether, then Bootstrap JS -->

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/mediaelement-and-player.min.js"></script>
</body>

</html>
