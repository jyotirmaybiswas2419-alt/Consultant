<footer class="bg-[#0d1f08] text-white py-10 mt-auto">
    <div class="container">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="logo">
                <a href="<?php echo $base; ?>/index.php">
                    <img src="<?php echo $base; ?>/src/assets/img/logo.png" alt="Jones & Brown Legal logo">
                </a>
            </div>
            <nav>
                <ul class="inline-flex gap-6 text-sm font-medium">
                    <li><a href="<?php echo $base; ?>/services.php" class="hover:underline hover:underline-offset-4 transition-all">Services</a></li>
                    <li><a href="<?php echo $base; ?>/Consult.php" class="hover:underline hover:underline-offset-4 transition-all">Schedule a Consult</a></li>
                </ul>
            </nav>
            <p class="text-sm text-white/60">&copy; <?php echo date('Y'); ?> Jones &amp; Brown Legal. All rights reserved.</p>
        </div>
    </div>
</footer>