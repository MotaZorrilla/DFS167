<?php include("database.php"); ?>

<?php include('includes/header.php'); ?>

<?php    
$message = '';
$act = true;
/* cargar archivos */
if (isset($_POST['upload'])) {
  echo "upload <br>";
  
  if(!empty($_POST['name']) && !empty($_POST['description']) && is_uploaded_file($_FILES['file']['tmp_name'])) { 
    echo "files <br>";
    $name   = $_FILES['file']['name'];
    $type   = $_FILES['file']['type'];
    $size   = $_FILES['file']['size'];
    $route  = $_FILES['file']['tmp_name'];
    $upload = "upload/".$name;
    if ($size < 10000000) {
      if (copy($route, $upload)) {
        /*$message =*/ 
        echo "<b>Archivo subido correctamente Datos:</b><br>";
        echo "Nombre: <i><a href=\"".$route . $name."\">".$_FILES['file']['name']."</a></i><br>";  
        echo "Tipo MIME: <i>".$_FILES['file']['type']."</i><br>";  
        echo "Peso: <i>".$_FILES['file']['size']." bytes</i><br>";  
        

        $name         = $_POST["name"]; 
        $description  = $_POST["description"]; 

        $query = "INSERT INTO files (name,description,route,type,size) 
        VALUES ('$name','$description','$upload','$type','$size')"; 

        if (mysqli_query($conn, $query)) {
          $_SESSION['message'] = "El archivo '".$name."' se ha subido con éxito";
          $_SESSION['message_type'] = 'success'; 
        } else {
          $_SESSION['message'] = "Error: " . $query . "<br>" . mysqli_error($conn);
          $_SESSION['message_type'] = 'danger';
        }
      } else {
      $_SESSION['message'] = "Error al subir el archivo";
      $_SESSION['message_type'] = 'danger'; 
      }
    } else {
    $_SESSION['message'] = "El archivo es demasiado grande";
    $_SESSION['message_type'] = 'danger';
    }
  }else {
  $_SESSION['message'] = 'Sing Up Unsuccessfully, fill all the fields';
  $_SESSION['message_type'] = 'danger';
  }
  //header('Location: upload.php');
}else {
  echo "no upload";
  // $_FILES = null;
  //session_unset(); 
}?>
        
    <h1 class="container p-4">Subir Archivos</h1>
    <div class="container p-4 " >
          <a href="index.php">Inicio</a>, or <a href="logout.php">Log Out</a>
    <div>
        
    <!-- ADD FORM -->
    <div class="card card-body">
      <form action="upload.php" method="post" enctype="multipart/form-data">  
          <div class="form-group">
            <input type="file" name="file"  size="150" > <!--multiple=""-->
          </div>
          <div class="form-group">
            <input type="text" name="name"     class="form-control"    placeholder="Enter name file" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description"      class="form-control"      placeholder="Enter description file"></textarea>
          </div>
          <input type="submit" name="upload" class="btn btn-success btn-block" value="Up load file">
      </form>
    </div>
    
    <div class="container p-4 " >
      <a href="view.php">Ver</a>, <a href="index.php">Inicio</a>, or <a href="logout.php">Log Out</a>
    <div>
    <div>
    <div>  
    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
      <?= $_SESSION['message']?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
 
<?php include("includes/footer.php"); ?>