<?php
session_start();

if(isset($_SESSION["cart"][$_GET["id"]])){
  if(isset($_GET["remove_all"])){
    unset($_SESSION["cart"][$_GET["id"]]);
  }else{
    $_SESSION["cart"][$_GET["id"]]["qty"]--;
  }
  if($_SESSION["cart"][$_GET["id"]]["qty"] <1){
    unset($_SESSION["cart"][$_GET["id"]]);
  }
}
$_SESSION["alert"] = 'Cliente eliminado del carrito correctamente. ';
header("location: index.php")

 ?>
