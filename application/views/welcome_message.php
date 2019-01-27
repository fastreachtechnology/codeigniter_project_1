<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <?=link_tag('assets/css/style.css'); ?>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-6 mx-auto text-center">
				<div class="dotted">
					<div class="buttons">
						<!--<a class="button1 inactive" href="<?php echo site_url('register'); ?>">Register</a>-->
						<a class="button2 inactive" href="<?php echo site_url('login'); ?>">Login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
