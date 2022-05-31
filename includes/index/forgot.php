<?php 
	//VALIDACIÓN DE CAMPOS
	if(isset($_POST['forgot']))	{	
		//RECEPCIÓN DE DATOS
		$to = 		'info@motazorrilla.com';
		$email = 	$_POST['email'];
		$subject =  'Solicitud de Recuperacion de Contraseña';
		
		// validar que el usuario y email no exista en la base de datos 
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		$resultemail = mysqli_num_rows($result);

		if ($resultemail > 0) {
		//MENSAJE
		$message="
		<b>Solicitud de Recuperacion de Contraseña</b><br>
		Correo: <b>".$email."</b><br><br>
		<hr>";
	
		//ENVIO DE CORREO
		$header =	'MIME-Version: 1.0' . "\r\n";
		$header .= 	"Content-type: text/html; charset=iso-8859-1\r\n";
		$header .= 	"Content-type: text/html; charset=UTF-8\r\n"; 
		$header .=	"From: www.motazorrilla.com\r\n";

		mail('$to, $email', $subject, $message, $header) or die('Hubo un error');	
		
		//SCRIPT DE CONFIRMACIÓN
		$_SESSION['message'] = 'Your message has been sent successfully!\\nThank you for contacting us! \\nWe will respond shortly!\\n\\n|| www.dfs167.com ||';
		
		}else	{
		$_SESSION['message'] = 'El email no se encuentra registrado. Por favor intente con otro email';	
		}
	}
		
	?>


<div id="forgot-box" class="forgot-box widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">
			<h4 class="header red lighter bigger">
				<i class="ace-icon fa fa-key"></i>
				Recuperar Contraseña
			</h4>
			<div class="space-6"></div>
			
			<p>	Ingresa tu correo electronico para recibir las instrucciones </p>

			<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
				<fieldset>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
						<input type="email" name='email' class="form-control" placeholder="Email" required pattern="[A-Za-z0-9_-]{1-15}"/>
						<i class="ace-icon fa fa-envelope"></i>
						</span>
					</label>
				<div class="clearfix">
					<button type="submit" name= 'forgot' class="width-35 pull-right btn btn-sm btn-danger">
					<i class="ace-icon fa fa-lightbulb-o"></i>
					<span class="bigger-110">Enviar</span>
					</button>
				</div>
				</fieldset>
			</form>
		</div><!-- /.widget-main -->

		<div class="toolbar center">
			<a href="#" data-target="#login-box" class="back-to-login-link">
				Regresar al Login
			<i class="ace-icon fa fa-arrow-right"></i>
			</a>
		</div>
	</div>	<!-- /.widget-body -->
</div>		<!-- /.forgot-box -->