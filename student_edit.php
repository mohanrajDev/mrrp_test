<?php
    require_once('./student.class.php');
    $student = new Student();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $id = $_GET['id'];
    $student_data = $student->find($id);
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
            <a href="student_lists.php" class="btn btn-secondary">Students Lists</a>
        </div>
        <div class="row">
            <div class="col-md-12">
            <h2>Students Form</h2>
              <div class="col-md-6">
                <form method="post" action="student_store.php?type=update&id=<?php echo $student_data->id; ?>">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" 
                        value="<?php echo $student_data->first_name; ?>"
                        id="first_name" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" 
                        value="<?php echo $student_data->last_name; ?>"
                        id="last_name" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="dob">DOB</label>
                        <input type="date" class="form-control" 
                        value="<?php echo $student_data->dob; ?>"
                        id="dob" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No</label>
                        <input type="number" class="form-control" 
                        value="<?php echo $student_data->contact_no; ?>"
                        id="contact_no" name="contact_no">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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