<?php


//  Modal triggered through editThread button!!!

// For editing the threads done by current loggedin user

echo'
<!-- Modal -->
<div class="modal fade" id="editThread_Modal" tabindex="-1" aria-labelledby="editThreadModal_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4"  id="editThread_ModalLabel">Edit your thread</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    
  
       <form action="/online_forum/partials/_handle-editThread_Modal.php" method="post">

        <div class="form-group mb-4">
       <label for="editThread_title" style="margin-bottom : 5px;" class="text-secondary"> Title:</label>
       <input class="form-control" id="editThread_title" name="editThread_title" required>

       <label for="editThread_desc" style="margin-bottom : 5px;" class="mt-3 text-secondary">Description:</label>
       <textarea class="form-control" id="editThread_desc" name="editThread_desc" rows="3" required></textarea>
        </div>

                      <input type="hidden" name="editThread_id" id="editThread_id">
                      <input type="hidden" id="thread_source" name="thread_source" value = "'.$_SERVER['REQUEST_URI'].'">
                        <button type="submit" class="btn btn-success btn-sm" id="update_thread_btn" >Update</button>
                        <button type="button" class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">Cancel</button>
                </form>
      </div>
    </div>
  </div>
</div>';

?>
