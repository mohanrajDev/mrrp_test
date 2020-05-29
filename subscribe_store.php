<?php
require_once('./student_course.class.php');
$student = new StudentCourse();

$existing_list = $student->get();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];

    $result = $student->insert([
        'student_id' => $student_id,
        'course_id' => $course_id
    ]);
    
    if($result) {
        header("Location: reports.php");
        exit();
    } else {
       throw new Exception("Query Exception");
    }
} catch (Exception $e) {
    echo $e;
}