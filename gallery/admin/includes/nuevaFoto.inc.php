

<?php
  include dirname( dirname( dirname( __FILE__))) . "/common/utiles.php";
  include dirname( dirname( dirname( __FILE__))) . "/common/config.php";
  include dirname( dirname( dirname( __FILE__))) . "/common/mysql.php";
  # conectamos con la base de datos
  $connection = Connect( $config['database']);
  $sql  = "select * from authors order by name asc";
  $rows = ExecuteQuery( $sql, $connection);
Close($connection);

?>
<link rel="stylesheet" href="../../css/formulario.css">

<div class="container-fluid mt-4 text-dark">
<div class="row">
    <div class="col-sm-6 offset-sm-3 text-center p-4 rounded">
        <div class="container" style="padding:-30px">
            <h2 class="text-dark text-left">Subir foto</h2>
            <br>
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                <form role="form" action="actions/subirFotoSql.act.php" id="formulario" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                    <label for="author_id" class="col-lg-2 col-form-label">Autor</label>
                    
                        <div class="col-lg-4 text-lett">
                        
                        <select  class="form-control" name="id_author" id="id_autor">
                            <?php
                                foreach ( $rows as $row) 
                                {
                                echo "<option value= ".$row[0].">".$row[1]."</option>";
                                }
                            ?>

                        </select>

                    </div>
                    
                    </div>

                    <div class="form-group row">
                    <label for="name" class="col-lg-2 col-form-label">Nombre</label>
                        <div class="col-lg-4 text-lett">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fichero" class="col-lg-2 col-form-label fichero">Fichero</label>
                        <div class="col-lg-4 text-center">
                        <div class="file-path-wrapper">
                            <input class="file-path validate btn" type="file" name="file" id="file" placeholder="Upload your file">
                        </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="size" class="col-lg-2 col-form-label texto">Texto &nbsp  </label> <br>
                            <div class="col-lg-4 text-lett">
                            <textarea rows="5" cols="30" id="text" name="text"></textarea>
                        </div>
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-primary">Enviar</button>

                    </form>
                </div>
            </div> <br>
            <br>
    <br>
    <br> 
        </div>
    </div>
</div>
</div>  <!-- Footer -->
    <footer class="py-5 bg-dark" style="bottom:5px">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018; Made by Ismael</p>
      </div>
      <!-- /.container -->
    </footer>