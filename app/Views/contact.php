<?= $this->include('layouts/header') ?>

<main class="contact-page">
    <h2 class="section-title">Contact Us</h2>

    <div class="contact-grid">
        <!-- Support Info -->
        <div class="contact-card">
            <h3>Support</h3>
            <p>Email: thehometutorofficial@gmail.com<br>Phone: +91 7880331250</p>

            <h3 style="margin-top:20px;">Office</h3>
            <p>Demo address: 12/34 Education Lane, Pune, India</p>
        </div>

        <!-- Contact Form -->
        <div class="contact-card">
            <h3>Send us a message</h3>
            <form method="post" action="/contact-send">
                <input class="input" type="text" name="name" placeholder="Your Name" required>
                <input class="input" type="email" name="email" placeholder="Your Email" required>
                <textarea class="input" name="message" placeholder="Message" rows="5"></textarea>
                <button class="btn">Send Message</button>
            </form>
        </div>
    </div>
</main>

<?= $this->include('layouts/footer') ?>
