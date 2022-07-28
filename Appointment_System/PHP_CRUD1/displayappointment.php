<?php include('./partials/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display data</title>
    <!-- bootstarp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <button class="btn btn-dark"><a href="Dashboard.php" class="text-light text-decoration-none">Dashbord</button>
        <table class="table mt-5 table-bordered">
<thead>
    <tr>
        <th>Sl no</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Date</th>
        <th>Time</th>
        <th>appointmentType</th>
        <th class="text-center">Operations</th>
    </tr>
</thead>
<tbody>
    <?php
    $select_query="Select * from `appointment`";
    $result=mysqli_query($con,$select_query);
    $i=1;
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
$user=$row['username'];
$email=$row['email'];
$mobile=$row['mobile'];
$date=$row['date'];
$time=$row['time'];
$appointment=$row['appointment'];
echo " <tr>
<td>$i</td>
<td>$user</td>
<td>$email</td>
<td>$mobile</td>
<td>$date</td>
<td>$time</td>
<td>$appointment</td>
<td class='text-center'>

<button class='btn btn-danger'><a href='deleteAppointment.php?delete_id=$id' class='text-light text-decoration-none'>Delete</button>

</td>
</tr>";
$i++;
        }

    }else{
        die(mysqli_error($con));
    }
?>  
</tbody>
</table>
</div>
</body>
</html>