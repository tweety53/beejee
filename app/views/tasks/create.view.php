<?php require('app/views/partials/header.php'); ?>

<div class="container">
	<form action="/tasks" method="POST" enctype="multipart/form-data">
		<div class="form-group">
		    <label for="text">Text:</label>
		    <input type="text" class="form-control" id="text" name="text">
		</div>
		<div class="form-group col-md">
		    <label for="image">Image:</label>
		    <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
		</div>
		<a onclick="openModal()" class="btn btn-default hover-shadow">Preview</a>
		<button type="submit" class="btn btn-default">Create</button>
	</form>
</div>

<?php require('app/views/partials/modal.php');?>
<?php require('app/views/partials/footer.php'); ?>