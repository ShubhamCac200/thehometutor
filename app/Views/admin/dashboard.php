<?= $this->include('layouts/header') ?>

<h2 class="section-title">Admin Dashboard</h2>

<!-- Quick Stats Card -->
<div class="card-grid">
    <div class="card card-stat">
        <h3>📊 Quick Stats</h3>
        <p>Total Users: <?= $total_users ?></p>
    </div>

    <!-- Create Quiz Card -->
    <div class="card card-action">
        <h3>🧠 Quiz Management</h3>
        <p>Create and manage MCQ quizzes by subject.</p>
        <a href="<?= base_url('admin/quiz/create') ?>" class="btn">➕ Create New Quiz</a>
    </div>

</div>

<!-- Registered Users Table -->
<div class="card">
    <h3>📝 Registered Users</h3>

    <!-- Responsive wrapper -->
    <div class="table-responsive">
        <table class="user-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Last Login</th>
                    <th>Registered At</th>
                </tr>
            </thead>
            <?php $count = ($pager->getCurrentPage() - 1) * $pager->getPerPage() + 1; ?>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= htmlspecialchars($user['full_name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($user['last_login_at'])) ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($user['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination-wrapper">
        <?= $pager->links() ?>
    </div>
</div>

<!-- Optional Custom Style -->
<style>
    .card-action {
        background: linear-gradient(145deg, #f0f8ff, #e8f4ff);
        border: 1px solid #d0e0ff;
        text-align: center;
        transition: all 0.3s ease;
    }

    .card-action:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .card-action .btn {
        background: #007bff;
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
    }

    .card-action .btn:hover {
        background: #0056d2;
    }
</style>

<?= $this->include('layouts/footer') ?>