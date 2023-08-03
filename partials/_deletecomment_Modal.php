<?php

//  Modal triggered through deletecomment button!!!

// For deleting the comments

echo'
<!-- Modal -->
<div class="modal fade" id="deletecomment_Modal" tabindex="-1" aria-labelledby="deletecommentModal_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5"  id="deletecomment_ModalLabel">Delete your Comment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <h4 class="text-secondary"> Are you sure you want to delete this comment ? </h4> <hr class="mx-3">

    
  
       <form action="/online_forum/partials/_handle-deletecomment_Modal.php" method="post">

                      <input type="hidden" name="deletecomment_id" id="deletecomment_id">
                      <input type="hidden" id="comment_source" name="comment_source" value = "'.$_SERVER['REQUEST_URI'].'">
                      <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                      <button type="button" class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">Cancel</button>
                </form>
      </div>
    </div>
  </div>
</div>';

?>
