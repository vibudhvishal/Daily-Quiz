<?php

session_start();

if(!isset($_SESSION['username'])){
	header('location:login.php');
}

$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, 'quizdbase');
?>


<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script type="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.js">
	<script type="cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<link rel="stylesheet" href="fonts.googleapis.com/css?family=montserrat|Open+sans">
	<style type="text/css">
		.abc{
			animation: leelaanimate 0.5s infinite;
		}
@keyframes leelaanimate{
	0% {color: red},
	10% {color: yellow},
	20% {color: blue}
	40% {color: green},
	50% {color: pink}
	60% {color: black},
	70% {color: orange}
}

	</style>


</head>
<body> 
<div class="container">
	<br>
	<h1 class="text-center text-primary abc"> WEB DEV QUIZ PROJECT </h1><BR>
	<h2 class="text-center text-sucess abc">WELCOME <?php echo $_SESSION['username']; ?> </h2> <br>
	<div class="col-lg-8 m-auto d-block">
	<div class="card">
		<h6 class="text-center card-header">WELCOME <?php echo $_SESSION['username']; ?> , You can select only one option. BEST OF LUCK :)</h6>		
	</div><br>

	<form action="check.php" method="post">
	<?php
for($i=0 ; $i<6;$i++){
$q = "select * from questions where qid=$i"; #selecting the questions one by one
$query = mysqli_query($con, $q);  #fire of query 
while ($rows = mysqli_fetch_array($query)) {
	
	?>


	<div class="card">
		<h5 class="card-header"> <?php echo$rows['question']; ?></h5>
		

		<?php

			$q = "select * from answers where ans_id =$i"; #selecting the questions one by one
			$query = mysqli_query($con, $q);  #fire of query 
			while ($rows = mysqli_fetch_array($query)) {
				
			?>	

			<div class="card-body">
				<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
				<?php echo $rows['answer']; ?>
				

			</div>

<?php
	}
	}
	}
	?>

	<input class="btn btn-success m-auto" type="submit" name="submit" value="submit">
</form>
</div>
</div><br><br>
<div class="m-auto d-block ">
	<a href="logout.php"  class="btn btn-primary">LOGOUT</a>
</div><br>
<div>
	
	<h5 class="text-center"> ©2018 RISHAB'S </h5>
</div><br><br>

</div>
</body>
</html>