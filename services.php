<?php
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
?>
<!doctype html>
<html lang="en">

<head>
    <?php include 'src/master/links.php'; ?>
    <link rel="stylesheet" href="<?php echo $base; ?>/dist/assets/style.css">
    <title>Our Services — Jones &amp; Brown Legal</title>
    <meta name="description"
        content="Explore legal services offered by Jones & Brown Legal — trusted Los Angeles attorneys since 1976.">
</head>

<body class="min-h-screen ">
    <?php include 'src/master/header.php'; ?>

    <main>
        <section class="service-banner">
            <div class="container h-full  md:p-15 px-5 py-5">
                <div class="banner-row text-white h-full flex justify-end gap-[50%] flex-col">
                    <h1
                        class="lg:text-[48px] md:text-[32px] text-[28px] mb-6 text-center uppercase font-bold reveal-text">
                        Our
                        Services</h1>
                    <p class="lg:text-[32px]/[38px] md:text-[28px]/[32px] text-[24px]/[26px] lg:w-[60%] reveal-text">At
                        Jones &
                        Brown Legal, we are committed to exceptional service and successful outcomes with:</p>
                </div>
            </div>
        </section>

        <section class="Stats-section pt-10">
            <div class="container md:p-15 px-5 py-5">
                <div class="row">
                    <div
                        class="experience-content flex flex-col lg:flex-row justify-between lg:gap-50 md:gap-15 gap-3 text-[#31110F]">
                        <div class="experience-stat">
                            <p class="experience-number count-up" data-target="30" data-suffix="+">0+</p>
                            <p class="experience-text reveal-text">Years of Experience</p>
                        </div>
                        <div class="success-stat">
                            <p class="experience-number count-up" data-target="98" data-suffix="%">0%</p>
                            <p class="experience-text reveal-text">Successful rate in court</p>
                        </div>
                        <div class="attorney-stat">
                            <p class="experience-number count-up" data-target="120" data-suffix="+">0+</p>
                            <p class="experience-text reveal-text">attorneys in hands</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-20">
            <div class="container  md:p-15 px-5 py-5">
                <h1 class="text-[48px] font-light text-[#0d1f08] mb-6">Our Services</h1>
                <p class="text-[18px] text-gray-600 mb-12 max-w-2xl">We provide comprehensive legal representation
                    across a wide range of practice areas. Our experienced attorneys are dedicated to protecting your
                    rights and achieving the best possible outcome.</p>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 ">
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
                        <div
                            class="p-8 border border-gray-200 rounded-sm hover:border-[#0d1f08] transition-all group reveal-text">
                            <h2
                                class="text-[22px] font-semibold text-[#0d1f08] mb-3 group-hover:underline group-hover:underline-offset-4 transition-all">
                                <?= htmlspecialchars($s['title']) ?>
                            </h2>
                            <p class="text-gray-600 text-[15px] leading-relaxed ">
                                <?= htmlspecialchars($s['desc']) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include 'src/master/footer.php'; ?>

    <script type="module" src="<?php echo $base; ?>/dist/assets/main.js"></script>
</body>

</html>