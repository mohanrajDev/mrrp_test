<?php

require_once('./course.class.php');

$course = new Course();

$course_lists = $course->get();
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
            <a href="course_form.php" class="btn btn-secondary">Course Form</a>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <h2>Course List</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course Details</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                   foreach($course_lists as $course) { 
                       $course = (object) $course;                  
                   ?>  
                    <tr>
                        <th scope="row"><?php echo $course->id;?></th>
                        <td><?php echo $course->name;?></td>
                        <td><?php echo $course->details;?></td>
                        <td>
                            <a href="course_edit.php?id=<?php echo $course->id?>" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form  method="post" action="course_store.php?type=delete&id=<?php echo $course->id; ?>">
                                <button href="button" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
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