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
</style>


<?= $this->include('layouts/footer') ?>