<?= $this->include('layouts/header') ?>

<main class="main-content container my-4">

    <!-- Hero Section -->
    <section class="hero bg-white p-4 p-md-5 rounded shadow-sm text-center text-md-start">
        <div class="row align-items-center">
            <div class="col-md-8 mx-auto">
                <h1 class="fw-bold mb-3">Find Expert Tutors Near You</h1>
                <p class="text-muted mb-4">
                    Connect with qualified home tutors for school, college, or competitive exams.
                    Learn smarter with The Home Tutor!
                </p>
                <a href="/register" class="btn btn-danger btn-lg px-4">Get Started</a>
            </div>
        </div>
    </section>

    <!-- Featured Tutors -->
    <section class="tutors mt-5">
        <h2 class="section-title fw-bold mb-4 text-center">Featured Tutors</h2>

        <div class="row g-4">
            <!-- Tutor 1 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light text-danger fw-bold d-flex align-items-center justify-content-center rounded me-3"
                                style="width:60px;height:60px;">
                                RS
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Rohit Sharma</h5>
                                <small class="text-muted">M.Sc, Physics | 6 years</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="badge bg-light text-muted me-1">Class 9-12</span>
                            <span class="badge bg-light text-muted me-1">JEE Coaching</span>
                            <span class="badge bg-light text-muted">Online & Home</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-danger">₹400/hr</span>
                            <button class="btn btn-danger btn-sm">Book Trial</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutor 2 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light text-danger fw-bold d-flex align-items-center justify-content-center rounded me-3"
                                style="width:60px;height:60px;">
                                AS
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Anjali Singh</h5>
                                <small class="text-muted">B.Ed, English | 4 years</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="badge bg-light text-muted me-1">Class 6-10</span>
                            <span class="badge bg-light text-muted me-1">Spoken English</span>
                            <span class="badge bg-light text-muted">Online</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-danger">₹300/hr</span>
                            <button class="btn btn-danger btn-sm">Book Trial</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutor 3 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light text-danger fw-bold d-flex align-items-center justify-content-center rounded me-3"
                                style="width:60px;height:60px;">
                                MK
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Maya Kapoor</h5>
                                <small class="text-muted">PhD, Chemistry | 8 years</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="badge bg-light text-muted me-1">Class 11-12</span>
                            <span class="badge bg-light text-muted me-1">NEET</span>
                            <span class="badge bg-light text-muted">Home & Online</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-danger">₹550/hr</span>
                            <button class="btn btn-danger btn-sm">Book Trial</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- === QUIZZES SECTION === -->
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
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
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
    box-shadow: 0 3px 10px rgba(230,57,70,0.25);
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
    box-shadow: 0 4px 10px rgba(230,57,70,0.25);
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
    .pagination li a, .pagination li span {
        padding: 6px 12px;
        font-size: 0.9rem;
    }
}
@media (max-width: 576px) {
    .pagination {
        gap: 5px;
    }
    .pagination li a, .pagination li span {
        padding: 5px 10px;
        font-size: 0.85rem;
    }
}
</style>


<?= $this->include('layouts/footer') ?>