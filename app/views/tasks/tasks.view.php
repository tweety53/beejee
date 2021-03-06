<?php require('app/views/partials/header.php'); ?>

<div class="container">
      <div class="sort">
            <h1>Select tasks where:</h1>
            <form action="tasks/filter">
            <label for="name" >Name:</label>
            <input type="text" name="username" class="name">

            <label for="email" >Email:</label>
            <input type="text" name="useremail" class="email">

            <label for="status">Status:</label>
            <select name="status" id="status" class="status">
                    <option value="1">Completed</option>
                    <option value="0">Not completed</option>
            </select>

            <button class="btn btn-primary" type="submit">Filter</a>
            </form>


      </div>

      <h1>All tasks:</h1>

	<?php foreach($tasks as $task) :?>
      <?php if($_SESSION['userData'][0]->email == 'admin@admin.com') {?>

      <div class="well">
            <div class="media">
            	<a class="pull-left">
          		<img class="media-object" src="<?php echo '/'.  $task->image ?>">
        		</a>
        		<div class="media-body">
          		<h4 class="media-heading ">Task №<?= $task->id ?></h4>
                <p class="text-right">By <?= $task->username ?></p>
                <button class="pull-right btn btn-primary edit-btn-<?php echo $task->id; ?>" onclick="activateEdit(<?php echo $task->id ?>)">Edit</button>
                <p class="text-right complete-status complete-status-<?php echo $task->id; ?>">
                  
                    <?php if($task->status == 0){
                    ?>
                        Completed: <i class="fa fa-times" aria-hidden="true"></i>
                    <?php
                    }
                    else{
                    ?>
                          Completed: <i class="fa fa-check" aria-hidden="true"></i>
                    <?php
                    }
                    ?>

                </p>
                <button class="pull-right btn btn-primary complete-btn" onclick="markAsDone(<?php echo $task->id ?>)">Mark as done</button>
                <p class="task-<?php echo $task->id; ?>"><?= $task->text ?></p>
             </div>
          </div>
        </div>

      <?php } else {?>
      
      <div class="well">
            <div class="media">
              <a class="pull-left">
              <img class="media-object" src="<?php echo '/'.  $task->image ?>">
            </a>
            <div class="media-body">
              <h4 class="media-heading">Task №<?= $task->id ?></h4>
                <p class="text-right">By <?= $task->username ?></p>
                <p class="pull-right complete-status">
                  <p class="text-right complete-status complete-status-<?php echo $task->id; ?>">
                  
                    <?php if($task->status == 0){
                    ?>
                        Completed: <i class="fa fa-times" aria-hidden="true"></i>
                    <?php
                    }
                    else{
                    ?>
                          Completed: <i class="fa fa-check" aria-hidden="true"></i>
                    <?php
                    }
                    ?>

                </p>
                </p>
                <p><?= $task->text ?></p>
             </div>
          </div>
        </div>
      <?php }?>

	<?php endforeach ?>
</div>



<?php require('app/views/partials/footer.php'); ?>