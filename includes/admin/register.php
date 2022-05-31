<?php include("includes/database.php"); ?>

<div class="container pt-5 auto">
    <div class="row ">
        <table class="table table-bordered justify-content-left table-striped table-hover table-sm">
            <thead class="table-success">
                <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Grado</th>
                <th>Email</th>
                <th>Action</th>
                </tr>
            </thead>
        <tbody>

<?php 
    $query = "SELECT * FROM users";
    $users = mysqli_query($conn, $query);    

    while($row = mysqli_fetch_assoc($users)) { ?>
        <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['user']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
            <a href="editreg.php" id=<?php echo $row['id']?>" class="btn btn-secondary">
            <i class=" fa fa-edit"></i>
            </a>
            <a href="deletereg.php" id=<?php echo $row['id']?>" class="btn btn-danger">
            <i class="fa fa-trash"></i>
            </a>
        </td>
        </tr>
    <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
<div>
