<?php
require_once 'head.php';

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

echo $head;
echo $header;

// get users
$sql = 'SELECT id, email, first_name, last_name FROM users';
$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>

<div class="container content-wrapper">
  <a href="add.php"><span class="oi oi-plus"></span></a>
  <table class="table table-hover">
    <thead>
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
    <tr>
      <th scope="row"><?= $user['id'] ?></th>
      <td><?= $user['email'] ?></td>
      <td><?= $user['first_name'] ?></td>
      <td><?= $user['last_name'] ?></td>
      <td>
        <a href="#"><span class="oi oi-pencil"></span></a>
        <a href="delete.php?id=<?= $user['id'] ?>"><span class="oi oi-delete"></span></a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $footer ?>
