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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">ADMIN PANEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" <?= anchor('login/logout','Logout') ?> <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        </div>
    </nav>
	<div class="container text-center mx-auto">
        <div class="position-relative pt-5">
	    	<div class="row">
                <div class="col-6 mx-auto">
                    <h1>Add Article</h1>
                    <form class="mt-5" method="post" action="<?php echo site_url('admin/store_article'); ?>">
                        <?php echo form_hidden('user_id',$this->session->userdata('user_id'));?>
                        <input class="form-control mt-5 mb-3" type="text" name="title" placeholder="Enter your tilte" id="input-article-title">
                        <span class="span fa fa-pen nib"></span>
                        <textarea class="form-control mb-3" rows="5" name="body" placeholder="Put your content here" id="input-article-body"></textarea>
                        <span class="span1 fa fa-lock"></span>
                        <div class="col-5 mx-auto text-center">
                            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="submit" id="article-edit-submit">Submit</button>
                        </div>
                    </form>
                </div>
	    	</div>
	    </div>
	</div>
</body>
</html>
