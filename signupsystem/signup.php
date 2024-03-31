<?php
$servername = "localhost";
$username ="root";
$password ="";
$database = "users";

$conn =mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo "not connected".mysqli_connect_error();
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $showAlert=false;
    $showError=false;
    $username = $_POST["username"];
    $email = $_POST["email"];
    
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $date = $_POST["date"];
    $exists = false;
    if(($password==$cpassword) && $exists==false){
        $hash= password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` ( `username`, `email`, `password`, `date`) VALUES ( '$username', '$email', '$hash', '2024-03-24 15:01:57');";
        $result = mysqli_query($conn,$sql);
        if($result){
           echo '
           <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Success!</strong> Your account is now created and you can login.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Wrong password!</strong>passwords do not match
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SignUp!</title>
  </head>
  <body>
    <?php
    
//     if($showAlert){
//     echo '
//   <div class="alert alert-success alert-dismissible fade show" role="alert">
//   <strong>Success!</strong> Your account is now created and you can login.
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';}
?>
    <div class="container my-4">
        <h2>Sign Up</h2>
        <h4>It's quick and easy</h4>
    <form action ='/signupsystem/signup.php' method="post">
  <div class="mb-3 my-4 col-md-6" >
    <label for="username" class="form-label">Username</label>
    <input type="username" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 my-4 col-md-6" >
  <label for="email" class="form-label">Mobile number or email address</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 my-4 col-md-6" >
  <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 my-4 col-md-6" >
  <label for="cpassword" class="form-label"> Confirm Password</label>
    <input type="cpassword" class="form-control" id="cpassword" name="cpassword" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 my-4 col-md-6" >
  <label for="password" class="form-label">Date of birth</label>
  <input type="date" id="date" name="date">
  </div>
  <button type="submit" class="btn btn-primary col-md-3">Signup</button> 
  <button style="background-color:btn btn-primary "><a style="text-decoration:none" href="login.php">Login</a></button>

  
</form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>