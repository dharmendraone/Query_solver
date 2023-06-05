<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test5";
	
// connect the database with the server
$conn = new mysqli($servername,$username,$password,$dbname);
	
	// if error occurs
	if ($conn -> connect_errno)
	{
	echo "Failed to connect to MySQL: " . $conn -> connect_error;
	exit();
	}

	$sql = "select * from registration";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];

	if ($result->num_rows > 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);
	}
?>

<!DOCTYPE html>
<html>
<style>
	td,th {
		border: 1px solid black;
		padding: 10px;
		margin: 5px;
		text-align: center;
	}
</style>

<body>

      <!--navbar-->
    
      <nav class="navbar navbar-expand-lg navbar-light">
        <a href="#" class="navbar-brand">
          <img src="./images/M (1).png" width="45" alt="" class="d-inline-block align-middle mr-2">
          <!-- Logo Text -->
          <span class="text-uppercase font-weight-bold">Query_Solver</span>
        </a>
          		
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
          <div class="navbar-nav sticky-top">
            <a href="#myhome" class="nav-item nav-link">Home</a>
            <a href="#myabout" class="nav-item nav-link">About</a>			
            <div class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">Services</a>
              <div class="dropdown-menu">					
                <a href="./admin.php" class="trigger-btn text-black dropdown-item" >Admin</a>
              
                <a href="./index.html" class="dropdown-item">Guest join</a>
                      </div>
                    </div>
            <a href="#mycontact" class="nav-item nav-link">Contact</a>
              </div>
          <form class="navbar-form form-inline ml-auto">
            <div class="input-group search-box">
              <input type="text" class="form-control">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary"><span>Search</span></button>
              </div>
            </div>
          </form>		
        </div>
      </nav>
<!---->
<table class="table">
  <thead class="thead-dark">
    <tr> Registration</tr>
    <tr>
      <th scope="col">S.Nojhjhb</th>
      <th scope="col">Full Name</th>
      <th scope="col">Profession</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Number</th>
      <th scope="col">Password</th>
      <th scope="col">Date</th>
      

			<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			?>
			<tr>

				<td><?php echo $rows['id']; ?></td>
				<td><?php echo $rows['fullname']; ?></td>
        <td><?php echo $rows['prof']; ?></td>
        <td><?php echo $rows['gender']; ?></td>
        
				<td><?php echo $rows['email']; ?></td>
        <td><?php echo $rows['number']; ?></td>
                <td><?php echo $rows['password']; ?></td>
                
                <td><?php echo $rows['create_datetime']; ?></td>

			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>

<?php
	mysqli_close($conn);
?>
