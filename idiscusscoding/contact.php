<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Welcome to iDiscuss - Coding Forums</title>
    <style>
    .container {
        min-height: 87vh;
    }
    </style>
</head>

<body>

    <style>
    body {
        background-color: #e3e0cf;
    }
    </style>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>


    <?php
$showAlert = false;
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){
    // Insert into thread db

    $user_name= $_POST['name'];
    $user_email= $_POST['email'];
    $user_pn= $_POST['number'];
    $user_mes= $_POST['text'];

    $sql="INSERT INTO `contacts` (`name`, `email`, `phone_no`, `Message`) VALUES ('$user_name', '$user_email', '$user_pn', '$user_mes')";
    $result = mysqli_query($conn, $sql);
    $showAlert = true;
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your entry has been submitted successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
      }
      else{
          // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
      }
}
    ?>

    <?php
     echo '<div class="container my-3">
        <h1 class="text-center"><b>Contact Us</b></h1>
        <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
            <div class="form-group">
                <label for="name"><b> Your Name</b></label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"
                    placeholder="Enter Your Name">
            </div>

            <div class=" form-group">
                <label for="exampleFormControlInput1"><b>Your Email</b></label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                    placeholder="name@example.com">
            </div>


            <div class="form-group">
                <label for="exampleFormControlInput1"><b>Your Phone Number</b></label>
                <input type="tel" name="number" class="form-control" id="exampleFormControlInput1"
                    placeholder="enter your phone number" pattern"[0-9] {3}-[0-9] {2}-[0-9] {3}">
            </div>







            <div class="form-group">
                <label for="exampleFormControlTextarea1"><b>Describe what you want to contact me for here</b> </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="text" placeholder="Your Message"
                    rows="3"></textarea>
            </div>

            <button class="btn btn-success">Submit</button>
        </form>

    </div>';

?>

    <?php include 'partials/_footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>