
<?php
include_once "Student.php";
include_once "StudentManager.php";

$index = $_GET["id"];
$studentManager = new StudentManager();

$student = $studentManager->getStudentByID($index);


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];

    $newStudent = new Student($id,$name,$age,$address);
    $studentManager = new StudentManager();

    $index = $_GET["id"];
    $studentManager->editStudent($index,$newStudent);

    header("location:index.php");
}

?>
<form method="post">
    id:<input type="text" name="id" value="<?php echo $student->getId(); ?>">
    name:<input type="text" name="name" value="<?php echo $student->getName(); ?>">
    age:<input type="age" name="age" value="<?php echo $student->getAge(); ?>">
    address:<input type="address" name="address" value="<?php echo $student->getAddress(); ?>">
    <input type="submit" value="Update">
</form>

