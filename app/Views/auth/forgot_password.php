<?= $this->include('layouts/header') ?>

<main class="auth-page">
    <h2 class="section-title">Forgot Password</h2>

    <div class="auth-card">
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form method="post" action="/forgot-password">
            <label>Email Address</label>
            <input class="input" type="email" name="email" required placeholder="Enter your email">

            <button class="btn">Send OTP</button>
        </form>
    </div>
</main>

<?= $this->include('layouts/footer') ?>
