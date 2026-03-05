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
      <div class="row lg:h-[1000px] md:h-[600px] h-[350px] flex items-end">
        <div class="banner-content h-[220px] flex flex-col justify-between w-full text-white text-left">
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
              expertise, decisive courtroom presence
            </p>
            <p class="lg:text-[18px] md:text-[16px] text-[14px]/[20px] md:w-1/2 reveal-text lg:w-1/2">We've been serving
              the Los Angeles area with expert legal counsel since 1976.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="Welcome-section md:py-35 py-15">
    <div class="container">
      <div class="row md:pb-30 pb-15">
        <div class="ws-content">
          <h2 class="text-left md:text-[40px] text-[24px] font-medium md:mb-15 mb-5 ">Welcome to Jones &
            Brown Legal</h2>
          <div class="content-details flex flex-col md:flex-row lg:gap-50 md:gap-15 gap-3">
            <div class="welcome-left-content w-full md:w-1/2">
              <p class="md:text-[18px] text-[16px] lg:font-medium reveal-text">Jones & Brown Legal has been a pillar of
                the Los Angeles legal community, providing expert legal counsel across a wide spectrum of practice
                areas. We than just attorneys, we are trusted advisors, dedicated advocates, and strategic to achieving
                the best possible outcomes for our clients.</p>
            </div>
            <div class="welcome-right-content w-full md:w-1/2">
              <p class="md:text-[18px] text-[16px] lg:font-medium reveal-text">We combine decades of experience with a
                deep understanding of the complexities of California law. Our team of attorneys boasts a proven track
                record of success in courtrooms throughout Los Angeles and beyond. ourselves on our comprehensive
                expertise, covering nearly every field of law, whatever your legal challenge, we have the knowledge and
                experience to guide you.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <a href="Consult.php" class="schedule-btn" name="schedule">Schedule a Consult</a>
      </div>
    </div>
  </section>
  <section class="Image-breaker-section mt-25">
  </section>

  <section class="Offering-section bg-[#0D1F08] text-white lg:p-20 md:p-10 p-5 ">
    <div class="container">
      <div class="row">
        <div class="os-content flex flex-col lg:flex-row lg:gap-50 md:gap-10 gap-3 items-baseline">
          <div class="os-left">
            <p class="text-left text-[32px] font-medium md:text-[28px]/[28px]">what We Offer </p>
          </div>
          <div class="os-right lg:text-[78px]/[78px] md:text-[56px]/[56px] text-[32px]/[32px]">
            <p class="reveal-text">Business formation</p>
            <p class="reveal-text">Contract drafting</p>
            <p class="reveal-text">Mergers and Acquisitions</p>
            <p class="reveal-text">Property Protection</p>
            <p class="reveal-text">Employment Law</p>
            <p class="reveal-text">Corporate Governance</p>
            <p class="reveal-text">Shareholder Disputes</p>
            <p class="reveal-text text-[#FFF0C4]">+More</p>
            <a href="services.php" class="view-btn" name="schedule"> Services</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="Our-clients-section">

  </section>
  <section class="Image-divider-section-2 ">
  </section>









  <?php include 'src/master/footer.php'; ?>
  <?php if (!$isProduction): ?>
    <script type="module" src="<?php echo $dev_server; ?>/src/main.js">
    </script>
  <?php else: ?>
    <script type="module" src="<?php echo $base; ?>/dist/assets/main.js"></script>
  <?php endif; ?>
</body>

</html>