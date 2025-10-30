<?= $this->include('layouts/header') ?>

<style>
    :root {
        --primary: #d32f2f;
        --light: #ffffff;
        --muted: #555;
        --bg-light: #f5f5f5;
    }

    /* CONTACT PAGE */
    .contact-page {
        background: var(--bg-light);
        padding: 70px 20px;
        color: var(--muted);
        display: flex;
        justify-content: center;
    }

    /* Unified Card Container */
    .contact-container {
        background: var(--light);
        border-radius: 18px;
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.08);
        max-width: 1050px;
        width: 100%;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
    }

    .contact-container:hover {
        box-shadow: 0 10px 40px rgba(211, 47, 47, 0.12);
    }

    /* Section Title inside card */
    .contact-header {
        background: var(--light);
        text-align: center;
        padding: 40px 20px 10px;
        border-bottom: 1px solid #eee;
    }

    .contact-header h2 {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        letter-spacing: 0.5px;
    }

    /* Contact Grid */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        align-items: stretch;
    }

    /* Cards */
    .contact-card {
        padding: 45px 35px;
        transition: all 0.3s ease;
    }

    .contact-card:first-child {
        border-right: 1px solid #eee;
        background: #fff;
    }

    .contact-card:last-child {
        background: #fcfcfc;
    }

    /* Headings */
    .contact-card h3 {
        color: var(--primary);
        font-size: 1.4rem;
        margin-bottom: 10px;
        position: relative;
    }

    .contact-card h3::after {
        content: '';
        display: block;
        width: 45px;
        height: 3px;
        background: var(--primary);
        margin-top: 5px;
        border-radius: 2px;
    }

    /* Text */
    .contact-card p {
        margin: 12px 0;
        line-height: 1.7;
        font-size: 1rem;
    }

    /* Form */
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 15px;
    }

    .input {
        padding: 13px 15px;
        border: 1px solid #ddd;
        border-radius: 10px;
        font-size: 1rem;
        width: 100%;
        transition: all 0.2s ease;
        background: #fff;
        outline: none;
    }

    .input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(211, 47, 47, 0.15);
    }

    /* Button */
    .btn {
        background: var(--primary);
        color: var(--light);
        font-weight: 600;
        padding: 12px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        letter-spacing: 0.3px;
    }

    .btn:hover {
        background: #b71c1c;
        transform: scale(1.03);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .contact-card:first-child {
            border-right: none;
            border-bottom: 1px solid #eee;
        }

        .contact-header h2 {
            font-size: 2rem;
        }
    }

    @media (max-width: 600px) {
        .contact-page {
            padding: 45px 15px;
        }

        .contact-header h2 {
            font-size: 1.8rem;
        }

        .contact-card {
            padding: 30px 20px;
        }

        .input {
            font-size: 0.95rem;
            padding: 10px 12px;
        }

        .btn {
            font-size: 0.95rem;
            padding: 10px;
        }
    }
</style>

<main class="contact-page">
    <div class="contact-container">

        <!-- Header -->
        <div class="contact-header">
            <h2>📞 Contact Us</h2>
        </div>

        <!-- Content Grid -->
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
    </div>
</main>

<?= $this->include('layouts/footer') ?>
