<?= $this->include('layouts/header') ?>

<h2 class="section-title">🧠 All Quizzes</h2>

<div class="card">
    <table class="user-table">
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
            <?php if (!empty($quizzes)): ?>
                <?php $count = 1; ?>
                <?php foreach ($quizzes as $quiz): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= htmlspecialchars($quiz['title']) ?></td>
                        <td><?= htmlspecialchars($quiz['subject_name']) ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($quiz['created_at'])) ?></td>
                        <td>
                            <a href="<?= base_url('admin/quiz/view/' . $quiz['id']) ?>" class="btn btn-sm">👁 View / Attempt</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align:center;">No quizzes found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
    .btn-sm {
        background: #007bff;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
    }

    .btn-sm:hover {
        background: #0056d2;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
    }

    .user-table th, .user-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .user-table th {
        background: #f5f5f5;
    }
</style>

<?= $this->include('layouts/footer') ?>
