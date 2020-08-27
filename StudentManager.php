<?php
include_once "Student.php";

class StudentManager
{
    public $studentList;
    public $filePath = "data.json";

    public function __construct()
    {
        $this->studentList = [];
    }

    public function addStudent($student)
    {
        $this->studentList = $this->readFile();
        $arr = [
            "id" => $student->getId(),
            "name" => $student->getName(),
            "age" => $student->getAge(),
            "address" => $student->getAddress()
        ];
        array_push($this->studentList, $arr);
        $this->saveFile($this->studentList);

    }

    public function deleteStudent($id)
    {
        $this->studentList = $this->readFile();
        array_splice($this->studentList, $id, 1);
        $this->saveFile($this->studentList);
    }

    public function getStudentByID($id)
    {
        $this->studentList = $this->getAll();
        return $this->studentList[$id];
    }

    public function editStudent($id, $student)
    {
        $this->studentList = $this->readFile();
        $this->studentList[$id] = [
            "id" => $student->getId(),
            "name" => $student->getName(),
            "age" => $student->getAge(),
            "address" => $student->getAddress()
        ];
        $this->saveFile($this->studentList);
    }

    public function getAll()
    {
        $arr = $this->readFile();
        $this->studentList = [];
        foreach ($arr as $item) {
            $student = new Student($item->id, $item->name, $item->age, $item->address);
            array_push($this->studentList, $student);
        }
        return $this->studentList;
    }

    public function readFile()
    {
        $dataJson = file_get_contents($this->filePath);
        return json_decode($dataJson);
    }

    public function saveFile($data)
    {
        $dataJson = json_encode($data);
        file_put_contents($this->filePath, $dataJson);
    }
}