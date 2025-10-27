<?= $this->include('layouts/header') ?>

<h2 class="section-title text-center">🧠 All Quizzes</h2>

<div class="card">
    <div class="card-header">
        <input type="text" id="quizSearch" placeholder="🔍 Search quizzes..." class="search-input">
    </div>

    <div class="table-responsive">
        <table class="user-table" id="quizTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Quiz Title</th>
                    <th>Subject</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = ($pager->getCurrentPage() - 1) * $pager->getPerPage() + 1; ?>
                <?php foreach ($quizzes as $quiz): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= esc($quiz['title']) ?></td>
                        <td><?= esc($quiz['subject_name'] ?? 'N/A') ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($quiz['created_at'])) ?></td>
                        <td>
                            <a href="<?= base_url('admin/quiz/view/' . $quiz['id']) ?>" class="btn-sm">👁 View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        <?= $pager->links() ?>
    </div>
</div>

<script>
document.getElementById("quizSearch").addEventListener("keyup", function () {
    const value = this.value.toLowerCase();
    document.querySelectorAll("#quizTable tbody tr").forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>

<?= $this->include('layouts/footer') ?>
