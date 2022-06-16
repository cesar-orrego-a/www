<?php
session_start();
include('../db_conf.php');
$sql = "DELETE FROM customers where CustomerID = '".$_GET['id']."'";

$first_letter = substr($_GET['id'], 0, 1);

#Para poder utilizar transacciones, las tablas deben tener el motor 'InnoDB'
#En clase no funcionó porque la tabla de customers tenía el motor 'MyIsam'

# con sql2 mal construiodo (levanta una Exception) no elimina ningún registro
#$sql2 = "DELETE FROM customersu where CustomerID like '".$first_letter."%'";
# con sql2 correctamente construido elimina el registro y sus 'relacionados'
$sql2 = "DELETE FROM customers where CustomerID like '".$first_letter."%'";
$error = '';

try{
  mysqli_begin_transaction($con);
  $result = mysqli_query($con, $sql);
  #$result2 = mysqli_query($con, $sql2);
  mysqli_commit($con);
}catch(Throwable $e){
  mysqli_rollback($con);
}

$_SESSION["alert"] = 'Cliente eliminado correctamente. ';
header("location: index.php")
 ?>
