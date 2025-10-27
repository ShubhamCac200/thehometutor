<?= $this->include('layouts/header') ?>

<h2 class="section-title text-center">👥 All Registered Users</h2>

<div class="card">
    <div class="card-header">
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

<script>
document.getElementById("userSearch").addEventListener("keyup", function () {
    const value = this.value.toLowerCase();
    document.querySelectorAll("#userTable tbody tr").forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>

<?= $this->include('layouts/footer') ?>
