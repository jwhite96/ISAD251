<?php

include_once '../src/model/dbContext.php';
session_start();

$db = new dbContext();

//removing item from menu
$productID = $_REQUEST['OFFSALE'];

$sql = "UPDATE products SET Status = 'Not on Sale' WHERE ProductID ='$productID'";
$statement = $db->connection->prepare($sql);
$statement->execute();

header("Location: admin.php");

//adding item to menu
$productID = $_REQUEST['ONSALE'];

$sql = "UPDATE products SET Status = 'On Sale' WHERE ProductID ='$productID'";
$statement = $db->connection->prepare($sql);
$statement->execute();

header("Location: admin.php");

//adding new item
$newName = $_REQUEST['NEWNAME'];
$newDescription = $_REQUEST['NEWDESCRIPTION'];
$newPrice = $_REQUEST['NEWPRICE'];
$newCategory = $_REQUEST['NEWCATEGORY'];
$newStatus = $_REQUEST['NEWSTATUS'];

$sql = "INSERT INTO products(Name, Description, Price, Category, Status)
VALUES ('$newName', '$newDescription', '$newPrice', '$newCategory', '$newStatus')";

$statement = $db->connection->prepare($sql);
$statement->execute();

header("Location: admin.php");