<?php
require "db.php" ;

$first = $_GET["FName"];

$last = $_GET["LName"];

$email = $_GET["EmailAddress"];

$phone = $_GET["Phone"];

$pass = $_GET["Password"];

$bday = $_GET["Bday"];

$gender = $_GET["Sex"];

$sql = "INSERT INTO ba286.accounts (email, fname, lname,phone, birthday,
		gender,password) VALUES (:email, :first, :last, :phone, :bday, :gender, :pass)";
$results = runQuery($sql);
	header("Location: index.php");


$category_id = 70;

$query = "INSERT INTO ba286.accounts
             (email, fname, lname,phone, birthday,
		gender,password)
          VALUES
             (:category_id, :email, :first, :last, :phone, :bday, :gender, :pass)";

$statement = $db->prepare($query);
$statement->bindValue(':category_id', $_REQUEST['$category_id']);
$statement->bindValue(':email', $_REQUEST['email']);
$statement->bindValue(':first', $_REQUEST['first']);
$statement->bindValue(':last', $last);
$statement->bindValue(':phone', $phone);
$statement->bindValue(':bday', $bday);
$statement->bindValue(':gender', $gender);
$statement->bindValue(':pass', $pass);
$statement->execute();
$statement->closeCursor();

?>