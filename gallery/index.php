<?php

include "common/utiles.php";
include "common/config.php";
include "common/mysql.php";
# conectamos con la base de datos
$connection = Connect( $config['database']);
$sql  = "select * from images where enabled=1 order by id asc";
$rows = ExecuteQuery( $sql, $connection);
Close($connection);

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>La galeria del willy</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
    <style>
   

    .thumb{
      text-align: center;
    }

    
  img {
    -webkit-transition:all .9s ease; /* Safari y Chrome */
    -moz-transition:all .9s ease; /* Firefox */
    -o-transition:all .9s ease; /* IE 9 */
    -ms-transition:all .9s ease; /* Opera */
    width:100%;
    }
    img:hover  {
    -webkit-transform:scale(1.25);
    -moz-transform:scale(1.25);
    -ms-transform:scale(1.25);
    -o-transform:scale(1.25);
    transform:scale(1.8);
    margin:20px;
    z-index:1;
    }
    img {/*Ancho y altura son modificables al requerimiento de cada uno*/
      height:60%;
      width:50%;
      margin-left:80px;
      margin-right:80px;
      
    overflow:hidden;
    }
  
    </style>

    <!--- Secure Site Seal - DO NOT EDIT --->
<!---<span id="ss_img_wrapper_115-55_image_en"><a href="http://www.alphassl.com/ssl-certificates/wildcard-ssl.html" target="_blank" title="SSL Certificates"><img alt="Wildcard SSL Certificates" border=0 id="ss_img" src="//seal.alphassl.com/SiteSeal/images/alpha_noscript_115-55_en.gif" title="SSL Certificate"></a></span><script type="text/javascript" src="//seal.alphassl.com/SiteSeal/alpha_image_115-55_en.js"></script>
-->
<!--- Secure Site Seal - DO NOT EDIT --->

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Galeria de imagenes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/index.php?page=login">[ADM]</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/home.php?page=listado">Listado</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/home.php?page=autores">Autores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/home.php?page=new">Subir Imagen</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container page-content">
      <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>  
      <?php
      if(!empty($rows)){
        foreach($rows as $row){
          
          echo '<div class="col-lg-4 col-md-4 col-xs-6 thumb">  
          <span class="thumbnail" href="#">
            <img class="img-responsive css_img"  src="images/'.$row['file'].'" alt=""> 
          </span><b>'.$row['name'].'</b>
          <br>
          <span><i>'.$row['text'].'</i></span>
          </div>';
        }//fin bucle
      }//fin condicional
      ?>
      
      </div>
    </div>
    <!-- /.container -->
<br>
<br>
<br>
<br>
<br>

    <!-- Footer -->
    <footer class="py-5 bg-dark" style="bottom:5px">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018; Made by Ismael</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>

</html>
