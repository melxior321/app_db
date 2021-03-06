<?php
require 'classes.php';

$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statement = $connection->prepare($sql);
$statement ->execute([':id'=> $id]);
$users = $statement->fetch(PDO::FETCH_OBJ);

if(isset ($_POST['name']) && isset($_POST['email'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $today = date("Y-m-d H:i:s");
    $sql = 'UPDATE users SET name=:name, email=:email, updated_at=:today WHERE id=:id';
    $statement = $connection -> prepare($sql);
    if($statement-> execute([':name' => $name, ':email' => $email, ':today' => $today,  ':id' => $id])) {
        header("Location: index.php");
    }
    
}
?>


<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update a person</h2>
        </div>
        <div class="card-body">
            <?php  if(!empty($message)): ?>
                <div class="alert alert-success ">
                    <?= $message; ?>
                </div>       
            <?php  endif; ?>    
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?= $users->name; ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?= $users->email; ?>" type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update a person</button>  
                </div>
            </form>
        </div>
    </div>        
</div>
<?php require 'footer.php'; ?>