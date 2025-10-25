<?= $this->include('layouts/header') ?>

<main class="auth-page">
    <h2 class="section-title">Reset Password</h2>

    <div class="auth-card">
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <form method="post" action="/reset-password">
            <label>New Password</label>
            <input class="input" type="password" name="password" required>

            <label>Confirm Password</label>
            <input class="input" type="password" name="confirm_password" required>

            <button class="btn">Reset Password</button>
        </form>
    </div>
</main>

<?= $this->include('layouts/footer') ?>
