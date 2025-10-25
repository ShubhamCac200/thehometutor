<?= $this->include('layouts/header') ?>

<h2 class="section-title">Admin Dashboard</h2>

<!-- Quick Stats Card -->
<div class="card-grid">
    <div class="card card-stat">
        <h3>📊 Quick Stats (Demo)</h3>
        <!-- <p>Tutors: 120 (demo)<br>Students: 840 (demo)</p> -->
        <p>Total Users: <?= $total_users ?></p>
    </div>
</div>

<!-- Registered Users Table -->
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





<?= $this->include('layouts/footer') ?>