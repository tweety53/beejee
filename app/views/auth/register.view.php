<?php require('app/views/partials/header.php'); ?>

<div class="container">
	<form action="users/register" method="POST">
		<div class="form-group">
		    <label for="email">Name:</label>
		    <input type="name" class="form-control" id="name" name="name">
		</div>
		<div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" id="email" name="email">
		</div>
		<div class="form-group col-md">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd" name="password">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>


<?php require('app/views/partials/footer.php'); ?>