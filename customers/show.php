<?php
  include '../header.php';
  echo $header_html;
  $sql = "SELECT * FROM customers where CustomerID = '".$_GET['id']."'";
  $result = mysqli_query($con, $sql);
  $customer = mysqli_fetch_array($result);
 ?>
 <div class="container-fluid p-5 bg-primary text-white text-center">
   <h1><?php echo $customer['CompanyName']; ?></h1>
   <p><?php echo $customer['CustomerID']; ?></p>
 </div>

 <div class="container mt-5">
   <div class="row">
     <div class="col-sm-2"><a href="./index.php">Volver</a></div>
     <div class="col-sm-8">
       <h3>Detalle</h3>
     </div>
   </div>
   <div class="row">
     <div class="col-sm-2">&nbsp;</div>
     <div class="col-sm-8">

       <div class="row">
         <div class="col-sm-2">Contacto</div>
         <div class="col-sm-8">
           <?php echo $customer['ContactName']; ?>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-2">Titulo Contacto</div>
         <div class="col-sm-8">
           <?php echo $customer['ContactTitle']; ?>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-2">Dirección</div>
         <div class="col-sm-8">
           <?php echo $customer['Address']; ?>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-2">Ciudad</div>
         <div class="col-sm-8">
           <?php echo $customer['City']; ?>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-2">Región</div>
         <div class="col-sm-8">
           <?php echo $customer['Region']; ?>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-2">Código postal</div>
         <div class="col-sm-8">
           <?php echo $customer['PostalCode']; ?>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-2">País</div>
         <div class="col-sm-8">
           <?php echo $customer['Country']; ?>
         </div>
       </div>
     </div>
   </div>
 </div>
