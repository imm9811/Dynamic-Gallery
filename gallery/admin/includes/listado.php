<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>listado</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>		
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	 <script type="text/javascript">
  
  function delete_post( id)
  {
    var ok = confirm( "¿ Seguro de borrar esta imagen ? ");
    if ( !ok)
    {
      return false;
    }
    else
    {
      location.href = "includes/delete.php?page=listado&id="+ id;
    }
  }
</script>

  <style>
  .glyphicon-pencil{
	  color:white;
  }
	.glyphicon-remove{
		color:red;
	}

  </style>

</head>
<body>

<div class="container">
	
	<div class="row">
		<h1>Pagina listado</h1>
		<a class="btn btn-lg btn-warning" href="home.php?page=new">Nueva Foto</a>
	</div>
	
</div>

    <div class="row cuadro_listado_fotos">
      <div class="col-sm-10 offset-sm-1">

        <table class="table table-dark table-hover desenfoque no-border">
          <thead class="no-border">
            <tr class="no-border">
              <th scope="col">#</th>
              <th scope="col">Nombre autor</th>
              <th scope="col">Fichero</th>
              <th scope="col">Creado</th>
              <th class="text-center" scope="col">Activo</th>
              <th class="text-center" scope="col">Editar</th>
              <th class="text-center" scope="col">Eliminar</th>
            </tr>
            </tr>
          </thead>
          <tbody>
            <?php
              if ( !empty( $rows))
              {
				foreach ( $rows as $row) 
				{
					echo '
					<td>'.$row['id'].'</td>
					<td>'.$row['tutor'].'</td>
					<td>'.$row['name'].'</td>
					<td>'.date( "d/m/Y H:s:i", strtotime( $row['created'])).'</td>';
					
					if($row['enabled']==1){
					
					echo '<td class="text-center"><a href="home.php?page=editarFoto&enabled='.$row['enabled'].'"><span class="glyphicon glyphicon-certificate" style="color:green"></span></a></td>
					
					';
				} 
					
					else{
						echo '<td class="text-center"><a href="home.php?page=editarFotot&enabled='.$row['enabled'].'"><span class="glyphicon glyphicon-certificate" style="color:red"></span></a></td>
					';
				}
					
				echo '<td class="text-center"><a href="home.php?page=editarFoto&id='.$row['id'].'"><span class="glyphicon glyphicon-pencil"></span></a></td>
					<td class="text-center" ><a href="#" OnClick="delete_post('.$row['id'].')"><span class="glyphicon glyphicon-remove" style:"color:red"></span></a></td>
					</tr>
					';  
				}
              }
              else
              {
                echo "<tr><td colspan=7> No hay registros</td></tr>";
              }
            ?>


          </tbody>
        </table>

      </div>
    </div>
    
  </div>
</body>
</html>