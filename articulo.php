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
					<a href="php/createarticulo.php" class="btn btn-success">Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Nombre</th>
		                  <th>Tipo</th>
		                  <th>Marca</th>
		                  <th>Descripcion</th>
		                  <th>Precio Base</th>
		                  <th>Precio Publico</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM articulo ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
						   		echo '<td>'. $row['nom'] . '</td>';
							   	echo '<td>'. $row['tipo'] . '</td>';
							   	echo '<td>'. $row['marca'] . '</td>';
							   	echo '<td>'. $row['descripcion'] . '</td>';
							   	echo '<td>'. $row['base'] . '</td>';
							   	echo '<td>'. $row['publico'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="php/readarticulo.php?id='.$row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="php/updatearticulo.php?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="php/deletearticulo.php?id='.$row['id'].'">Delete</a>';
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