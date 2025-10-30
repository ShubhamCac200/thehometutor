<?= $this->include('layouts/header') ?>

<style>
    :root {
        --primary: #d32f2f;
        --light: #ffffff;
        --muted: #555;
        --bg-light: #f7f7f7;
    }

    /* Scope all styles to .contact-page to avoid conflicts */
    .contact-page {
        background: var(--bg-light);
        padding: 60px 20px;
        text-align: center;
        color: var(--muted);
    }

    .contact-page .section-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 40px;
        letter-spacing: 1px;
    }

    .contact-page .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        max-width: 1000px;
        margin: 0 auto;
        align-items: start;
    }

    .contact-page .contact-card {
        background: var(--light);
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        padding: 35px 25px;
        text-align: left;
        transition: all 0.3s ease;
    }

    .contact-page .contact-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(211, 47, 47, 0.15);
    }

    .contact-page .contact-card h3 {
        color: var(--primary);
        font-size: 1.4rem;
        margin-bottom: 10px;
        position: relative;
    }

    .contact-page .contact-card h3::after {
        content: '';
        display: block;
        width: 40px;
        height: 3px;
        background: var(--primary);
        margin-top: 5px;
        border-radius: 2px;
    }

    .contact-page .contact-card p {
        margin: 10px 0;
        line-height: 1.7;
        font-size: 1rem;
    }

    .contact-page form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 10px;
    }

    .contact-page .input {
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        width: 100%;
        transition: all 0.2s ease;
        outline: none;
    }

    .contact-page .input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(211, 47, 47, 0.15);
    }

    .contact-page .btn {
        background: var(--primary);
        color: var(--light);
        font-weight: 600;
        padding: 12px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        letter-spacing: 0.3px;
    }

    .contact-page .btn:hover {
        background: #b71c1c;
        transform: scale(1.03);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .contact-page .contact-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .contact-page .section-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 600px) {
        .contact-page {
            padding: 40px 15px;
        }

        .contact-page .section-title {
            font-size: 1.7rem;
        }

        .contact-page .contact-card {
            padding: 25px 20px;
            border-radius: 12px;
        }

        .contact-page .contact-card h3 {
            font-size: 1.2rem;
        }

        .contact-page .input {
            font-size: 0.95rem;
            padding: 10px 12px;
        }

        .contact-page .btn {
            font-size: 0.95rem;
            padding: 10px;
        }
    }
</style>

<main class="contact-page">
    <h2 class="section-title">📞 Contact Us</h2>

    <div class="contact-grid">

        <!-- Support Info -->
        <div class="contact-card">
            <h3>Support</h3>
            <p><strong>Email:</strong> thehometutorofficial@gmail.com<br>
               <strong>Phone:</strong> +91 7880331250</p>

            <h3 style="margin-top:25px;">Office</h3>
            <p>12/34 Education Lane, Lucknow, Uttar Pradesh, India</p>

            <p style="margin-top:25px; font-weight:600; color:var(--primary);">
                💬 We’re here to help!<br>
                Reach out for tuition jobs, registration queries, or feedback.
            </p>
        </div>

        <!-- Contact Form -->
        <div class="contact-card">
            <h3>Send us a message</h3>
            <form method="post" action="/contact-send">
                <input class="input" type="text" name="name" placeholder="Your Full Name" required>
                <input class="input" type="email" name="email" placeholder="Your Email Address" required>
                <textarea class="input" name="message" placeholder="Type your message..." rows="5" required></textarea>
                <button class="btn" type="submit">Send Message</button>
            </form>
        </div>

    </div>
</main>

<?= $this->include('layouts/footer') ?>
