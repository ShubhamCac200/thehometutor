<?= $this->include('layouts/header') ?>

<main class="auth-page">
    <div class="auth-card">
        <h2 class="section-title">Create Account</h2>

        <form action="/register/save" method="post">
            <label>Full Name</label>
            <input class="input" type="text" name="full_name" placeholder="Full Name"
                value="<?= set_value('full_name') ?>" required>
            <?php if (isset($validation) && $validation->hasError('full_name')): ?>
                <small class="error"><?= $validation->getError('full_name') ?></small>
            <?php endif; ?>

            <label>Email</label>
            <input class="input" type="email" name="email" placeholder="Email"
                value="<?= set_value('email') ?>" required>
            <?php if (isset($validation) && $validation->hasError('email')): ?>
                <small class="error"><?= $validation->getError('email') ?></small>
            <?php endif; ?>

            <label>Mobile</label>
            <input class="input" type="text" name="mobile" placeholder="Mobile Number"
                value="<?= set_value('mobile') ?>" required>
            <?php if (isset($validation) && $validation->hasError('mobile')): ?>
                <small class="error"><?= $validation->getError('mobile') ?></small>
            <?php endif; ?>

            <label>Password</label>
            <div class="password-wrapper">
                <input class="input" type="password" id="password" name="password" placeholder="Password" required>
                <i class="fas fa-eye toggle-password" data-target="#password"></i>
            </div>
            <?php if (isset($validation) && $validation->hasError('password')): ?>
                <small class="error"><?= $validation->getError('password') ?></small>
            <?php endif; ?>

            <label>Confirm Password</label>
            <div class="password-wrapper">
                <input class="input" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                <i class="fas fa-eye toggle-password" data-target="#cpassword"></i>
            </div>
            <?php if (isset($validation) && $validation->hasError('cpassword')): ?>
                <small class="error"><?= $validation->getError('cpassword') ?></small>
            <?php endif; ?>

            <button type="submit" class="btn">Register</button>
        </form>

        <p class="switch">Already have an account? <a href="/login">Login here</a></p>
    </div>
</main>

<style>
.error {
    display: block;
    margin-top: 6px;
    padding: 6px 10px;
    background: #ffecec;
    border-left: 4px solid #ff4d4d;
    color: #b30000;
    border-radius: 6px;
    font-size: 0.9em;
    line-height: 1.4;
    font-weight: 500;
    animation: fadeIn 0.3s ease-in-out;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-4px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Password toggle icon */
.password-wrapper {
    position: relative;
}
.password-wrapper .toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #777;
}
.password-wrapper .toggle-password:hover {
    color: #333;
}
</style>

<!-- jQuery Password Toggle -->
<script>
$(document).ready(function() {
    $('.toggle-password').on('click', function() {
        const target = $($(this).data('target'));
        const type = target.attr('type') === 'password' ? 'text' : 'password';
        target.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
    });
});
</script>

<?= $this->include('layouts/footer') ?>
