<?php
// Initialize the session
session_start();

$idletime=60;//after 60 seconds the user gets logged out
if (time()-$_SESSION['timestamp']>$idletime){
    session_destroy();
    session_unset();
}else{
    $_SESSION['timestamp']=time();
}
//on session creation
$_SESSION['timestamp']=time();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $idletime)) {
    // request 30 minates ago
    session_destroy();
    session_unset();
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: admin/welcome");
  exit;
}

// Include config file
require_once "admin/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Check if username is empty
  if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
  } else{
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
  } else{
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if(empty($username_err) && empty($password_err)){
    // Prepare a select statement
    $sql = "SELECT id, username, password FROM accounts WHERE username = ?";

    if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) == 1){
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if(mysqli_stmt_fetch($stmt)){
            if(password_verify($password, $hashed_password)){
              // Password is correct, so start a new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              // Redirect user to welcome page
              header("location: admin/welcome");
            } else{
              // Display an error message if password is not valid
              $password_err = "The password you entered was not valid.";
            }
          }
        } else{
          // Display an error message if username doesn't exist
          $username_err = "No account found with that username.";
        }
      } else{
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Close connection
  mysqli_close($link);
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
  <!-- Pinterest Scripts -->
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
  <link rel="stylesheet" href="/assets/css/animate.css">
  <!-- Media Player CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
  <!-- Scroll Reveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- Stylesheets css -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/style2.css">
  <title>Taking a Stance | Podcast</title>
</head>

<body>

  <!-- Login Form Section Start -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Login</h2>
          <p>Please fill in your credentials to login.</p>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              <label>Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
              <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
              <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Login">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Form Section End -->

  <!-- jQuery first, then Tether, then Bootstrap JS -->
  <script src="/assets/js/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script src="/assets/js/main.js"></script>
  <script src="/assets/js/mediaelement-and-player.min.js"></script>
</body>

</html>
