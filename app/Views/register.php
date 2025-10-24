<?= $this->include('layouts/header') ?>

<main class="auth-page">
    <div class="auth-card">
        <h2 class="section-title">Create Account</h2>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <!-- Validation Errors -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-error"><?= $validation->listErrors() ?></div>
        <?php endif; ?>

        <!-- Registration Form -->
        <form action="/register/save" method="post">
            <label>Full Name</label>
            <input class="input" type="text" name="full_name" placeholder="Full Name" value="<?= set_value('full_name') ?>" required>

            <label>Email</label>
            <input class="input" type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required>

            <label>Password</label>
            <input class="input" type="password" name="password" placeholder="Password" required>

            <label>Confirm Password</label>
            <input class="input" type="password" name="cpassword" placeholder="Confirm Password" required>

            <button type="submit" class="btn">Register</button>
        </form>

        <p class="switch">Already have an account? <a href="/login">Login here</a></p>
    </div>
</main>

<?= $this->include('layouts/footer') ?>
