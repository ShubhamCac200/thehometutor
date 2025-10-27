<?= $this->include('layouts/header') ?>

<h2 class="section-title">⚙️ Admin Dashboard</h2>

<!-- === Quick Stats === -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="icon-box bg-blue"><i class="fas fa-users"></i></div>
        <div>
            <h3><?= esc($total_users) ?></h3>
            <p>Total Users</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="icon-box bg-green"><i class="fas fa-book-open"></i></div>
        <div>
            <h3><?= esc($total_quizzes) ?></h3>
            <p>Total Quizzes</p>
        </div>
    </div>
</div>

<!-- === Quick Actions === -->
<h3 class="section-subtitle">🚀 Quick Actions</h3>
<div class="action-grid">
    <a href="<?= $create_quiz_url ?>" class="action-card create">
        <div class="action-icon"><i class="fas fa-plus-circle"></i></div>
        <div class="action-content">
            <h4>Create New Quiz</h4>
            <p>Design and publish new quizzes for students.</p>
        </div>
    </a>

    <a href="<?= $manage_quizzes_url ?>" class="action-card manage">
        <div class="action-icon"><i class="fas fa-tasks"></i></div>
        <div class="action-content">
            <h4>Manage Quizzes</h4>
            <p>View, edit, and organize existing quizzes.</p>
        </div>
    </a>

    <a href="<?= $manage_users_url ?>" class="action-card users">
        <div class="action-icon"><i class="fas fa-user-cog"></i></div>
        <div class="action-content">
            <h4>Manage Users</h4>
            <p>Review registered users and manage permissions.</p>
        </div>
    </a>
</div>

<!-- === Recent Activity Section === -->
<div class="recent-grid">
    <div class="card">
        <h3>🧩 Recent Quizzes</h3>
        <?php if (!empty($recent_quizzes)): ?>
            <ul class="recent-list">
                <?php foreach ($recent_quizzes as $quiz): ?>
                    <li>
                        <strong><?= esc($quiz['title']) ?></strong>
                        <small><?= esc($quiz['subject_name'] ?? 'N/A') ?> • <?= date('d M Y', strtotime($quiz['created_at'])) ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="empty-msg">No quizzes created yet.</p>
        <?php endif; ?>
    </div>

    <div class="card">
        <h3>👤 Recent Users</h3>
        <?php if (!empty($recent_users)): ?>
            <ul class="recent-list">
                <?php foreach ($recent_users as $user): ?>
                    <li>
                        <strong><?= esc($user['full_name']) ?></strong>
                        <small><?= esc($user['email']) ?> • <?= date('d M Y', strtotime($user['created_at'])) ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="empty-msg">No users registered yet.</p>
        <?php endif; ?>
    </div>
</div>

<!-- === Styles === -->
<style>
    .section-title {
        font-size: 22px;
        font-weight: 700;
        color: #222;
        margin-bottom: 1.5rem;
        border-left: 4px solid #007bff;
        padding-left: 10px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        display: flex;
        align-items: center;
        gap: 15px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        padding: 1rem;
    }

    .icon-box {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        color: #fff;
        font-size: 20px;
    }

    .bg-blue { background: #007bff; }
    .bg-green { background: #28a745; }

    .stat-card h3 {
        font-size: 22px;
        font-weight: 700;
        margin: 0;
    }

    .stat-card p {
        margin: 0;
        color: #666;
        font-size: 14px;
    }

    .section-subtitle {
        margin-bottom: 0.8rem;
        font-size: 18px;
        color: #333;
        font-weight: 600;
    }

    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .action-card {
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        padding: 1rem;
        text-decoration: none;
        color: #333;
        transition: all 0.3s ease;
    }

    .action-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
    }

    .action-icon {
        width: 55px;
        height: 55px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #fff;
        margin-right: 12px;
    }

    .action-card.create .action-icon { background: #007bff; }
    .action-card.manage .action-icon { background: #17a2b8; }
    .action-card.users .action-icon { background: #28a745; }

    .action-content h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
    }

    .action-content p {
        margin: 4px 0 0;
        color: #666;
        font-size: 13px;
    }

    .recent-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 1.5rem;
    }

    .card {
        background: #fff;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        padding: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }

    .recent-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .recent-list li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }

    .recent-list li strong {
        display: block;
        color: #222;
    }

    .recent-list li small {
        color: #777;
        font-size: 13px;
    }

    .empty-msg {
        color: #999;
        font-size: 14px;
        margin: 10px 0;
    }

    @media (max-width: 768px) {
        .section-title {
            font-size: 18px;
        }
        .action-card {
            flex-direction: column;
            align-items: flex-start;
        }
        .action-icon {
            margin-bottom: 10px;
        }
    }
</style>

<!-- Font Awesome (for icons) -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<?= $this->include('layouts/footer') ?>
