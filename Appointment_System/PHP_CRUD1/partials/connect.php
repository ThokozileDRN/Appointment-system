<?php

$con=new mysqli('localhost','root','','crudoperation');
if(!$con){
    die(mysqli_error($con));
}

?>

<!-- Read README.md to know where MySQL database password can be seen -->