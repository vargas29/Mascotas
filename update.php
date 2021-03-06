<?php 
	
	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	
	if ( !empty($_POST)) {
		$nombreError = null;
		$emailError = null;
		$telefonoError = null;
		$direccionError = null;
		
		// keep track post values
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$direccion=$_POST['direccion'];
		
		// validate input
		$valid = true;
		if (empty($nombre)) {
			$nombreError = 'Por favor introduzca el Nombre y apellido';
			$valid = false;
		}
		
		if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Por favor introduzca el email';
			$valid = false;
		}
		
		if (empty($telefono)) {
			$telefonoError ='Por favor introduzca el telefono';
			$valid = false;
		}

		if (empty($direccion)) {
			$direccionError ='Por favor introduzca la direccion';
			$valid = false;
		}
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE cliente  set nombre = ?, email = ?, telefono =? , direccion =?  WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($nombre,$email,$telefono,$direccion,$id));
			Database::disconnect();
			header("Location: index.php");
		}
		
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM cliente where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$nombre = $data['nombre'];
		$email = $data['email'];
		$telefono = $data['telefono'];
		$direccion = $data['direccion'];

		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Update a Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
					 
					  <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
					    <label class="control-label">Nombres y Apellidos</label>
					    <div class="controls">
					      	<input name="nombre" type="text"  placeholder="Nombres y Apellidos" value="<?php echo !empty($nombre)?$nombre:'';?>">
					      	<?php if (!empty($nombreError)): ?>
					      		<span class="help-inline"><?php echo $nombreError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>


					  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <label class="control-label">Email </label>
					    <div class="controls">
					      	<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>


					  <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
					    <label class="control-label">Telefono</label>
					    <div class="controls">
					      	<input name="telefono" type="text"  placeholder="Telefono Mobil" value="<?php echo !empty($telefono)?$telefono:'';?>">
					      	<?php if (!empty($telefonoError)): ?>
					      		<span class="help-inline"><?php echo $telefonoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					   <div class="control-group <?php echo !empty($direccionError)?'error':'';?>">
					    <label class="control-label">Direccion</label>
					    <div class="controls">
					      	<input name="direccion" type="text"  placeholder="Direccion" value="<?php echo !empty($direccion)?$direccion:'';?>">
					      	<?php if (!empty($direccionError)): ?>
					      		<span class="help-inline"><?php echo $direccionError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  	<div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
				</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>