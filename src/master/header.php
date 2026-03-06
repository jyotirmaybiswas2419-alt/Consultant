<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<section class="header p-5 bg-[#0d1f08]">
    <div class="container">
        <div class="row flex justify-between items-center">
            <div class="logo">
                <a href="<?php echo $base; ?>/index.php">
                    <img src="/src/assets/img/logo.png" alt="Jones & Brown Legal logo">
                </a>
            </div>
            <div class="menu">
                <ul class="text-white inline-flex gap-5 lg:gap-10 text-sm font-medium">
                    <li>
                        <a href="<?php echo $base; ?>/services.php"
                            class="<?= $currentPage === 'services.php' ? 'underline underline-offset-4' : 'hover:underline hover:underline-offset-4 transition-all ease-in-out' ?>">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $base; ?>/Consult.php"
                            class="<?= $currentPage === 'Consult.php' ? 'underline underline-offset-4' : 'hover:underline hover:underline-offset-4 transition-all' ?>">
                            Schedule a Consult
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>