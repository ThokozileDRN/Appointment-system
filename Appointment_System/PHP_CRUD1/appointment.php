<?php
include('./partials/connect.php');
if(isset($_GET['appointment_id'])){
    $uid=$_GET['appointment_id'];
    // selecting data from database table,so that we can display in input fields
    $select_query="Select * from `crud` where id='$uid'";
    $result_query=mysqli_query($con,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $userdisplay=$row['username'];
    $emaildisplay=$row['email'];
    $mobiledisplay=$row['mobile'];

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        // echo $username;
        $email=$_POST['email'];
        //$password=$_POST['password'];
        $mobile=$_POST['mobile'];
        $appointment=$_POST['appointment'];
    
        
    
        // if exist conditions
        $sql="Select * from `appointment` where username='$username' or email='$email'";
        $selectresult=mysqli_query($con,$sql);
        $number=mysqli_num_rows($selectresult);
        if($number>0){
            echo "<script>alert('Email or username already exist')</script>";
        }else{
            $insert_query="insert into `appointment` (username,email,mobile,appointment) values ('$username','$email','$mobile','$appointment') ";
            $result=mysqli_query($con,$insert_query);
            if($result){
                echo "Data inserted successfully";
                echo "<script>window.open('displayappointment.php','_self')</script>";
            }else{
                die(mysqli_error($con));
            }
        }  

    /*
   //$appointmentdisplay=$row['appointment'];
    // echo $userdisplay;
    if(isset($_POST['update'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $appointment=$_POST['appointment'];

        // updating new data inside database table.
        $update_query="update `appoitment` set username='$username',email='$email',mobile='$mobile' appointment='$appointment' where id=$uid";
        $result_query=mysqli_query($con,$update_query);
        if($result_query){
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('displayappointment.php','_self')</script>";
        }else{
            die(mysqli_error($con));
        }*/
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

           <div class="input-group">
		   <label>Date</label>
		   <input type="Date" name="Date">

	        </div>

	     <div class="input-group">
		 <label>Time</label>
		 <input type="Time" name="Time">
	     </div>

            <!-- Appointment field -->
            
            <div class="form-group mb-3">
               <label>Appointment</label>
               <input type="text" required="required" autocomplete="off" placeholder="Enter appointment Type" name="appointment" value="<?php  ?>" class="form-control" >
           </div>
          

           <!-- submit button -->
           <button class="btn btn-dark mt-3" type="submit" name="submit">Submit</button>
       </form>
   </div>   
</body>
</html>