<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    id:<input type="text" name="id">
    name:<input type="text" name="name">
    age:<input type="age" name="age">
    address:<input type="address" name="address">
    <input type="submit" value="add">
</form>
<?php
include_once "Student.php";
include_once "StudentManager.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];

    $student = new Student($id,$name,$age,$address);
    $studentManager = new StudentManager();

    $studentManager->addStudent($student);

    header("location:index.php");
}
?>
</body>
</html>