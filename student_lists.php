<?php

require_once('./student.class.php');

$student = new Student();

$student_lists = $student->get();


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
            <a href="student_form.php" class="btn btn-secondary">Student Form</a>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <h2>Students List</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Contact No</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                   <?php 
                   foreach($student_lists as $student) { 
                       $student = (object) $student;                  
                   ?>  
                    <tr>
                        <th scope="row"><?php echo $student->id;?></th>
                        <td><?php echo $student->first_name;?></td>
                        <td><?php echo $student->last_name;?></td>
                        <td><?php echo $student->dob;?></td>
                        <td><?php echo $student->contact_no;?></td>
                        <td>
                            <a href="student_edit.php?id=<?php echo $student->id?>" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form  method="post" action="student_store.php?type=delete&id=<?php echo $student->id; ?>">
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