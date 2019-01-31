<?php
//function que conecta la pagina con la base de datos, en la cual se pasa un array con los valores

function Connect( $config = array()) 
{

  $conn = mysqli_connect( $config['host'], $config['username'], $config['password'], $config['database']);
  mysqli_set_charset( $conn, $config['encoding']);

  return ( $conn);

}

//funcion lanza consultas a la bd(insert o update)

function Execute( $sql, $conn) 
{
  $return = mysqli_query( $conn, $sql);
  return ( $return);
}



//funcion que lanza consultas, la parametriza, y me devuelve el resultado en forma de array o un null en caso de no haber resultado

function ExecuteQuery( $sql, $conn) 
{      

  $result = mysqli_query( $conn, $sql);
  if  ( $row = mysqli_fetch_array( $result, MYSQLI_BOTH)) 
  {
	do 
	{   
	  $data[] = $row;
	}
	while ( $row = mysqli_fetch_array( $result, MYSQLI_BOTH));
  }
  else 
  {
	$data = null;
  }

  mysqli_free_result( $result);
  return ( $data);

}

//funcion que cierra la conexion
function Close( $conn) 
  {
    mysqli_close( $conn);
    unset ( $conn);
  }

?>	