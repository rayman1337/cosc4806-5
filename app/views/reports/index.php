<?php require_once 'app/views/templates/header.php'; ?>

<h2>Admin Reports</h2>

<div class="alert alert-primary">User with Most Reminders: <strong><?= $data['mostNotesUser']['username'] ?></strong> (<?= $data['mostNotesUser']['total'] ?> reminders)</div>

<h4>All Reminders</h4>
<ul class="list-group mb-4">
  <?php foreach ($data['notes'] as $note): ?>
    <li class="list-group-item">
      <?= htmlspecialchars($note['subject']) ?> — User ID: <?= $note['user_id'] ?>
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

<!-- DEBUG -->
<pre>
<?php print_r($data['logins']); ?>
</pre>

<?php require_once 'app/views/templates/footer.php'; ?>
