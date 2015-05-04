<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<h3>PHP CRUD Grid</h3>
    		</div>
			<div class="row">
				<p>
					<a href="php/createproveedor.php" class="btn btn-success">Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Nombre del Proveedor</th>
		                  <th>Direccion </th>
		                  <th>Nombre del Encargado</th>
		                  <th>Telefono</th>
		                  <th>Telefono Del Encargado</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM proveedor ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['nombre'] . '</td>';
							   	echo '<td>'. $row['direccion'] . '</td>';
							   	echo '<td>'. $row['encargado'] . '</td>';
							   	echo '<td>'. $row['telefono'] . '</td>';
							   	echo '<td>'. $row['celular'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="php/readproveedor.php?id='.$row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="php/updateproveedor.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="php/deleteproveedor.php?id='.$row['id'].'">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>