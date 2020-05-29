<?php
    require_once('./course.class.php');
    require_once('./student.class.php');
    require_once('./student_course.class.php');

    $course = new Course();
    $student = new Student();

    $course_lists = $course->get();
    $student_lists = $student->get();
    

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    $sc = new StudentCourse();
    $r = $sc->find(1,10);
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
        <div class="col-md-12 m-4">
            <a href="index.php" class="btn btn-primary">Home</a>
            <a href="reports.php" class="btn btn-secondary">Reports</a>
        </div>
        <div class="row">
            <div class="col-md-12">
            <h2>Course  Subscribe Form</h2>
              <div class="col-md-6">
                <form method="post" action="subscribe_store.php">
                    <div class="form-group">
                        <label for="student_id">Select Student</label>
                        <select class="form-control" id="student_id" name="student_id">
                        <?php 
                        foreach($student_lists as $student) {
                            $student = (object) $student;
                        ?>
                        <option value="<?php echo $student->id;?>">
                             <?php echo ucwords($student->first_name . ' ' . $student->last_name);?>
                        </option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="course_id">Select Course</label>
                        <select class="form-control" id="course_id" name="course_id">
                        <?php 
                        foreach($course_lists as $course) {
                            $course = (object) $course;
                        ?>
                        <option value="<?php echo $course->id;?>">
                             <?php echo ucwords($course->name);?>
                        </option>
                        <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
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