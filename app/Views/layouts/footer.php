</div>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-left">
            <h3>The Home Tutor</h3>
            <p>Trusted tutors at your doorstep. Learn smarter, achieve better!</p>
        </div>

        <div class="footer-right">
            <h4>📱 Follow Us on Social Media</h4>
            <div class="social-icons">
                <a href="https://www.instagram.com/thehometutor_uttarpradesh?igsh=dW42NDZ0YzJheWR0" target="_blank"
                    title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/profile.php?id=61561300686752&mibextid=ZbWKwL" target="_blank"
                    title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.threads.net/@thehometutor_uttarpradesh?invite=3" target="_blank" title="Threads">
                    <i class="fa-brands fa-threads"></i>
                </a>
                <a href="https://x.com/THEHOMETUTOR_?t=WehCQlsCQkLMyQu11Pldaw&s=09" target="_blank" title="X">
                    <i class="fab fa-x-twitter"></i>
                </a>
                <a href="https://t.me/thehometutor_uttarpradesh" target="_blank" title="Telegram">
                    <i class="fab fa-telegram-plane"></i>
                </a>
                <a href="https://www.youtube.com/@THEHOMETUTOR_uttarpradesh" target="_blank" title="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://wa.me/917880331250" target="_blank" title="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; <?= date('Y') ?> The Home Tutor. All rights reserved.<br>
        <small>
            Developed by
            <a href="https://wa.me/918299722527" target="_blank"><i class="fab fa-whatsapp"></i> Shubham Goswami</a> |
            <a href="https://www.instagram.com/_i_am_shubham__/" target="_blank"><i class="fab fa-instagram"></i>
                Instagram</a> |
            <a href="https://www.linkedin.com/in/shubham-goswami-6a0542191/" target="_blank"><i
                    class="fab fa-linkedin"></i> LinkedIn</a>
        </small>
    </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
    // function showToast(message, type = 'success') {
    //     // Create toast element
    //     var $toast = $('<div class="toast"></div>').addClass(type);
    //     $toast.html('<span>' + message + '</span><span class="close-btn">&times;</span>');

    //     // Append to container
    //     $('#toast-container').append($toast);

    //     // Slide in animation
    //     $toast.animate({ opacity: 1, right: '0' }, 500);

    //     // Close button
    //     $toast.find('.close-btn').click(function () {
    //         $toast.animate({ opacity: 0, right: '-350px' }, 500, function () {
    //             $(this).remove();
    //         });
    //     });

    //     // Auto remove after 4 seconds
    //     setTimeout(function () {
    //         $toast.animate({ opacity: 0, right: '-350px' }, 500, function () {
    //             $(this).remove();
    //         });
    //     }, 4000);
    // }
    function showToast(message, type = 'success') {
        const isError = type === 'error';

        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: isError ? 'error' : 'success',
            title: message,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: isError ? '#fff2f0' : '#f0fff4',
            color: '#222',
            iconColor: isError ? '#e10600' : '#27ae60',
            customClass: {
                popup: 'elegant-toast',
                title: 'elegant-toast-title',
                timerProgressBar: 'elegant-timer-bar'
            },
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    }


    // Display flashdata automatically
    <?php if (session()->getFlashdata('success')): ?>
        $(document).ready(function () {
            showToast("<?= session()->getFlashdata('success') ?>", "success");
        });
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        $(document).ready(function () {
            showToast("<?= session()->getFlashdata('error') ?>", "error");
        });
    <?php endif; ?>
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuToggle = document.getElementById("menuToggle");
        const navMenu = document.getElementById("navMenu");

        menuToggle.addEventListener("click", function () {
            navMenu.classList.toggle("active");

            // Toggle icon between bars and close
            const icon = this.querySelector("i");
            icon.classList.toggle("fa-bars");
            icon.classList.toggle("fa-times");
        });
    });
</script>





</body>

</html>