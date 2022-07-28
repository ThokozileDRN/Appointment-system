<?php
include('./partials/connect.php');
if(isset($_GET['update_id'])){
    $uid=$_GET['update_id'];
    // selecting data from database table,so that we can display in input fields
    $select_query="Select * from `crud` where id='$uid'";
    $result_query=mysqli_query($con,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $userdisplay=$row['username'];
    $emaildisplay=$row['email'];
    $mobiledisplay=$row['mobile'];
    // echo $userdisplay;
    if(isset($_POST['update'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];

        // updating new data inside database table.
        $update_query="update `crud` set username='$username',email='$email',mobile='$mobile' where id=$uid";
        $result_query=mysqli_query($con,$update_query);
        if($result_query){
            echo "<script>alert('Data updated successfully')</script>";
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
    <title>PHP CRUD Updating data</title>
    <!-- bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <div class="container my-5">
       <form action="" method="post">
           <!-- username field -->
           <div class="form-group mb-3">
               <label>Name</label>
               <input type="text" required="required" autocomplete="off" placeholder="Enter your username" name="username" value="<?php  echo $userdisplay ?>" class="form-control">
           </div>

           <!-- email field -->
           <div class="form-group mb-3">
               <label>Email</label>
               <input type="email" required="required" autocomplete="off" placeholder="Enter your email" name="email" value="<?php  echo $emaildisplay ?>" class="form-control">
           </div>

            <!-- Mobile filed -->
            <div class="form-group mb-3">
               <label>Mobile number</label>
               <input type="text" required="required" autocomplete="off" placeholder="Enter your mobile number" name="mobile" value="<?php  echo $mobiledisplay ?>" class="form-control" minLength="10" maxLength="10">
           </div>

           <!-- update button -->
           <button class="btn btn-dark mt-3" type="submit" name="update">Update</button>
       </form>
   </div>   
</body>
</html>