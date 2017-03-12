
function openModal() {
  document.getElementById('myModal').style.display = "block";
  
  var text = document.getElementById('text').value;
  document.getElementById('modal-text').innerHTML = text;

}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#modal-preview')
      .attr('src', e.target.result)
      .width(320)
      .height(240);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function activateEdit(taskId){
  if($( "button.edit-btn-" + taskId).text() == 'Edit'){
    var text = $("p.task-" + taskId).text();
    console.log(text);
    $( "p.task-"+taskId ).replaceWith( "<input type='text' name='text' value='" + text + "'  class='task-" + taskId + "' >"  );
    $( "button.edit-btn-" + taskId).text('Save');
  }
  else{
    var text = $("input.task-" + taskId).val();
    $( "input.task-"+taskId ).replaceWith( "<p class='task-" + taskId + "' >" + text + " </p>"  );

    $.post( "/tasks/update", { id: taskId, text: text });

    $( "button.edit-btn-" + taskId).text('Edit');
  }
}

function markAsDone(taskId) {
  $.post( "/tasks/status", { id: taskId })
  .done(function() {
    $( "p.complete-status-" + taskId).html('Completed: ' + '<i class="fa fa-check" aria-hidden="true"></i>' );
  });
}



