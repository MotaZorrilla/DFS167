<?php
    //VALIDACIÓN DE CAMPOS
	if (isset($_POST['signup'])) { 
		//RECEPCIÓN DE DATOS
       	$name = 			$_POST['name'];
		$user=				$_POST['user'];
		$age =            	$_POST['age'];
		$where =            $_POST['where'];
		$email =            $_POST['email'];
		$password =         $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		
		/*verifico contraseñas iguales*/
		if ($password == $confirm_password) {
			$email = $_POST['email'];
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			
			/* validar que el userio y email no exista en la base de datos */
			$sql = "SELECT * FROM users WHERE user = '$user'";
			$result = mysqli_query($conn, $sql);
			$resultuser = mysqli_num_rows($result);
			
			$sql = "SELECT * FROM users WHERE email = '$email'";
			$result = mysqli_query($conn, $sql);
			$resultemail = mysqli_num_rows($result);

			if ($resultuser > 0) {
				$_SESSION['message'] = 'El nombre usuario ya se encuentra registrado. Por favor intente con otro usuario';	 
			} elseif ($resultemail > 0) {
				$_SESSION['message'] = 'El email ya se encuentra registrado. Por favor intente con otro email';	
			} else {
				$query = "INSERT INTO `users`(`name`, `user`, `age`, `where`, `email`, `password`) VALUES ('$name','$user','$age','$where','$email', '$password')";
				$result = mysqli_query($conn, $query);
			
				if(!$result) {
					die("Query Failed. not connect");
					$_SESSION['message'] = 'Registro invalido, falla Query Failed. not connect ';	
				}else {
					$_SESSION['message'] = 'Registro exitoso';	
				}
			}
		} else {
			$_SESSION['message'] = 'Las contraseñas no coinciden ';
		}
		
    }
?>
  
<div id="signup-box" class="signup-box widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">
			<h4 class="header green lighter bigger">
				<i class="ace-icon fa fa-users blue"></i>
					Registro de Nuevos Usuarios
			</h4>
			<div class="space-6"></div>
			
			<p>Ingresa los datos solicitados a continuacion: </p>

			<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
				<fieldset>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="text" class="form-control"  name="name" placeholder="Nombre Completo"  required pattern="[A-Za-z0-9_-]{1-15}"/>
								<i class="ace-icon fa fa-users"></i>
						</span>
					</label>
					
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="text" class="form-control" name="user" placeholder="Usuario"  required pattern="[A-Za-z0-9_-]{1-15}"/>
								<i class="ace-icon fa fa-user"></i>
						</span>
					</label>

					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="text" class="form-control" name="age" placeholder="¿Qué edad teneis?"  required pattern="[A-Za-z0-9_-]{1-15}"/>
								<i class="ace-icon fa fa-pencil"></i>
						</span>
					</label>

					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="text" class="form-control" name="where" placeholder="¿De dónde venis?"  required pattern="[A-Za-z0-9_-]{1-15}"/>
								<i class="ace-icon fa fa-pencil"></i>
						</span>
					</label>

					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="email" class="form-control" name="email" placeholder="Email"  required pattern="[A-Za-z0-9_-]{1-15}"/>
								<i class="ace-icon fa fa-envelope"></i>
						</span>
					</label>
					
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="password" class="form-control" name="password" placeholder="Password"  required pattern="[A-Za-z0-9_-]{1-15}"/>
								<i class="ace-icon fa fa-lock"></i>
						</span>
					</label>

					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input type="password" class="form-control" name="confirm_password" placeholder="Repetir password" required pattern="[A-Za-z0-9_-]{1-15}"/>
								<i class="ace-icon fa fa-retweet"></i>
						</span>
					</label>

					<label class="block">
						<input type="checkbox" class="ace" required/>
							<span class="lbl">
								Acepto los <a href="#">Terminos de Uso</a>
							</span>
					</label>
					<div class="space-24"></div>

					<div class="clearfix">
						<button type="reset" class="width-30 pull-left btn btn-sm">
							<i class="ace-icon fa fa-refresh"></i>
								<span class="bigger-110">Reset</span>
						</button>
						
						<button type="submit" name="signup"   class="width-65 pull-right btn btn-sm btn-success">
							<span class="bigger-110">Registrar</span>
								<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</button>
					</div>
				</fieldset>
			</form>
		</div>

		<div class="toolbar center">
			<a href="#" data-target="#login-box" class="back-to-login-link">
				<i class="ace-icon fa fa-arrow-left"></i>
					Regresar al Login
			</a>
		</div>	<!-- /.widget-toolbar -->
	</div>		<!-- /.widget-body -->
</div>			<!-- /.signup-box -->

