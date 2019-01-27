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
	<div id="modal-container">
	  <div class="modal-background">
	    <div class="modal position-relative">
	    	<h1>Edit</h1>
			<form class="mt-5" id="article-form">
                <!--<input class="form-control mt-5 mb-3" type="hidden" name="id" id="input-article-id">-->
				<input class="form-control mt-5 mb-3" type="text" name="title" placeholder="Enter your tilte" id="input-article-title">
				<span class="span fa fa-pen nib"></span>
				<textarea class="form-control mb-3" rows="3" name="body" placeholder="Put your content here" id="input-article-body"></textarea>
				<span class="span1 fa fa-lock"></span>
				<div class="col-5 mx-auto text-center">
					<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" id="article-edit-submit" data-articleid="">Update</button>
				</div>
			</form>		
			<i id="close" class="span2 fas fa-times-circle fa-2x"></i>
	    </div>
	  </div>
	</div>
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
        <div class="row">
            <div class="col-lg-4 ml-auto mt-5">
            <?= anchor('admin/store_article','Add Article',['class'=>'btn btn-lg btn-primary ml-auto']) ?>
        </div>
		<table class="table table-hover text-center mx-auto custom mt-2" style="width: 80%">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col" width="10%">#</th>
		      <th scope="col" width="25%">Title</th>
		      <th scope="col" width="35%">Content</th>	     
		      <th scope="col" width="10%">Action</th>
		    </tr>
		  </thead>
		  <tbody>
            <?php
                if( count($articles)): 
                    $count = $this->uri->segment(3,0);
                    foreach($articles as $article):
            ?>
                        <tr>
                            <td><?= ++$count ?></td>	
                            <td class="article-title"><?=$article->title ?></td>
                            <td class="article-body"><?=$article->body ?></td>	     
                            <td><button type="button" class="edit-button btn btn-lg btn-primary btn-sm" id="one" data-articleid="<?php echo $article->id; ?>"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-lg btn-danger btn-sm delete-button" data-articleid="<?php echo $article->id; ?>">
                                <i class="fa fa-trash"></i>
                            </button></td>
                        </tr>	
            <?php 
                    endforeach;
                else:?>
                    <td colspan="3">
                    No Records Found.
                    </td>
                <?php endif;?>	    
		  </tbody>
		</table>
		<div class="container">
            <?=  $this->pagination->create_links(); ?>
        </div>
	</div>
</body>
<script>
    $('.edit-button').click(function(){
        var articleid = $(this).data('articleid');
        var article_title = $(this).parent().siblings('.article-title').text();
        var article_body = $(this).parent().siblings('.article-body').text();
        
        $("#article-edit-submit").data('articleid', articleid);
        $("#input-article-title").val(article_title);
        $("#input-article-body").val(article_body);
        
        $('#modal-container').removeAttr('class').addClass("one");
        $('body').addClass('modal-active');
	});
	
	$('#article-edit-submit').click(function(e) {
        var articleid = $(this).data('articleid');
        var form = $('#article-form');
        
        $.ajax({
            url: '<?php echo site_url("admin"); ?>'+'/update_article/'+articleid,
            data: form.serialize(),
            type: 'POST',
            dataType: 'text',
            success: function(response) {
                console.log(response);
                location.reload(true);
            },
            error: function(response) {
                console.log(response);
            }
        });
        
        e.preventDefault();
        e.stopPropagation();
    });

	$('#close').click(function(){
        $("#modal-container").addClass('out');
        $('body').removeClass('modal-active');
	});
	
	$('.delete-button').click(function(e) {
        var articleid = $(this).data('articleid');
        $.ajax({
            url: '<?php echo site_url("admin"); ?>'+'/delete_article',
            data: {article_id:articleid, submit:'1'},
            type: 'POST',
            dataType: 'text',
            success: function(response) {
                console.log(response);
                location.reload(true);
            },
            error: function(response) {
                console.log(response);
            }
        });
        
        e.preventDefault();
        e.stopPropagation();
    });
</script>
</html>
