<?php 
	
	require '../database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$nomError = null;
		$tipoError = null;
		$marcaError = null;
		$descripcionError = null;
		$baseError = null;
		$publicoError = null;
		$proveedorError=null;
		
		
		// keep track post values
		$nom = $_POST['nom'];
		$tipo=$_POST['tipo'];
		$marca=$_POST['marca'];
		$descripcion = $_POST['descripcion'];
		$base=$_POST['base'];
		$publico=$_POST['publico'];
		$proveedor=$_POST['proveedor'];		
		// validate input

		$valid = true;
		if (empty($nom)) {
			$nomeError = 'Por favor introduzca el Nombre del Articulo';
			$valid = false;
		}

		if (empty($tipo)) {
			$tipoError ='Por favor introduzca el tipo del Articulo';
			$valid = false;
		}

		if (empty($marca)) {
			$marcaError ='Por favor introduzca la Marca';
			$valid = false;
		}
		
		if (empty($descripcion)) {
			$descripcionError = 'haga una descripcion';
			$valid = false;
		}

		if (empty($base)) {
			$baseError ='Por favor introduzca un precio base';
			$valid = false;
		}

		if (empty($publico)) {
			$publicoError ='Por favor introduzca un precio al publico';
			$valid = false;
		}

		f (empty($proveedor)) {
			$proveedorError ='Por favor introduzca el proveedor';
			$valid = false;
		}
		
		
		
		
		

	
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO articulo (nom,tipo,marca,descripcion,base,publico,proveedor values(?, ?, ?,?,?,? ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($nom,$tipo,$marca,$descripcion,$base,$publico,$proveedor));
			Database::disconnect();
			header("Location: ../articulo.php");
		}
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
		    			<h3>Create a Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="createproveedor.php" method="post">
					  <div class="control-group <?php echo !empty($nomError)?'error':'';?>">
					    <label class="control-label">Nombre Del Producto</label>
					    <div class="controls">
					      	<input name="nom" type="text"  placeholder="Nombre del Producto" value="<?php echo !empty($nom)?$nom:'';?>">
					      	<?php if (!empty($nomError)): ?>
					      		<span class="help-inline"><?php echo $nomError;?></span>
					      	<?php endif; ?>
					    </div>
					    </div>

					     <div class="control-group <?php echo !empty($tipoError)?'error':'';?>">
					    <label class="control-label">Tipo</label>
					    <div class="controls">
					      	<input name="tipo" type="text"  placeholder="tipo" value="<?php echo !empty($tipo)?$tipo:'';?>">
					      	<?php if (!empty($tipoError)): ?>
					      		<span class="help-inline"><?php echo $tipoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>


					<div class="control-group <?php echo !empty($marcaError)?'error':'';?>">
					    <label class="control-label">marca Del Proveeedor</label>
					    <div class="controls">
					      	<input name="marca" type="text"  placeholder="marca del Proveedor" value="<?php echo !empty($marca)?$marca:'';?>">
					      	<?php if (!empty($marcaError)): ?>
					      		<span class="help-inline"><?php echo $marcaError;?></span>
					      	<?php endif; ?>
					    </div>
					    </div>

					  <div class="control-group <?php echo !empty($descripcionError)?'error':'';?>">
					    <label class="control-label">descripcion Del proveedor</label>
					    <div class="controls">
					      	<input name="descripcion" type="text" placeholder="descripcion Del proveedor" value="<?php echo !empty($descripcion)?$descripcion:'';?>">
					      	<?php if (!empty($descripcionError)): ?>
					      		<span class="help-inline"><?php echo $descripcionError;?></span>
					      	<?php endif;?>
					    </div>

					    </div>
					  <div class="control-group <?php echo !empty($baseError)?'error':'';?>">
					    <label class="control-label">base Del marca</label>
					    <div class="controls">
					      	<input name="base" type="text" placeholder="base Del marca" value="<?php echo !empty($base)?$base:'';?>">
					      	<?php if (!empty($baseError)): ?>
					      		<span class="help-inline"><?php echo $baseError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>


					  <div class="control-group <?php echo !empty($publicoError)?'error':'';?>">
					    <label class="control-label">base Del marca</label>
					    <div class="controls">
					      	<input name="publico" type="text" placeholder="precio publico del articulo" value="<?php echo !empty($publico)?$publico:'';?>">
					      	<?php if (!empty($publicoError)): ?>
					      		<span class="help-inline"><?php echo $publicoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($proveedorError)?'error':'';?>">
					    <label class="control-label">base Del marca</label>
					    <div class="controls">
					      	<input name="proveedor" type="text" placeholder="precio publico del articulo" value="<?php echo !empty($proveedor)?$proveedor:'';?>">
					      	<?php if (!empty($proveedorError)): ?>
					      		<span class="help-inline"><?php echo $proveedorError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  

					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>