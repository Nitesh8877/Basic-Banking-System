<?php
session_start();
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con, "banking_system");
$name=$_SESSION['name'];
$q="select sender,amount from transaction where receiver='$name'";
$result=mysqli_query($con,$q);
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
		<title>Mini Statement</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
	</head>


	<body class="bg-danger">	
		<?php include_once 'header.php'; ?>
		<h2 style="color:green;text-align:center;"><?php echo "The Mini Statement of ".$name?></h2>
		
		<div class="row">
			<div class="col-sm-4"></div>
		<div class="col-sm-4">
		<table class="table  table-hover bg-info">
			<tr>
				<th>Sender</th>
				
				<th>Credits</th>
			</tr>
			<?php while($row = $result->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $row["sender"]; ?></td>
				
				<td><?php echo $row["amount"]; ?></td>
			</tr>
			<?php } ?>
		 </table>
			</div>
			<div class="col-sm-4"></div>
			</div>
			<div class="text-center">
		 <form  action="user.php" method="post">
				<button  class="btn btn-sm btn-info " type="submit" name="name" value="<?php echo $name ?>">BACK</button>
		 </form>		
			</div>

		<?php include_once 'footer.php'; ?>
	</body>
</html>