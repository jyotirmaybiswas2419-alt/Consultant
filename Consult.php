<?php
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $matter = trim($_POST['matter'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name))
        $errors[] = 'Your name is required.';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = 'A valid email address is required.';
    if (empty($matter))
        $errors[] = 'Please describe your legal matter.';

    if (empty($errors)) {
        // TODO: send email / save to DB
        $success = true;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <?php include 'src/master/links.php'; ?>
    <link rel="stylesheet" href="<?php echo $base; ?>/dist/assets/style.css">
    <title>Schedule a Consult — Jones &amp; Brown Legal</title>
    <meta name="description"
        content="Request a consultation with Jones & Brown Legal. Our Los Angeles attorneys are ready to help you.">
</head>

<body class="min-h-screen flex flex-col bg-white">
    <?php include 'src/master/header.php'; ?>

    <main class="flex-1">
        <section class="py-20">
            <div class="container">
                <div class="max-w-2xl mx-auto">
                    <h1 class="text-[48px] font-light text-[#0d1f08] mb-4">Schedule a Consultation</h1>
                    <p class="text-[18px] text-gray-600 mb-10">Fill out the form below and one of our attorneys will be
                        in touch within one business day.</p>

                    <?php if ($success): ?>
                        <div class="bg-[#0d1f08] text-white p-6 rounded-sm mb-8">
                            <p class="font-semibold text-lg">Thank you, we'll be in touch soon.</p>
                            <p class="text-white/75 text-sm mt-1">A member of our team will contact you within one business
                                day.</p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($errors)): ?>
                        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-sm mb-8">
                            <ul class="list-disc list-inside text-sm space-y-1">
                                <?php foreach ($errors as $e): ?>
                                    <li>
                                        <?= htmlspecialchars($e) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" class="space-y-6">
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name"
                                    value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                                    class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-[#0d1f08] transition-colors"
                                    required>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone
                                    Number</label>
                                <input type="tel" id="phone" name="phone"
                                    value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
                                    class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-[#0d1f08] transition-colors">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address <span
                                    class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email"
                                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                                class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-[#0d1f08] transition-colors"
                                required>
                        </div>

                        <div>
                            <label for="matter" class="block text-sm font-medium text-gray-700 mb-1">Nature of Legal
                                Matter <span class="text-red-500">*</span></label>
                            <select id="matter" name="matter"
                                class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-[#0d1f08] transition-colors bg-white"
                                required>
                                <option value="" <?= empty($_POST['matter']) ? 'selected' : '' ?>>Select a practice area
                                </option>
                                <?php foreach (['Civil Litigation', 'Corporate Law', 'Estate Planning', 'Real Estate Law', 'Employment Law', 'Family Law', 'Other'] as $opt): ?>
                                    <option value="<?= $opt ?>" <?= ($_POST['matter'] ?? '') === $opt ? 'selected' : '' ?>>
                                        <?= $opt ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Briefly describe
                                your situation</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full border border-gray-300 px-4 py-3 text-sm focus:outline-none focus:border-[#0d1f08] transition-colors resize-none"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-[#0d1f08] text-white py-4 text-sm font-semibold tracking-wide hover:bg-[#1a3a10] transition-colors">
                            Request Consultation
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php include 'src/master/footer.php'; ?>

    <script type="module" src="<?php echo $base; ?>/dist/assets/main.js"></script>
</body>

</html>