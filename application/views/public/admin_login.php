<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <?=link_tag('assets/css/style.css'); ?>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-5 mx-auto text-center">
				<div class="main-div margin-top"><h1>Login</h1>
					<div class="inner-box margin-top">
						<form action="<?php echo site_url('login/admin_login'); ?>" method="post">
							<input class="form-control mt-5 mb-3" type="text" name="username" placeholder="Username">
							<span class="fa fa-user span"></span>
							<input class="form-control mb-3" type="password" name="password" placeholder="Password">
							<span class="fa fa-lock span"></span>
							<div class="col-5 mx-auto text-center"><button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Login</button></div>
                            <!--<p style="color: #ffffff;">New Member? <a href="register.html">Register Now</a></p>-->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
