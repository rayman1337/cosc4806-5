<?php require_once 'app/views/templates/header.php'; ?>

<style>
    .dashboard-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    body {
        background: #f8f9fa;
    }
</style>

<div class="dashboard-header text-center">
    <h1 class="mb-3">
        <i class="fas fa-chart-line me-2"></i>
        Admin Dashboard
    </h1>
    <p class="mb-0 opacity-75">Real-time insights and analytics</p>
</div>

<h4>All Reminders</h4>
<ul class="list-group mb-4">
    <?php foreach ($data['notes'] as $note): ?>
        <li class="list-group-item">
            <?= htmlspecialchars($note['subject']) ?> — User ID: <?= $note['user_id'] ?>
        </li>
    <?php endforeach; ?>
</ul>

<h4>Deleted Reminders</h4>
<ul class="list-group mb-4">
    <?php foreach ($data['deleted'] as $note): ?>
        <li class="list-group-item list-group-item-danger">
            <strong><?= htmlspecialchars($note['subject']) ?></strong> — User ID: <?= $note['user_id'] ?>
        </li>
    <?php endforeach; ?>
</ul>

<h4>Total Logins by User</h4>
<ul class="list-group">
    <?php foreach ($data['logins'] as $log): ?>
        <li class="list-group-item">
            <?= $log['username'] ?>: <?= $log['total_logins'] ?> logins
        </li>
    <?php endforeach; ?>
</ul>

<?php require_once 'app/views/templates/footer.php'; ?>