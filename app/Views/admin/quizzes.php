<?= $this->include('layouts/header') ?>

<main class="quiz-page">
    <h2 class="section-title">🧠 All Quizzes</h2>

    <!-- 🔍 Search -->
    <div class="search-bar">
        <input type="text" id="quizSearch" placeholder="🔍 Search quizzes...">
    </div>

    <!-- 🧩 Quiz Grid -->
    <div class="quiz-grid" id="quizGrid">
        <?php if (!empty($quizzes)): ?>
            <?php foreach ($quizzes as $quiz): ?>
                <div class="quiz-card" data-search="<?= strtolower(esc($quiz['title'] . ' ' . ($quiz['subject_name'] ?? ''))) ?>">
                    <div class="quiz-header">
                        <h3><?= esc($quiz['title']) ?></h3>
                        <span class="subject-tag"><?= esc($quiz['subject_name'] ?? 'N/A') ?></span>
                    </div>

                    <div class="quiz-meta">
                        <p>📅 <strong>Created At:</strong> <?= date('d-m-Y H:i', strtotime($quiz['created_at'])) ?></p>
                    </div>

                    <div class="quiz-footer">
                        <a href="<?= base_url('admin/quiz/view/' . $quiz['id']) ?>" class="btn-view">👁 View Quiz</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-data">No quizzes found.</p>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if ($pager): ?>
        <div class="pagination-wrapper">
            <?= $pager->links('default', 'custom_full') ?>
        </div>

        <p class="page-info">
            Page <strong><?= $pager->getCurrentPage() ?></strong> of <strong><?= $pager->getPageCount() ?></strong>
        </p>
    <?php endif; ?>
</main>

<!-- 🔍 Search Script -->
<script>
document.getElementById("quizSearch").addEventListener("keyup", function () {
    const value = this.value.toLowerCase();
    document.querySelectorAll(".quiz-card").forEach(card => {
        card.style.display = card.getAttribute("data-search").includes(value) ? "" : "none";
    });
});
</script>

<style>
/* === GLOBAL THEME === */
body {
    background: #f8f9fb;
    color: #222;
    font-family: "Poppins", sans-serif;
}

/* === MAIN CONTAINER === */
.quiz-page {
    padding: 30px 5%;
    max-width: 1300px;
    margin: 0 auto;
}

/* === TITLE === */
.section-title {
    text-align: center;
    color: #e63946;
    font-size: 1.9rem;
    font-weight: 700;
    margin-bottom: 25px;
    letter-spacing: 0.5px;
}

/* === SEARCH BAR === */
.search-bar {
    display: flex;
    justify-content: center;
    margin-bottom: 25px;
}
.search-bar input {
    width: 100%;
    max-width: 650px;
    padding: 12px 18px;
    font-size: 1rem;
    border-radius: 10px;
    border: 1.5px solid #ddd;
    background: #fff;
    outline: none;
    transition: all 0.3s ease;
}
.search-bar input:focus {
    border-color: #e63946;
    box-shadow: 0 0 12px rgba(230, 57, 70, 0.2);
}

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

/* === NO DATA === */
.no-data {
    text-align: center;
    color: #777;
    font-size: 1rem;
    margin-top: 30px;
}

/* === SIMPLE PAGINATION === */
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

/* === PAGE INFO === */
.page-info {
    text-align: center;
    font-size: 0.95rem;
    color: #555;
    margin-top: 10px;
}

/* === RESPONSIVE === */
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
