<?php
$isProduction = !file_exists(__DIR__ . '/node_modules/.vite') && !isset($_SERVER['HTTP_X_VITE_DEV']);
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$dev_server = "$protocol://" . explode(':', $host)[0] . ":5173";
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
    <title>Our Services — Jones &amp; Brown Legal</title>
    <meta name="description"
        content="Explore legal services offered by Jones & Brown Legal — trusted Los Angeles attorneys since 1976.">
</head>

<body class="min-h-screen flex flex-col bg-white">
    <?php include 'src/master/header.php'; ?>

    <main class="flex-1">
        <section class="py-20">
            <div class="container">
                <h1 class="text-[48px] font-light text-[#0d1f08] mb-6">Our Services</h1>
                <p class="text-[18px] text-gray-600 mb-12 max-w-2xl">We provide comprehensive legal representation
                    across a wide range of practice areas. Our experienced attorneys are dedicated to protecting your
                    rights and achieving the best possible outcome.</p>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    $services = [
                        ['title' => 'Civil Litigation', 'desc' => 'Skilled courtroom advocates representing clients in complex civil disputes with precision and tenacity.'],
                        ['title' => 'Corporate Law', 'desc' => 'Strategic counsel for businesses of all sizes — from formation and contracts to mergers and acquisitions.'],
                        ['title' => 'Estate Planning', 'desc' => 'Thoughtful planning to protect your assets and legacy through wills, trusts, and probate services.'],
                        ['title' => 'Real Estate Law', 'desc' => 'Expert guidance through property transactions, disputes, and regulatory compliance in the LA market.'],
                        ['title' => 'Employment Law', 'desc' => 'Protecting employers and employees alike in workplace disputes, contracts, and compliance matters.'],
                        ['title' => 'Family Law', 'desc' => 'Compassionate representation in divorce, custody, and family matters during life\'s most challenging times.'],
                    ];
                    foreach ($services as $s): ?>
                        <div class="p-8 border border-gray-200 rounded-sm hover:border-[#0d1f08] transition-all group">
                            <h2
                                class="text-[22px] font-semibold text-[#0d1f08] mb-3 group-hover:underline group-hover:underline-offset-4 transition-all">
                                <?= htmlspecialchars($s['title']) ?>
                            </h2>
                            <p class="text-gray-600 text-[15px] leading-relaxed">
                                <?= htmlspecialchars($s['desc']) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include 'src/master/footer.php'; ?>

    <?php if (!$isProduction): ?>
        <script type="module" src="<?php echo $dev_server; ?>/src/main.js"></script>
    <?php else: ?>
        <script type="module" src="<?php echo $base; ?>/dist/assets/main.js"></script>
    <?php endif; ?>
</body>

</html>