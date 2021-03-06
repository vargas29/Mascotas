<?php 
	
	require '../database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}
	
	if ( !empty($_POST)) {
		$nombreError = null;
		$direccionError = null;
		$encargadoError = null;
		$telefonoError = null;
		$celularError = null;
		
		// keep track post values
		$nombre = $_POST['nombre'];
		$direccion=$_POST['direccion'];
		$encargado=$_POST['encargado'];
		$telefono = $_POST['telefono'];
		$celular=$_POST['celular'];
		
		// validate input
		$valid = true;
		if (empty($nombre)) {
			$nombreError = 'Por favor introduzca el Nombre y apellido';
			$valid = false;
		}

		if (empty($direccion)) {
			$direccionError ='Por favor introduzca la direccion';
			$valid = false;
		}

		if (empty($encargado)) {
			$encargadoError ='Por favor introduzca el nombre del encargado';
			$valid = false;
		}
		
		if (empty($telefono)) {
			$telefonoError = 'Please enter telefono del proveedor';
			$valid = false;
		} else if ( !filter_var($telefono, FILTER_SANITIZE_NUMBER_INT) ) {
			$telefonoError = 'Por favor introduzca el telefono del proveedor';
			$valid = false;
		}
		
		if (empty($celular)) {
			$celularError = 'introduzca El Numero de celular del encargado';
			$valid = false;
		} else if ( !filter_var($celular, FILTER_SANITIZE_NUMBER_INT) ) {
			$celularError = 'introduzca El Numero de celular del encargado';
			$valid = false;
		}
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE proveedor  set nombre = ?, direccion = ?, encargado =? , telefono =? , celular =?  WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($nombre,$direccion,$encargado,$telefono,$celular,$id));
			Database::disconnect();
			header("Location: index.php");
		}
		
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM proveedor where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$nombre = $data['nombre'];
		$direccion = $data['direccion'];
		$encargado = $data['encargado'];
		$telefono = $data['telefono'];
		$celular =$data['celular'];
		

		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Update a Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="updateproveedor.php?id=<?php echo $id?>" method="post">
					 
					   <div class="control-group <?php echo !empty($nombreError)?'error':'';?>">
					    <label class="control-label">Nombre Del Proveeedor</label>
					    <div class="controls">
					      	<input name="nombre" type="text"  placeholder="Nombre del Proveedor" value="<?php echo !empty($nombre)?$nombre:'';?>">
					      	<?php if (!empty($nombreError)): ?>
					      		<span class="help-inline"><?php echo $nombreError;?></span>
					      	<?php endif; ?>
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


					<div class="control-group <?php echo !empty($encargadoError)?'error':'';?>">
					    <label class="control-label">Encargado Del Proveeedor</label>
					    <div class="controls">
					      	<input name="encargado" type="text"  placeholder="Encargado del Proveedor" value="<?php echo !empty($encargado)?$encargado:'';?>">
					      	<?php if (!empty($encargadoError)): ?>
					      		<span class="help-inline"><?php echo $encargadoError;?></span>
					      	<?php endif; ?>
					    </div>
					    </div>

					  <div class="control-group <?php echo !empty($telefonoError)?'error':'';?>">
					    <label class="control-label">Telefono Del proveedor</label>
					    <div class="controls">
					      	<input name="telefono" type="text" placeholder="Telefono Del proveedor" value="<?php echo !empty($telefono)?$telefono:'';?>">
					      	<?php if (!empty($telefonoError)): ?>
					      		<span class="help-inline"><?php echo $telefonoError;?></span>
					      	<?php endif;?>
					    </div>

					    </div>
					  <div class="control-group <?php echo !empty($celularError)?'error':'';?>">
					    <label class="control-label">Celular Del Encargado</label>
					    <div class="controls">
					      	<input name="celular" type="text" placeholder="Celular Del Encargado" value="<?php echo !empty($celular)?$celular:'';?>">
					      	<?php if (!empty($celularError)): ?>
					      		<span class="help-inline"><?php echo $celularError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					

					  	<div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn" href="../proveedor.php">Back</a>
						</div>
				</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>