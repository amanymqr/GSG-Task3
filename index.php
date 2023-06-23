<?php

require 'student.php';
require 'course.php';
require 'manager.php';

use Task\Student;
use Task\Course;
use Task\Manager;

$student1 = new Student('Amany MQ', 'amany@gmail.com');
$student2 = new Student('Tareq MQ', 'tareq@gmail.com');
$student3 = new Student('Farah MQ', 'farah@gmail.com');

$course1 = new Course('front-end');
$course2 = new Course('laravel');


// assain coutse to stu
$student1->courses[] = $course1;
$student2->courses[] = $course2;
$student3->courses[] = $course2;

$manager = new Manager();


// test addStudent
$manager->addStudent($student1);
$manager->addStudent($student2);
$addedStudent=$manager->addStudent($student3);
echo 'Added Student: ID ' . $addedStudent->id . ', Name: ' . $addedStudent->name;
echo"<br>";



//to get student by ID
$retrieveByIdStudent = $manager->getStudentByID($student2->id);
if ($retrieveByIdStudent) {
    echo 'Found student by id: ' . $retrieveByIdStudent->name;
} else {
    echo 'Student not found.';
}

// Update student
$student1->name = 'Amany Moneer Qreqea';
$manager->updateStudent($student1);
echo"<br>";



// Delete student
$deletedStudent = $manager->deleteStudent($student2);
echo 'Deleted Student: ID ' . $deletedStudent->id . ', Name: ' . $deletedStudent->name . PHP_EOL;
echo"<br>";



echo 'All Students:<br>' ;
$students = $manager->getAllStudents();
foreach ($students as $student) {
    echo 'ID: ' . $student->id . ', Name: ' . $student->name . ', Email: ' . $student->email . "<br>";
}