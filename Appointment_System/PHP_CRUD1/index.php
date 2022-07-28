<?php 
// including connect.php file so that we can have access to database.
include('./partials/connect.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    // echo $username;
    $email=$_POST['email'];
    $password=$_POST['password'];
    $mobile=$_POST['mobile'];

    // password hasing
    $password_hash=password_hash($password,PASSWORD_DEFAULT);

    // if exist conditions
    $sql="Select * from `crud` where username='$username' or email='$email'";
    $selectresult=mysqli_query($con,$sql);
    $number=mysqli_num_rows($selectresult);
    if($number>0){
        echo "<script>alert('Email or username already exist')</script>";
    }else{
        $insert_query="insert into `crud` (username,email,password,mobile) values ('$username','$email','$password_hash','$mobile') ";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "Data inserted successfully";
            echo "<script>window.open('display.php','_self')</script>";
        }else{
            die(mysqli_error($con));
        }
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <!-- bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <div class="container my-5">
       <form action="" method="post">
           <!-- username field -->
           <div class="form-group mb-3">
               <label>Name</label>
               <input type="text" required="required" autocomplete="off" placeholder="Enter your username" name="username" class="form-control">
           </div>

           <!-- email field -->
           <div class="form-group mb-3">
               <label>Email</label>
               <input type="email" required="required" autocomplete="off" placeholder="Enter your email" name="email" class="form-control">
           </div>

           <!-- password filed -->
           <div class="form-group mb-3">
               <label>Password</label>
               <input type="password" required="required" autocomplete="off" placeholder="Enter your password" name="password" class="form-control">
           </div>

            <!-- Mobile filed -->
            <div class="form-group mb-3">
               <label>Mobile number</label>
               <input type="text" required="required" autocomplete="off" placeholder="Enter your mobile number" name="mobile" class="form-control" minLength="10" maxLength="10">
           </div>
           <!-- submit button -->

           <button class="btn btn-dark" type="submit" name="submit">Add Details</button>
       </form>

   </div>
    
</body>
</html>