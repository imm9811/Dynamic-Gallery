<?php


include dirname(dirname(dirname( __FILE__))).'/common/utiles.php';
include dirname(dirname(dirname( __FILE__))).'/common/config.php';
include dirname(dirname(dirname( __FILE__))).'/common/mysql.php';
#conectamos con la bae de datos
$connection = Connect( $config['database']);
//obtenemos listado de autores
$sql="select * from authors order by id asc";

$rows = ExecuteQuery( $sql, $connection);

//debug($rows);

//obtenemos los datos de las fotos qye buscamos
$sql_foto="select * from images where id=".$_GET['id']."   ";
$rows_f= ExecuteQuery($sql_foto,$connection);

$rows_f=$rows_f[0];

if($rows_f['text']==0){
$enabled=0;
}
else{ $enabled=1;}


//debug($rows_f);

Close( $connection);
?>




<div class="container">
    <div class="row">

      <div class="col-lg-12 text-lett">
        <h2 class="mt-5">Editar foto</h2>
      </div>
  
    </div>
    <div class="row form_new">
      <div class="col-lg-2 text-left"></div>
      <div class="col-lg-10 text-left">
       
        <form role="form" action="actions/edit_foto.act.php" method="post" enctype="multipart/form-data">

          <input type="hidden" name="id" id="id" value="<?php echo $rows_f['id']; ?>">
          <div class="form-group row">
            <label for="author_id" class="col-lg-2 col-form-label">Autor</label>
             
              <div class="col-lg-4 text-lett">
                <select  class="form-control" name=author_id id=author_id>
                    <?php
                      foreach ( $rows as $row) 
                      {
                        if ( $row[0] == $rows_f['author_id'])
                        {
                          echo "<option value= ".$row[0]." selected>".$row[1]."</option>";
                        }
                        else
                        {
                          echo "<option value= ".$row[0].">".$row[1]."</option>";
                        }
                        
                      }

                    ?>

                </select>
            </div>
           
          </div>

          <div class="form-group row">
            <label for="name" class="col-lg-2 col-form-label">Nombre</label>
             
              <div class="col-lg-4 text-lett">
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo $rows_f['name']; ?>">
            </div>
           
          </div>

          <div class="form-group row">
            <label for="fichero" class="col-lg-2 col-form-label">Fichero</label>
             
              <div class="col-lg-4 text-lett">
                <input type="file" class="form-control" id="fichero" name="fichero" placeholder="">
                <?php echo $rows_f['file']; ?>
            </div>
           
          </div>


          <div class="form-group row">
            <label for="size" class="col-lg-2 col-form-label">Texto</label>
             
              <div class="col-lg-4 text-lett">
                <textarea rows="5" cols="60" id="text" name="text"><?php echo $rows_f['text']; ?></textarea>
            </div>
           
          </div>

          <div class="form-group row">
            <label for="enabled" class="col-lg-2 col-form-label">Activado</label>
             
              <div class="col-lg-3 text-lett">
                <input type="checkbox"  id="enabled" name="enabled" <?php echo $enabled; ?>>(Para desactivar dejar la casilla vacia)
            </div>
            
          </div>



          <br><br>
          <button type="submit" class="btn btn-primary" style="width:100%; height:20%">Enviar</button>

        </form>

        <br><br><br>
    <br>
    <br>
    <br>
      </div>
     
    </div>

  </div>