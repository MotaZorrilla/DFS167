<?php include("includes/database.php"); ?>

<div class="container pt-5">
    <div class="row ">
        <table class="table table-bordered justify-content-left table-striped table-hover table-sm">
            <thead class="table-success">
                <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Format</th>
                <th>Action</th>
                </tr>
            </thead>
        <tbody>

<?php 
    $query = "SELECT * FROM files";
    $file = mysqli_query($conn, $query);    

    while($row = mysqli_fetch_assoc($file)) { ?>
        <tr>
        <td><a href="<?php echo $row['route']?>"><?php echo $row['name']; ?></a></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td>
            <a href="editTask.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
            <i class="fa fa-edit"></i>
            </a>
            <a href="deleteTask.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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

