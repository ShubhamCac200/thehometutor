<?= $this->include('layouts/header') ?>

<main class="main-content container my-4">

    <!-- Hero Section -->
    <!-- Hero Section -->
    <section class="hero bg-light py-5 text-center text-md-start position-relative overflow-hidden">
        <div class="container position-relative z-2">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <h1 class="fw-bold mb-3 text-dark">Find Expert Tutors Near You</h1>
                    <p class="text-secondary mb-4">
                        Connect with qualified home tutors for school, college, or competitive exams.
                        <br class="d-none d-md-block">
                        Learn smarter with <span class="text-danger fw-semibold">The Home Tutor!</span>
                    </p>

                    <!-- WhatsApp Button -->
                    <a href="https://wa.me/917880331250" target="_blank"
                        class="btn btn-danger btn-lg px-4 py-2 d-inline-flex align-items-center hero-btn">
                        <i class="fa-brands fa-whatsapp me-2"></i> Contact Us on WhatsApp
                    </a>

                    <!-- Alternate text below -->
                    <p class="mt-3 text-muted small">
                        💡 Prefer a call? Reach us directly at <strong>+91 7880331250</strong>
                    </p>
                </div>
            </div>
        </div>

        <!-- Decorative floating circles -->
        <div class="floating-circle bg-danger opacity-25"></div>
        <div class="floating-circle bg-dark opacity-10"></div>
    </section>


    <!-- === QUIZZES SECTION === -->
    <section class="quizzes mt-5">
        <h2 class="section-title fw-bold mb-4 text-center">🧠 Featured Quizzes</h2>

        <div class="quiz-grid" id="quizGrid">
            <?php if (!empty($quizzes)): ?>
                <?php foreach ($quizzes as $quiz): ?>
                    <div class="quiz-card"
                        data-search="<?= strtolower(esc($quiz['title'] . ' ' . ($quiz['subject_name'] ?? ''))) ?>">
                        <div class="quiz-header">
                            <h3><?= esc($quiz['title']) ?></h3>
                            <span class="subject-tag"><?= esc($quiz['subject_name'] ?? 'N/A') ?></span>
                        </div>

                        <div class="quiz-meta">
                            <p>📅 <strong>Created At:</strong> <?= date('d-m-Y', strtotime($quiz['created_at'])) ?></p>
                        </div>

                        <div class="quiz-footer">
                            <a href="<?= base_url('/quiz/view/' . $quiz['id']) ?>" class="btn-view">👁 View Quiz</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-data text-center text-muted">No quizzes available yet.</p>
            <?php endif; ?>
        </div>

        <!-- ✅ Pagination -->
        <?php if (isset($pager)): ?>
            <div class="pagination-wrapper">
                <?= $pager->links('default', 'custom_full') ?>
            </div>

            <p class="page-info">
                Page <strong><?= $pager->getCurrentPage() ?></strong> of <strong><?= $pager->getPageCount() ?></strong>
            </p>
        <?php endif; ?>
    </section>



    <!-- Testimonials -->
    <section class="testimonials mt-5">
        <h2 class="section-title fw-bold mb-4 text-center">What Students Say</h2>

        <div class="row g-4">
            <div class="col-sm-6 col-md-4">
                <div class="card border-0 shadow-sm h-100 p-3 text-center">
                    <strong>"Got 92% in Maths — thanks Rohit sir!"</strong>
                    <div class="text-muted mt-2">— Priya, Class 12</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card border-0 shadow-sm h-100 p-3 text-center">
                    <strong>"Anjali improved my English speaking quickly."</strong>
                    <div class="text-muted mt-2">— Aman, College</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card border-0 shadow-sm h-100 p-3 text-center">
                    <strong>"Great NEET tips from Maya ma'am."</strong>
                    <div class="text-muted mt-2">— Suman, NEET aspirant</div>
                </div>
            </div>
        </div>
    </section>
    <!-- === INSTAGRAM SECTION === -->
    <section class="instagram-section mt-5">
        <h2 class="section-title fw-bold mb-4 text-center">📸 Recent from Instagram</h2>
        <div class="insta-grid text-center">
            <!-- Replace URLs with your own post links -->
            <blockquote class="instagram-media"
                data-instgrm-permalink="https://www.instagram.com/p/DQMb4FiEsNC/?utm_source=ig_embed&amp;utm_campaign=loading"
                data-instgrm-version="14"
                style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                <div style="padding:16px;"> <a
                        href="https://www.instagram.com/p/DQMb4FiEsNC/?utm_source=ig_embed&amp;utm_campaign=loading"
                        style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                        target="_blank">
                        <div style=" display: flex; flex-direction: row; align-items: center;">
                            <div
                                style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                            </div>
                            <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                </div>
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                </div>
                            </div>
                        </div>
                        <div style="padding: 19% 0;"></div>
                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px"
                                height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg"
                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                        <g>
                                            <path
                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg></div>
                        <div style="padding-top: 8px;">
                            <div
                                style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                View this post on Instagram</div>
                        </div>
                        <div style="padding: 12.5% 0;"></div>
                        <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                            <div>
                                <div
                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                </div>
                                <div
                                    style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                </div>
                                <div
                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                </div>
                            </div>
                            <div style="margin-left: 8px;">
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                </div>
                                <div
                                    style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                </div>
                            </div>
                            <div style="margin-left: auto;">
                                <div
                                    style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                </div>
                                <div
                                    style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                </div>
                                <div
                                    style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                </div>
                            </div>
                        </div>
                        <div
                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                            <div
                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                            </div>
                            <div
                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                            </div>
                        </div>
                    </a>
                    <p
                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                        <a href="https://www.instagram.com/p/DQMb4FiEsNC/?utm_source=ig_embed&amp;utm_campaign=loading"
                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                            target="_blank">A post shared by THE HOME TUTOR (@thehometutor_uttarpradesh)</a>
                    </p>
                </div>
            </blockquote>
            <script async src="//www.instagram.com/embed.js"></script>
            <blockquote class="instagram-media"
                data-instgrm-permalink="https://www.instagram.com/p/DQMb4FiEsNC/?utm_source=ig_embed&amp;utm_campaign=loading"
                data-instgrm-version="14"
                style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                <div style="padding:16px;"> <a
                        href="https://www.instagram.com/p/DQMb4FiEsNC/?utm_source=ig_embed&amp;utm_campaign=loading"
                        style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                        target="_blank">
                        <div style=" display: flex; flex-direction: row; align-items: center;">
                            <div
                                style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                            </div>
                            <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                </div>
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                </div>
                            </div>
                        </div>
                        <div style="padding: 19% 0;"></div>
                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px"
                                height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg"
                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                        <g>
                                            <path
                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg></div>
                        <div style="padding-top: 8px;">
                            <div
                                style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                View this post on Instagram</div>
                        </div>
                        <div style="padding: 12.5% 0;"></div>
                        <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                            <div>
                                <div
                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                </div>
                                <div
                                    style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                </div>
                                <div
                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                </div>
                            </div>
                            <div style="margin-left: 8px;">
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                </div>
                                <div
                                    style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                </div>
                            </div>
                            <div style="margin-left: auto;">
                                <div
                                    style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                </div>
                                <div
                                    style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                </div>
                                <div
                                    style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                </div>
                            </div>
                        </div>
                        <div
                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                            <div
                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                            </div>
                            <div
                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                            </div>
                        </div>
                    </a>
                    <p
                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                        <a href="https://www.instagram.com/p/DQMb4FiEsNC/?utm_source=ig_embed&amp;utm_campaign=loading"
                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                            target="_blank">A post shared by THE HOME TUTOR (@thehometutor_uttarpradesh)</a>
                    </p>
                </div>
            </blockquote>
            <script async src="//www.instagram.com/embed.js"></script>
            <blockquote class="instagram-media"
                data-instgrm-permalink="https://www.instagram.com/p/DQMb4FiEsNC/?utm_source=ig_embed&amp;utm_campaign=loading"
                data-instgrm-version="14"
                style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                <div style="padding:16px;"> <a
                        href="https://www.instagram.com/p/DQMb4FiEsNC/?utm_source=ig_embed&amp;utm_campaign=loading"
                        style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;"
                        target="_blank">
                        <div style=" display: flex; flex-direction: row; align-items: center;">
                            <div
                                style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                            </div>
                            <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                </div>
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                </div>
                            </div>
                        </div>
                        <div style="padding: 19% 0;"></div>
                        <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px"
                                height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg"
                                xmlns:xlink="https://www.w3.org/1999/xlink">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                        <g>
                                            <path
                                                d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg></div>
                        <div style="padding-top: 8px;">
                            <div
                                style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                View this post on Instagram</div>
                        </div>
                        <div style="padding: 12.5% 0;"></div>
                        <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                            <div>
                                <div
                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                </div>
                                <div
                                    style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                </div>
                                <div
                                    style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                </div>
                            </div>
                            <div style="margin-left: 8px;">
                                <div
                                    style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                </div>
                                <div
                                    style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                </div>
                            </div>
                            <div style="margin-left: auto;">
                                <div
                                    style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                </div>
                                <div
                                    style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                </div>
                                <div
                                    style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                </div>
                            </div>
                        </div>
                        <div
                            style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                            <div
                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                            </div>
                            <div
                                style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                            </div>
                        </div>
                    </a>
                    <p
                        style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                        <a href="https://www.instagram.com/p/DQMb4FiEsNC/?utm_source=ig_embed&amp;utm_campaign=loading"
                            style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;"
                            target="_blank">A post shared by THE HOME TUTOR (@thehometutor_uttarpradesh)</a>
                    </p>
                </div>
            </blockquote>
            <script async src="//www.instagram.com/embed.js"></script>
        </div>
        <script async src="//www.instagram.com/embed.js"></script>
    </section>

</main>
<style>
    /* === QUIZ GRID === */
    .quiz-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        gap: 22px;
        padding: 10px 0;
    }

    /* === CARD === */
    .quiz-card {
        background: #fff;
        border-radius: 14px;
        border-top: 4px solid #e63946;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        padding: 20px 18px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: all 0.3s ease;
    }

    .quiz-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 18px rgba(230, 57, 70, 0.15);
    }

    /* === CARD HEADER === */
    .quiz-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .quiz-header h3 {
        color: #333;
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
    }

    .subject-tag {
        background: #fdebec;
        color: #e63946;
        font-weight: 600;
        font-size: 0.8rem;
        border-radius: 999px;
        padding: 5px 10px;
        margin-top: 5px;
    }

    /* === META INFO === */
    .quiz-meta {
        margin: 12px 0;
        color: #555;
        font-size: 0.9rem;
    }

    /* === BUTTON === */
    .btn-view {
        display: inline-block;
        background: #e63946;
        color: #fff;
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        text-align: center;
        transition: background 0.25s ease, box-shadow 0.25s ease;
    }

    .btn-view:hover {
        background: #c92f39;
        box-shadow: 0 3px 10px rgba(230, 57, 70, 0.25);
    }

    /* === PAGINATION === */
    .pagination-wrapper {
        text-align: center;
        margin-top: 35px;
    }

    .pagination {
        display: inline-flex;
        flex-wrap: wrap;
        list-style: none;
        gap: 8px;
        justify-content: center;
        align-items: center;
        padding: 0;
        margin: 0;
    }

    .pagination li a,
    .pagination li span {
        display: inline-block;
        padding: 8px 16px;
        font-size: 0.95rem;
        border-radius: 999px;
        text-decoration: none;
        background: #fff;
        color: #e63946;
        border: 1.5px solid #e63946;
        transition: all 0.25s ease;
        font-weight: 500;
    }

    .pagination li a:hover {
        background: #e63946;
        color: #fff;
        box-shadow: 0 4px 12px rgba(230, 57, 70, 0.25);
    }

    .pagination li.active span {
        background: #e63946;
        color: #fff;
        border-color: #e63946;
        font-weight: 600;
        box-shadow: 0 4px 10px rgba(230, 57, 70, 0.25);
        transform: scale(1.05);
    }

    .pagination li.disabled span {
        background: #f1f1f1;
        color: #aaa;
        border: 1px solid #ddd;
        cursor: not-allowed;
    }

    .page-info {
        text-align: center;
        font-size: 0.95rem;
        color: #555;
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        .quiz-grid {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }

        .pagination li a,
        .pagination li span {
            padding: 6px 12px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .pagination {
            gap: 5px;
        }

        .pagination li a,
        .pagination li span {
            padding: 5px 10px;
            font-size: 0.85rem;
        }
    }


    /* === INSTAGRAM SECTION === */
    .insta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        justify-content: center;
    }

    .instagram-section blockquote {
        margin: auto;
    }
</style>


<?= $this->include('layouts/footer') ?>