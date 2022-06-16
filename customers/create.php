<?php
session_start();
include('../db_conf.php');
$customer_id = $_POST['CustomerID'];
$company_name = $_POST['CompanyName'];
$contact_name = $_POST['ContactName'];
$contact_title = $_POST['ContactTitle'];
$address = $_POST['Address'];
$city = $_POST['City'];
$region = $_POST['Region'];
$postal_code = $_POST['PostalCode'];
$country = $_POST['Country'];

$errors = array();
function validate_customer_id(){

  global $con, $customer_id, $errors;
  if (trim($customer_id) == ''){
    $errors["CustomerID"] = "CustomerID no puede ser vacío";
  }else{
    $sql_uniqness_validation = "SELECT * from customers where CustomerID = '".$customer_id."'";
    $result = mysqli_query($con, $sql_uniqness_validation);
    if (mysqli_num_rows($result) > 0){
      $errors["CustomerID"] = "CustomerID no puede repetirse";
    }
  }
}

validate_customer_id();
$_SESSION["errors"] = $errors;
if(count($errors) == 0){
  $sql = "INSERT INTO customers (CustomerID, CompanyName, ContactName, ContactTitle, Address, City, Region, PostalCode, Country) VALUES ('".$customer_id."', '".$company_name."', '".$contact_name."', '".$contact_title."', '".$address."', '".$city."', '".$region."', '".$postal_code."', '".$country."')";
  $result = mysqli_query($con, $sql);
  header("location: index.php");
}else{
  $_SESSION["values"]['CustomerID'] = $customer_id;
  $_SESSION["values"]['CompanyName'] = $company_name;
  $_SESSION["values"]['ContactName'] = $contact_name;
  $_SESSION["values"]['ContactTitle'] = $contact_title;
  $_SESSION["values"]['Address'] = $address;
  $_SESSION["values"]['City'] = $city;
  $_SESSION["values"]['Region'] = $region;
  $_SESSION["values"]['PostalCode'] = $postal_code;
  $_SESSION["values"]['Country'] = $country;
  header("location: new.php");
}




 ?>
