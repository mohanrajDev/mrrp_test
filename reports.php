<?php

require_once('./student.class.php');

$report = new Student();

$report_lists = $report->getCourseList();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Student Course List</title>
  </head>
  <body>
    <div class="container">
             <div class="row">
        <div class="col-md-12 m-4">
            <a href="index.php" class="btn btn-primary">Home</a>
            <a href="student_course_form.php" class="btn btn-secondary">Subscribe Form</a>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <h2>Report</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Course</th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                   foreach($report_lists as $student) { 
                       $student = (object) $student;                  
                   ?>  
                    <tr>
                        <td><?php echo $student->student_first_name .' '. $student->student_lasst_name;?></td>
                        <td><?php echo $student->course_name;?></td>
                    </tr>  
                <?php } ?>                
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>