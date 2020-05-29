<?php
require_once('./course.class.php');
$course = new Course();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$type = $_GET['type'];

if($type=="store") {
    try {
    $name = $_POST['name'];
    $details = $_POST['details'];

    $course_result = $course->insert([
    'name' => $name,
    'details' => $details,
    ]);

    if($course_result) {   
        header("Location: course_lists.php");
        exit();
    }

    } catch (Exception $e) {
        echo $e;
    }
}

if($type=="update") {
    try {
    $name = $_POST['name'];
    $details = $_POST['details'];

    $id = $_GET['id'];

    $course_result = $course->update($id, [
    'name' => $name,
    'details' => $details,
    ]);

    if($course_result) {   
        header("Location: course_lists.php");
        exit();
    }

    } catch (Exception $e) {
        echo $e;
    }
}

if($type=="delete") {
    try {
        $id = $_GET['id'];
            
        $course_result = $course->delete($id);

        if($course_result) {   
            header("Location: course_lists.php");
            exit();
        }    
    } catch (Exception $e) {
        echo $e;
    }
    
}
