<?php


include dirname(dirname(dirname( __FILE__))).'/common/utiles.php';
include dirname(dirname(dirname( __FILE__))).'/common/config.php';
include dirname(dirname(dirname( __FILE__))).'/common/mysql.php';
#conectamos con la bae de datos
$connection = Connect( $config['database']);

//obtenemos los datos de las fotos qye buscamos
$sql="select * from authors where id=".$_GET['id']." ";
$rows_f= ExecuteQuery($sql,$connection);

$rows_f=$rows_f[0];


if($rows_f['enabled']==0){
    $enabled=0;
    }
    else{ $enabled=1;}
//debug($rows_f);

Close( $connection);
?>




<div class="container">
    <div class="row">
 
      <div class="col-lg-12 text-lett">
        <h2 class="mt-5">Editar Usuario</h2>
      </div>
  
    </div>
    <div class="row form_new">
      <div class="col-lg-2 text-left"></div>
      <div class="col-lg-10 text-left">
       
        <form role="form" action="actions/edit_user.act.php" method="post" enctype="multipart/form-data">

          <input type="hidden" name="id" id="id" value="<?php echo $rows_f['id']; ?>">
         

          <div class="form-group row">
            <label for="name" class="col-lg-2 col-form-label">Nombre</label>
             
              <div class="col-lg-4 text-lett">
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo $rows_f['name']; ?>">
            </div>
           
          </div>

          <div class="form-group row">
            <label for="fichero" class="col-lg-2 col-form-label">Email</label>
             
              <div class="col-lg-4 text-lett">
              <input type="text" class="form-control" id="email" name="email"
               value="<?php echo $rows_f['email']; ?>">
           
            </div>
           
          </div>


          <div class="form-group row">
            <label for="size" class="col-lg-2 col-form-label">Nueva Contraseña</label>
             
              <div class="col-lg-4 text-lett">
                <input type="password" class="form-control" id="password" name="password">  
                <i>(En caso de no poner nada, se mantendra la contraseña)</i>
              </div>
           
          </div>
          <div class="form-group row">
            <label for="size" class="col-lg-2 col-form-label">Repetir Contraseña</label>
             
              <div class="col-lg-4 text-lett">
                <input type="password" class="form-control" id="passwordRepe" name="passwordRepe">  
              </div>
           
          </div>


          <div class="form-group row">
            <label for="enabled" class="col-lg-2 col-form-label">Activado</label>
             
              <div class="col-lg-6 text-center">
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