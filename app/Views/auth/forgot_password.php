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

        <form id="otpForm" method="post" action="/forgot-password">
            <label>Email Address</label>
            <input class="input" type="email" name="email" required placeholder="Enter your email">

            <button id="sendOtpBtn" class="btn" type="submit">
                <span id="btnText">Send OTP</span>
                <div id="loader" class="spinner" style="display:none;"></div>
            </button>
        </form>
    </div>
</main>

<style>
.spinner {
    border: 3px solid #f3f3f3;
    border-top: 3px solid var(--primary);
    border-radius: 50%;
    width: 18px;
    height: 18px;
    animation: spin 0.8s linear infinite;
    display: inline-block;
    margin-left: 10px;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<script>
const form = document.getElementById('otpForm');
const btn = document.getElementById('sendOtpBtn');
const text = document.getElementById('btnText');
const loader = document.getElementById('loader');

form.addEventListener('submit', () => {
    btn.disabled = true;
    text.textContent = 'Sending...';
    loader.style.display = 'inline-block';
});
</script>

<?= $this->include('layouts/footer') ?>
