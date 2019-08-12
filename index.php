<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '213.171.200.90');
define('DB_USERNAME', 'TomJaycocks');
define('DB_PASSWORD', 'Jaycocks!1');
define('DB_NAME', 'takingastancedb');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
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
<!-- TinyMC Script -->
<script src="https://cdn.tiny.cloud/1/ojwzd5kllsc7l4rm1f4bnx101t6wa7aedms9gpbt0w3xz66c/tinymce/5/tinymce.min.js"></script>
<!-- Pinterest Scripts -->
<meta name="p:domain_verify" content="9094070b3d03892b34fed3966dffe629" />
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Taking a Stance was founded in 2019 and is based on the real world problems going on that no one wants to talk about.">
<meta name="keyword" content="taking a stance, podcast, real world, world problems, daily issues, problems, youtube, taking a stance, taking a stance podcast, daily life, music, tom jaycocks, bradley page, ">
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

  <!-- Navigation -->
  <div class="hero-img">
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-6 animated fadeInDown">
          <h1 class="web"><a href="/">Taking a Stance</a></h1>
        </div>
        <div class="col-sm-3 col-6 animated fadeInDown">
          <nav class="navbar">
            <button class="navbar-toggler toggler-example ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
              class="fa fa-bars fa-1x" style="color:#fff;"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
              <ul class="navbar-nav ml-auto">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/blogs">Blogs</a></li>
                <li><a href="/podcast">Podcasts</a></li>
                <li><a href="/contact">Contact</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <!-- Header Section -->
      <div class="header">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="animated fadeInUp">Episode 01: How to create a website</h2>
            <p class="animated fadeInLeft">By Tom Jaycocks | 16 April 2019 | 1:30:20</p>
            <p class="animated fadeInRight"><a href="/podcasts/podcast1" class="btn btn-red btn-sm py-3 px-4 small">Read The Transcript</a></p>
          </div>
        </div>
        <div class="row player-tab">
          <div class="col-lg-12">
            <center>
              <div class="player animated fadeInUp">
                <audio id="player2" preload="none" controls style="max-width:100%">
                  <source src="http://www.largesound.com/ashborytour/sound/AshboryBYU.mp3" type="audio/mp3">
                  </audio>
                </div>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Podcasts Section -->
    <div class="content" id="podcast-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3>Recent Podcasts</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <?php

            $sql2 = "SELECT * FROM podcasts;";

            $result = $link->query($sql2);
            $results = mysqli_num_rows($result);

            for($i = 0; $i < 3; $i++)
            {
              $row = mysqli_fetch_array($result);
              ?>
              <div class="podcast-block reveal">
                <a href="/podcasts/<?php echo $row['page_url']; ?>">
                  <div class="row">
                    <div class="col-lg-4 col-3" style="background-image:url('../assets/img/<?php echo $row['page_image']; ?>'); background-position:center; background-size:cover">
                    </div>
                    <div class="col-lg-8 col-9">
                      <div class="block-content">
                        <h2><?php echo $row['page_title']; ?></h2>
                        <p class="small-grey">By <?php echo $row['page_author']; ?> / <?php echo $row['page_date']; ?> / <?php echo $row['podcast_length']; ?></p>
                        <p><?php echo $row['page_description']; ?> ...</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            <?php } ?>


            </div>
          </div>
        </div>
      </div>

      <!-- Subscribe CTA Section -->
      <div class="subscribe-cta">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h3>Subscribe</h3>
              <p>Don't want to miss out on our content? Join our mailing list for weekly updates and more.</p>
              <form action="addcontact" method="post">
                <input type="text" name="firstname" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="submit" value="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer Section -->
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/blogs">Blogs</a></li>
                <li><a href="/podcast">Podcasts</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/termsandconditions">Terms & Conditions</a></li>
                <li><a href="/privacypolicy">Privacy Policy</a></li>
                <li><a href="/cookiespolicy">Cookies Policy</a></li>
              </ul>
            </div>
            <div class="col-lg-12">
              <div class="bottombar">
                <center>
                  <p>Copyright © 2019 Taking a Stance - All Rights Reserved.</p>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>

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
