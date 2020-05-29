<?php
require_once('./student.class.php');
$student = new Student();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$type = $_GET['type'];

if($type=="store") {
    try {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = $_POST['dob'];
        $dob = date("Y-m-d", strtotime($dob));
        $contact_no = $_POST['contact_no'];
    
        $student_result = $student->insert([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'dob' => $dob,
        'contact_no' => $contact_no,
        ]);
    
        if($student_result) {   
            header("Location: student_lists.php");
            exit();
        }
    
    } catch (Exception $e) {
        echo $e;
    }
    
}

if($type=="update") {
    try {
        $id = $_GET['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = $_POST['dob'];
        $dob = date("Y-m-d", strtotime($dob));
        $contact_no = $_POST['contact_no'];
    
        $student_result = $student->update($id, [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'dob' => $dob,
        'contact_no' => $contact_no,
        ]);
    
        if($student_result) {   
            header("Location: student_lists.php");
            exit();
        }
    
    } catch (Exception $e) {
        echo $e;
    }
    
}


if($type=="delete") {
    try {
        $id = $_GET['id'];
            
        $student_result = $student->delete($id);

        if($student_result) {   
            header("Location: student_lists.php");
            exit();
        }    
    } catch (Exception $e) {
        echo $e;
    }
    
}

