<?= $this->include('layouts/header') ?>

<main class="auth-page">
    <h2 class="section-title">Login to The Home Tutor</h2>

    <div class="auth-card">
        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>

        <form method="post" action="/login">
            <label>Email</label>
            <input class="input" type="email" name="email" required>

            <label>Password</label>
            <input class="input" type="password" name="password" required>

            <button class="btn">Login</button>
        </form>

        <p class="switch">
            Don't have an account? <a href="/register">Register here</a>
        </p>
    </div>
</main>

<?= $this->include('layouts/footer') ?>
