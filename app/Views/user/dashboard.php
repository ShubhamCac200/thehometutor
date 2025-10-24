<?= $this->include('layouts/header') ?>


<h2 class="section-title">Your Dashboard</h2>
<div class="card">
<strong style="color:#fff">Welcome back, <?= esc($user['full_name']) ?>!</strong>
<p style="color:var(--muted)">Here are some quick actions (demo):</p>
<div style="display:flex;gap:10px;flex-wrap:wrap">
<button class="btn">Find Tutors</button>
<button class="btn ghost">My Bookings</button>
<button class="btn ghost">Messages</button>
</div>
</div>


<h3 class="section-title">Recommended Tutors</h3>
<div class="card-grid">
<div class="card">
<div class="tutor-head">
<div class="tutor-avatar">AS</div>
<div>
<div class="tutor-name">Anjali Singh</div>
<div class="tutor-sub">English | Online</div>
</div>
</div>
<div class="card-foot">
<div class="price">₹300/hr</div>
<button class="book-btn">Book Trial</button>
</div>
</div>


<div class="card">
<div class="tutor-head">
<div class="tutor-avatar">MK</div>
<div>
<div class="tutor-name">Maya Kapoor</div>
<div class="tutor-sub">Chemistry | NEET</div>
</div>
</div>
<div class="card-foot">
<div class="price">₹550/hr</div>
<button class="book-btn">Book Trial</button>
</div>
</div>
</div>


<?= $this->include('layouts/footer') ?>