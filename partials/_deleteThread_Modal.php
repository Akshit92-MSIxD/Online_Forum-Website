<?php

//  Modal triggered through deleteThread button!!!

// For deleting the thread and associated comments!!!

echo'
<!-- Modal -->
<div class="modal fade" id="deleteThread_Modal" tabindex="-1" aria-labelledby="deleteThreadModal_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5"  id="deleteThread_ModalLabel">Delete your Thread Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <h4 class="text-secondary"> Are you sure you want to delete this thread post ? </h4> <hr class="mx-3">

    
  
       <form action="/online_forum/partials/_handle-deleteThread_Modal.php" method="post">

                      <input type="hidden" name="deleteThread_id" id="deleteThread_id">
                      <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                      <button type="button" class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">Cancel</button>
                </form>
      </div>
    </div>
  </div>
</div>';

?>