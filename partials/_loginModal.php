<?php


//  Modal triggered through login button!!!

echo'
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel">Login for iDiscuss Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    
  
       <form action="/online_forum/partials/_handle-loginModal.php" method="post">

                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email </label>
                            <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" name="loginEmail" required>
                            <div id="emailHelp" class="form-text">We will never share your email with anyone else.</div>
                        </div>
                    
                        <div class="mb-3">
                            
                        <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name = "loginPassword" required>
                        </div>

                      <input type="hidden" id="source" name="source" value = "'.$_SERVER['REQUEST_URI'].'">
                        <button type="submit" class="btn btn-success" >Login</button>
                </form>
      </div>
    </div>
  </div>
</div>';

?>