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

    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(45deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .user-badge {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
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

<div class="row mb-4">
    <div class="col-md-3">
        <div class="stat-card text-center">
            <div class="stat-number"><?= count($data['notes']) ?></div>
            <div class="text-muted">Total Reminders</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card text-center">
            <div class="stat-number"><?= count($data['deleted']) ?></div>
            <div class="text-muted">Deleted Items</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card text-center">
            <div class="stat-number"><?= count($data['logins']) ?></div>
            <div class="text-muted">Active Users</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card text-center">
            <div class="stat-number"><?= $data['mostNotesUser']['total'] ?></div>
            <div class="text-muted">Top User Activity</div>
        </div>
    </div>
</div>

<div class="alert alert-info border-0 shadow-sm mb-4" style="border-radius: 15px; background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);">
    <div class="d-flex align-items-center">
        <i class="fas fa-trophy text-warning me-3" style="font-size: 1.5rem;"></i>
        <div>
            <strong>Most Active User:</strong> 
            <span class="user-badge"><?= $data['mostNotesUser']['username'] ?></span>
            <span class="ms-2 text-muted">with <?= $data['mostNotesUser']['total'] ?> reminders</span>
        </div>
    </div>
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