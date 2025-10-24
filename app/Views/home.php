<?= $this->include('layouts/header') ?>

<main class="main-content">
    <section class="hero">
        <h1>Find Expert Tutors Near You</h1>
        <p>Connect with qualified home tutors for school, college, or competitive exams. Learn smarter with The Home Tutor!</p>
        <a href="/register" class="btn">Get Started</a>
    </section>

    <section class="tutors">
        <h2 class="section-title">Featured Tutors</h2>

        <div class="card-grid">

            <!-- Tutor 1 -->
            <div class="card">
                <div class="tutor-head">
                    <div class="tutor-avatar">RS</div>
                    <div>
                        <div class="tutor-name">Rohit Sharma</div>
                        <div class="tutor-sub">M.Sc, Physics | 6 years</div>
                    </div>
                </div>

                <div class="tags">
                    <div class="tag">Class 9-12</div>
                    <div class="tag">JEE Coaching</div>
                    <div class="tag">Online & Home</div>
                </div>

                <div class="card-foot">
                    <div class="price">₹400/hr</div>
                    <button class="book-btn">Book Trial</button>
                </div>
            </div>

            <!-- Tutor 2 -->
            <div class="card">
                <div class="tutor-head">
                    <div class="tutor-avatar">AS</div>
                    <div>
                        <div class="tutor-name">Anjali Singh</div>
                        <div class="tutor-sub">B.Ed, English | 4 years</div>
                    </div>
                </div>

                <div class="tags">
                    <div class="tag">Class 6-10</div>
                    <div class="tag">Spoken English</div>
                    <div class="tag">Online</div>
                </div>

                <div class="card-foot">
                    <div class="price">₹300/hr</div>
                    <button class="book-btn">Book Trial</button>
                </div>
            </div>

            <!-- Tutor 3 -->
            <div class="card">
                <div class="tutor-head">
                    <div class="tutor-avatar">MK</div>
                    <div>
                        <div class="tutor-name">Maya Kapoor</div>
                        <div class="tutor-sub">PhD, Chemistry | 8 years</div>
                    </div>
                </div>

                <div class="tags">
                    <div class="tag">Class 11-12</div>
                    <div class="tag">NEET</div>
                    <div class="tag">Home & Online</div>
                </div>

                <div class="card-foot">
                    <div class="price">₹550/hr</div>
                    <button class="book-btn">Book Trial</button>
                </div>
            </div>

        </div>
    </section>

    <section class="testimonials">
        <h2 class="section-title">What Students Say</h2>

        <div class="card-grid">
            <div class="testimonial card">
                <strong>"Got 92% in Maths — thanks Rohit sir!"</strong>
                <div style="margin-top:8px;color:var(--muted)">— Priya, Class 12</div>
            </div>
            <div class="testimonial card">
                <strong>"Anjali improved my English speaking quickly."</strong>
                <div style="margin-top:8px;color:var(--muted)">— Aman, College</div>
            </div>
            <div class="testimonial card">
                <strong>"Great NEET tips from Maya ma'am."</strong>
                <div style="margin-top:8px;color:var(--muted)">— Suman, NEET aspirant</div>
            </div>
        </div>
    </section>
</main>

<?= $this->include('layouts/footer') ?>
