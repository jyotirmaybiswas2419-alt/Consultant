<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
// If accessing via localhost, Vite still needs the actual IP for HMR to work on other devices, 
// but for the script tags, we can just use the current hostname (IP).
$dev_server = "$protocol://" . explode(':', $host)[0] . ":5173";
?>
<!doctype html>
<html lang="en">

<head>
  <?php include 'src/master/links.php'; ?>
</head>

<body>
  <?php include 'src/master/header.php'; ?>

  <section class="banner">
    <div class="container">
      <div class="row h-[800px] flex items-end">
        <div class="banner-content w-full text-white text-left">
          <h1 class="ml5 banner-title lg:text-[140px]/[200px] text-[70px]/[60px]">
            <span class="text-wrapper">
              <span class="line line1"></span>
              <span class="letters letters-left">Jones</span>
              <span class="letters ampersand">&amp;</span>
              <span class="letters letters-right">Brown Legal</span>
              <span class="line line2"></span>
            </span>
          </h1>
          <div class="xl:flex justify-between lg:mt-5 items-baseline">
            <p class="text-[36px] reveal-text">Deep expertise, decisive courtroom presence</p>
            <p class="text-[18px] reveal-text">We've been serving the Los Angeles area with <br>expert legal counsel
              since 1976.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  <script type="module" src="<?php echo $dev_server; ?>/src/main.js"></script>
</body>

</html>