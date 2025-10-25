<?= $this->include('layouts/header') ?>

<main class="auth-page">
    <h2 class="section-title">Verify OTP</h2>

    <div class="auth-card">
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form method="post" action="/verify-otp">
            <label>Enter OTP (6 digits)</label>
            <input class="input" type="text" name="otp" maxlength="6" required>

            <button class="btn">Verify OTP</button>
        </form>
    </div>
</main>

<?= $this->include('layouts/footer') ?>
