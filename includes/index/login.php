<?php 
    
     /* Creating a session variable called message. */
     session_start();
     
     $_SESSION["message"]= "";
     
    /* This is the code that is going to validate the user and password. */
    if (isset($_POST['login'])) { 
        $user =    $_POST['user'];
        $password = $_POST['password'];
    
        /* validar que el user exista en la base de datos */
        $sql = "SELECT * FROM users WHERE user = '$user' ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            
            /* validar contraseña */
            if ($row = mysqli_fetch_assoc($result)) {
                $hashed_password = $row['password'];
                /* iniciar sesion */
                if (password_verify($password, $hashed_password)) {
                    switch ($row['age']) {
                        case '0':
                            $_SESSION["user"]= "0";
                            echo '<script> window.location.replace("https://motazorrilla.com/DFS/admin.php")</script>';
                        break;
                        case '3': 
                            $_SESSION["user"]= "3";                       
                            echo '<script> window.location.replace("https://motazorrilla.com/DFS/includes/users/apprentice.php")</script>';     
                        break;
                        case '5':
                            $_SESSION["user"]= "5";
                            echo '<script> window.location.replace("https://motazorrilla.com/DFS/includes/users/fellow.php")</script>';
                        break;
                        case '9':
                            $_SESSION["user"]= "9";
                            echo '<script> window.location.replace("https://motazorrilla.com/DFS/includes/users/master.php")</script>';
                        break;
                        default:
                            echo '<script> window.location.replace("https://motazorrilla.com/DFS/includes/users/profane.php")</script>';
                        break;
                        }
                } else {
                    $_SESSION['message'] = 'La contraseña es incorrecta';               
                }
            }    
        } else {
            $_SESSION['message'] =  'El usuario no existe';     
        } 
    }
    
?>

<div id="login-box" class="login-box visible widget-box no-border">
    
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header blue lighter bigger">
                <i class="ace-icon fa fa-coffee green"></i>
                Ingresa tu Información
            </h4>
            
            <div class="space-6"></div>
            

            <!-- This is the code that is going to validate the user and password. -->
            <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
                <fieldset>
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control"  name="user" placeholder="Usuario" required pattern="[A-Za-z0-9_-]{1-15}"/>
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                    </label>

                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="password" name="password"class="form-control" placeholder="Contraseña" required pattern="[A-Za-z0-9_-]{1-15}"/>
                            <i class="ace-icon fa fa-lock"></i>
                        </span>
                    </label>

                    <div class="space"></div>

                    <div class="clearfix">
                        <label class="inline">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"> Recordarme</span>
                        </label>

                        <button type="submit" name="login" class="width-35 pull-right btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-key"></i>
                            <span class="bigger-110">Ingresar</span>
                        </button>
                    </div>

                    <div class="space-4"></div>

                </fieldset>
            </form>

            <?php include('includes/index/social.php'); ?>
            
        </div><!-- /.widget-main -->

        <?php include('includes/index/toolbar.php'); ?>

    </div><!-- /.widget-body -->
</div><!-- /.login-box -->
    
   