<?php 

	if(isset($_POST['submit'])){

		if($_POST['username'] == 'admin'){

			if($_POST['password'] == 'password'){
				
				session_start();
				$_SESSION['isAdmin'] = true;

				echo"
					<script>
						alert('login berhasil')
						window.location.href = '../index.php'
					</script>
				";


			} else {

				echo"
					<script>
						alert('login gagal')
						window.location.href = './index.php'
					</script>
				";
			}


		}

	}


?>


<!doctype html>
<html lang="en">

<head>
	<title>Admin Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="img " style="background-image: url(../../img/hero.jpg);">
	<section class="ftco-section" style="height: 100vh;" >
		<div class="container pt-5">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Admin Dashboard</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<form action="" method="post" class="signin-form">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username" required>
							</div>
							<div class="form-group my-4">
								<input id="password-field" name="password" type="password" class="form-control" placeholder="Password"
									required>
								<span toggle="#password-field"
									class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Masuk</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>