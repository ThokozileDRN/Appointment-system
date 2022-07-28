<?php include ('../../datalayer/bookserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet"  href="style5.css" type="text/css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<header>
	<h1>Admin<span>Dash</span></h1>
		<nav>
		


		
		<ul> 
			
		
			<li><a href="index3.php">Add/Delete Agent</a></li>
			<li><a href="viewAgent.php">View Agents</a></li>
			<li><a href=" viewUsers.php">View Users</a></li>
			<li><a href="viewappointments.php">View Appointments</a></li>
			<li><a href="../../PHP_CRUD1/Dashboard.php">ADD USER</a></li>

  			<li><a href="../../applicationlayer/Main.php">Logout</a></li>

			



	
			

		</ul>
		



	</nav>




</header>
<body>

		<div class="headerA">
	<h2>Add Agent</h2>
</div>

<form method="post" action="index3.php">

	<?php include ('../../datalayer/errors.php'); ?>

	<div class="input-groupA">
		<label>Agent ID</label>
		<input type="text" name="addID" >

	</div>


	<div class="input-groupA">
		<label>Agent Name</label>
		<input type="text" name="addname" >


	</div>

	<div class="input-groupA">
		<label>Address</label>
		<input type="text" name="addAddress">

	</div>

	<div class="input-groupA">
		<label>Contact Number</label>
		<input type="text" name="addContactNumber">


	</div>


	<div class="input-groupA">
		<label>Email address</label>
		<input type="text" name="addEmail">

	</div>

	<div class="input-groupA">
		<label>Password</label>
		<input type="text" name="addpassword">

	</div>
<div class="input-groupA">
	<label>Category</label>
	   	<select name="addcategory" class="xd">
	   		<option value="Email" >email</option>
	   		<option value="Call">call</option>
	   		<option value="Task">task</option>
	   		<option value="Meeting">meeting</option>
	   		

	   		


	   	</select>
	   	</div>

	<div class="input-groupA">
		<button type="submit" name="Add" class="btnA">Add Agent</button>
	</div>


	




</form>
	<div class="headerAD">
	<h2>Delete Agent</h2>
</div>

<form method="post" action="index3.php" class="delete">

	<div class="input-groupA">
		<label>Agent ID</label>
		<input type="text" name="deleteID" >

	</div>

	<div class="input-groupA">
		<button type="submit" name="Delete" class="btnA">Delete</button>
	</div>

</form>





	

</body>
</html>