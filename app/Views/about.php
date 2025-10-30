<?= $this->include('layouts/header') ?>

<style>
    :root {
        --primary: #d32f2f; /* Bright Red */
        --light: #ffffff;
        --muted: #555;
        --bg-light: #f5f5f5;
    }

    .about-page {
        background: var(--bg-light);
        padding: 60px 20px;
        color: var(--muted);
        text-align: center;
    }

    .section-title {
        font-size: 2.3rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 20px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .about-box {
        background: var(--light);
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        max-width: 850px;
        margin: 0 auto;
        padding: 45px 35px;
        text-align: left;
        transition: all 0.3s ease;
    }

    .about-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(211, 47, 47, 0.15);
    }

    .about-box p {
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 18px;
    }

    .about-box h3 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--primary);
        margin-top: 25px;
        margin-bottom: 12px;
        position: relative;
    }

    .about-box h3::after {
        content: '';
        display: block;
        width: 50px;
        height: 3px;
        background: var(--primary);
        margin-top: 6px;
        border-radius: 2px;
    }

    .about-box ul {
        padding-left: 20px;
        margin-bottom: 25px;
    }

    .about-box li {
        margin: 8px 0;
        line-height: 1.6;
    }

    .highlight-box {
        background: var(--bg-light);
        border-left: 4px solid var(--primary);
        padding: 12px 16px;
        border-radius: 8px;
        font-weight: 600;
        color: var(--muted);
        margin-bottom: 18px;
    }

    .cta-box {
        text-align: center;
        background: var(--primary);
        color: #fff;
        font-weight: 600;
        padding: 16px;
        border-radius: 10px;
        margin-top: 30px;
        transition: all 0.3s ease;
    }

    .cta-box:hover {
        background: #b71c1c;
    }

    @media (max-width: 768px) {
        .section-title {
            font-size: 1.8rem;
        }
        .about-box {
            padding: 28px 20px;
        }
        .about-box h3 {
            font-size: 1.2rem;
        }
    }
</style>

<section class="about-page">
    <h2 class="section-title">🎓 The Home Tutor</h2>
    <div class="about-box">

        <p>
            Welcome to <strong>THE HOME TUTOR</strong> — one of Uttar Pradesh’s fastest-growing home tuition platforms.
            We proudly connect passionate tutors with students in <strong>Lucknow, Prayagraj, Varanasi, Kanpur,
            Azamgarh, Ayodhya, Jaunpur, Gorakhpur, Mau</strong>, and many more cities.
        </p>

        <div class="highlight-box">
            🚀 Whether you're a professional teacher, a college graduate, or a skilled part-time educator — we have students waiting for you!
        </div>

        <h3>📢 We’re Hiring Home Tutors</h3>
        <ul>
            <li>👨‍🏫 Male & Female Tutors Needed</li>
            <li>📘 All Subjects | All Classes | All Boards</li>
            <li>🕒 Flexible Hours – Full-Time / Part-Time</li>
            <li>🏡 Teach at Students’ Homes Near You</li>
        </ul>

        <h3>💼 Why Choose The Home Tutor?</h3>
        <ul>
            <li>📅 Daily Tuition Job Updates</li>
            <li>💸 No Registration Fee – Start Earning First</li>
            <li>🤝 Pay Only 50% of Your First Month’s Tuition Fee</li>
            <li>✅ 100% Transparent & Trusted Process</li>
        </ul>

        <div class="highlight-box">
            📞 <strong>Contact:</strong> +91-7880331250
        </div>

        <p><strong>📍 Coming Soon:</strong> Expanding to All Major Cities of Uttar Pradesh</p>

        <div class="cta-box">
            🔁 Share this with your tutor friends — your next teaching opportunity might be one click away!
        </div>

    </div>
</section>

<?= $this->include('layouts/footer') ?>
