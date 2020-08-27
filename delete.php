<?php
include_once "Student.php";
include_once "StudentManager.php";

$id = $_GET["id"];
$studentManager = new StudentManager();
$studentManager->deleteStudent($id);
header("location:index.php");
