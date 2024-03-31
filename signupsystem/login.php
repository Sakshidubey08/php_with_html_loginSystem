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
    $login=false;
    $showError=false;
    $email = $_POST["email"];
    $password = $_POST["password"];

      
        $sql = "Select * from users where email= '$email'";
        $result = mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        if($num==1){
          while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password,$row['password'])){
            $login =true;
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are Logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
           header("location:welcome.php");
            }
            else{
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong>Invalid Credentials.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
          }
        }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>Invalid Credentials.
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

    <title>Login</title>
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
        <h2>Login</h2>
    <form action ='/signupsystem/login.php' method="post">
    <div class="mb-3 my-4 col-md-6" >
  <label for="email" class="form-label">Mobile number or email address</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 my-4 col-md-6" >
  <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary col-md-6">Login</button>
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