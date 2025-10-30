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
            <label>Enter OTP (4 digits)</label>
            <input class="input" type="text" name="otp" maxlength="4" required pattern="\d{4}" placeholder="----">

            <p id="timer" style="color:var(--muted); margin:10px 0;">Expires in: <b>05:00</b></p>

            <button class="btn">Verify OTP</button>
        </form>
    </div>
</main>

<script>
let time = 300; // 5 minutes
const timerEl = document.getElementById('timer');
const countdown = setInterval(() => {
    let minutes = Math.floor(time / 60);
    let seconds = time % 60;
    timerEl.innerHTML = `Expires in: <b>${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}</b>`;
    time--;

    if (time < 0) {
        clearInterval(countdown);
        timerEl.innerHTML = "<span style='color:red;'>OTP expired. Please request again.</span>";
    }
}, 1000);
</script>

<?= $this->include('layouts/footer') ?>
