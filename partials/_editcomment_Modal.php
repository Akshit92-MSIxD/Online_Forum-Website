<?php


//  Modal triggered through editcomment button!!!

// For editing the comments

echo'
<!-- Modal -->
<div class="modal fade" id="editcomment_Modal" tabindex="-1" aria-labelledby="editcommentModal_Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4"  id="editcomment_ModalLabel">Edit your Comment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    
  
       <form action="/online_forum/partials/_handle-editcomment_Modal.php" method="post">

       <div class="form-group mb-3">
       <label for="editcomment" style="margin-bottom : 5px;" class="text-secondary">Your Comment:</label>
       <textarea class="form-control" id="editcomment" name="editcomment" rows="3"></textarea>
     </div>

                      <input type="hidden" name="editcomment_id" id="editcomment_id">
                      <input type="hidden" id="comment_source" name="comment_source" value = "'.$_SERVER['REQUEST_URI'].'">
                        <button type="submit" class="btn btn-success btn-sm" id="update_comment_btn" >Update</button>
                        <button type="button" class="btn btn-secondary btn-sm mx-2" data-bs-dismiss="modal">Cancel</button>
                </form>
      </div>
    </div>
  </div>
</div>';

?>
