<?php include("includes/database.php"); ?>

<!DOCTYPE html>
<html lang="en">
	<?php include('includes/index/header.php'); ?>
		     
	<!-- The above code is a PHP script that is used to display the login page. -->
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h5 class="blue" id="id-company-text">R∴ L∴ Domingo Faustino Sarmiento N° 167 &copy; </h5>
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Sistema </span>
									<span class="white" id="id-text2">de Usuarios</span>
								</h1>
								
							</div>
							
							<div class="space-6"></div>

							<div class="position-relative">
								<?php include('includes/index/login.php'); ?>
								
								<?php include('includes/index/forgot.php'); ?>
					
								<?php include('includes/index/signup.php'); ?>
							
							</div><!-- /.position-relative -->
							
							<?php include('includes/index/navbar.php'); ?>
						</div><!-- /.login container -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<?php include('includes/index/messages.php');?>

		<?php include('includes/index/chat.php');?>

		<?php include('includes/index/footer.php'); ?>
	</body>
</html>

		
