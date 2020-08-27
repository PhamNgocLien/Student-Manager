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
<a href="add.php">Add new student</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
    </tr>
    <?php
    include_once "Student.php";
    include_once "StudentManager.php";
    $studentManager = new StudentManager();
    $students = $studentManager->getAll();
    foreach ($students as $key=>$student){
    ?>
    <tr>
        <td><?php echo $student->getId(); ?></td>
        <td><?php echo $student->getName(); ?></td>
        <td><?php echo $student->getAge(); ?></td>
        <td><?php echo $student->getAddress(); ?></td>
        <td><a href="delete.php?<?php echo $key; ?>">Delete</td>
        <td><a href="update.php?id=<?php echo $key; ?>">Edit</td>
    </tr>
    <?php } ?>
</table>
</body>
</html>