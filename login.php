
<?php

include 'config.php';
session_start();
// remove all session variables
// session_unset();

// print_r($_SESSION);

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$username' and password='$password'");

    //mendapatkan hasil dari data
	$data = mysqli_fetch_assoc($query);
	// return var_dump($data);

    //mendapatkan nilai jumlah data
    $check = mysqli_num_rows($query);
    // return var_dump($check);

    if (!$check) {
        $_SESSION['error'] = 'Username & password salah';
    } else {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role_id'] = $data['role_id'];

        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">

	<!-- Alert -->
	<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
    ?>

		<div class="alert alert-danger" role="alert">
			<?=$_SESSION['error']?>
		</div>

	<?php
}
        $_SESSION['error'] = '';
    ?>
	<!-- End Alert -->

	<h1>Login</h1>
	<form method="post">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Username</label>
	    <input type="text" class="form-control" name="username" placeholder="Username">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" name="password" placeholder="Password">
	  </div>
	  <input type="submit" name="masuk" value="Masuk" class="btn btn-default">
	</form>
</div>
</body>
</html>