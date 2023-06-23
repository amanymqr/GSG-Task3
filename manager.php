<?php

namespace Task;


trait Loggable 
{
    public function log($message)
    {
        $logFile = fopen('log.txt', 'a');
        fwrite($logFile, $message . PHP_EOL);
        fclose($logFile);
    }
}


class Manager
{
    use Loggable;
    private $students = [];
    public function addStudent(Student $student)
    {
        $this->students[$student->id] = $student;
        $this->log('Added student with ID: ' . $student->id);
        return $student;

    }

    public function getStudentByID($id)
    {
        if (isset($this->students[$id])) {
            return $this->students[$id];
        }
        return null;
    }


// Updated student with id
    public function updateStudent(Student $student)
    {
        if (isset($this->students[$student->id])) {
            $this->students[$student->id] = $student;
            $this->log('Updated Student: ID ' . $student->id . ' , Name: ' . $student->name);
        }
    }
    

// deleted student with id
public function deleteStudent(Student $student)
{
    $studentId = $student->id;
    $deletedStudent = $this->students[$studentId];
    unset($this->students[$studentId]);
    $this->log('Deleted Student: ID ' . $deletedStudent->id . ', Name: ' . $deletedStudent->name );
    return $deletedStudent;

}




public function getAllStudents()
{
    return $this->students;
}}   