<?= $this->include('layouts/header') ?>

<h2 class="section-title">⚙️ Admin Dashboard</h2>

<!-- Quick Stats + Quiz Management -->
<div class="card-grid">
    <div class="card card-stat">
        <h3>📊 Quick Stats</h3>
        <p><strong>Total Users:</strong> <?= $total_users ?></p>
    </div>

    <div class="card card-action">
        <h3>🧠 Quiz Management</h3>
        <p>Create and manage MCQ quizzes by subject.</p>
        <a href="<?= base_url('admin/quiz/create') ?>" class="btn">➕ Create New Quiz</a>
    </div>
</div>

<!-- All Quizzes Section -->
<div class="card">
    <h3>🎯 All Quizzes</h3>
    <div class="table-responsive">
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
                    <?php $q = 1; ?>
                    <?php foreach ($quizzes as $quiz): ?>
                        <tr>
                            <td><?= $q++ ?></td>
                            <td><?= esc($quiz['title']) ?></td>
                            <td><?= esc($quiz['subject_name'] ?? 'N/A') ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($quiz['created_at'])) ?></td>
                            <td>
                                <a href="<?= base_url('admin/quiz/view/' . $quiz['id']) ?>" class="btn-sm">👁 View / Attempt</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">No quizzes available yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Registered Users Section -->
<div class="card">
    <div class="card-header">
        <h3>🧾 Registered Users</h3>
        <input type="text" id="userSearch" placeholder="🔍 Search users..." class="search-input">
    </div>

    <div class="table-responsive">
        <table class="user-table" id="userTable">
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
            <tbody>
                <?php $count = ($pager->getCurrentPage() - 1) * $pager->getPerPage() + 1; ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><span class="role <?= esc($user['role']) ?>"><?= ucfirst($user['role']) ?></span></td>
                        <td><?= date('d-m-Y H:i', strtotime($user['last_login_at'])) ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($user['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        <?= $pager->links() ?>
    </div>
</div>

<!-- Styles -->
<style>
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .card,
    .card-action {
        background: #fff;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        padding: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        margin-bottom: 1.5rem;
    }

    .card-action {
        text-align: center;
        transition: all 0.3s ease;
    }

    .card-action:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .btn,
    .btn-sm {
        background: #007bff;
        color: #fff;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 13px;
    }

    .btn:hover,
    .btn-sm:hover {
        background: #0056d2;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    .user-table th,
    .user-table td {
        border: 1px solid #eaeaea;
        padding: 10px;
        text-align: left;
    }

    .user-table th {
        background: #f7f9fc;
        font-weight: 600;
    }

    .user-table tr:hover {
        background: #f9fcff;
    }

    .role {
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 600;
    }

    .role.admin {
        background: #007bff1a;
        color: #007bff;
    }

    .role.user {
        background: #28a7451a;
        color: #28a745;
    }

    .pagination-wrapper {
        margin-top: 1rem;
        text-align: center;
    }

    .search-input {
        padding: 6px 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        width: 220px;
        font-size: 14px;
        margin-bottom: 10px;
    }
</style>

<!-- JS Search Filter -->
<script>
    document.getElementById("userSearch").addEventListener("keyup", function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll("#userTable tbody tr").forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(value) ? "" : "none";
        });
    });
</script>

<?= $this->include('layouts/footer') ?>