<?php
$isProduction = !file_exists(__DIR__ . '/node_modules/.vite') && !isset($_SERVER['HTTP_X_VITE_DEV']);
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$dev_server = "$protocol://" . explode(':', $host)[0] . ":5173";
// Derive the web root-relative base path (e.g. /consultant) so assets resolve correctly in subdirectory setups
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
?>
<!doctype html>
<html lang="en">

<head>
  <?php include 'src/master/links.php'; ?>
  <?php if (!$isProduction): ?>
    <link rel="stylesheet" href="<?php echo $dev_server; ?>/src/style.css">
  <?php else: ?>
    <link rel="stylesheet" href="<?php echo $base; ?>/dist/assets/style.css">
  <?php endif; ?>
</head>

<body>
  <?php include 'src/master/header.php'; ?>

  <section class="banner">
    <div class="container">
      <div class="row lg:h-[800px] md:h-[600px] h-[350px] flex items-end">
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
          <div class="xl:flex justify-between lg:mt-5 items-end">
            <p class="lg:text-[36px]/[40px] md:text-[32px]/[35px] text-[22px]/[20px] reveal-text  my-5 w-full">Deep
              expertise, decisive
              courtroom presence
            </p>
            <p class="lg:text-[18px] md:text-[16px] text-[14px]/[20px]  reveal-text lg:w-1/2">We've been serving the Los
              Angeles
              area with
              expert legal counsel since 1976.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'src/master/footer.php'; ?>

  <?php if (!$isProduction): ?>
    <script type="module" src="<?php echo $dev_server; ?>/src/main.js"></script>
  <?php else: ?>
    <script type="module" src="<?php echo $base; ?>/dist/assets/main.js"></script>
  <?php endif; ?>
</body>

</html>