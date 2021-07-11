<?php
require 'classes.php';
$sql = 'SELECT * FROM users';
$statement = $connection-> prepare($sql);
$statement->execute();
$users = $statement -> fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>All users<h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered"> 
                <tr>
                   <th>ID</th> 
                   <th>Name</th>
                   <th>Email</th>
                   <th>Createed at</th>
                   <th>Updated_at</th>
                   <th>Action</th>
                </tr>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->id; ?></td>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->created_at; ?></td>
                        <td><?= $user->updated_at; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $user->id ?>" class="btn btn-info">Edit</a>
                            <a onclick="return confirm('Are you sure?')" href="delete.php?id=<?= $user->id ?>"class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>         

<?php require 'footer.php'; ?>
