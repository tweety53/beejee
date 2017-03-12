<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
  <div class="well">
      <div class="media">
      	<a class="pull-left">
    		<img class="media-object" src="#" id="modal-preview">
  		</a>
  		<div class="media-body">
    		<h4 class="media-heading">Task № ...</h4>
          <p class="text-right">By <?php echo $_SESSION['userData'][0]->name;?></p>
          <p id="modal-text"></p>
       </div>
    </div>
  </div>
</div>
</div>