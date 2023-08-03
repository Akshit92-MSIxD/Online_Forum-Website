<?php

echo'<!-- Button trigger modal is signup button!!! -->
       

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signupModalLabel">SignUp for iDiscuss Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/online_forum/partials/_handle-signupModal.php" method="post">

                          <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name"  name="name" required maxlength="60">
                      
                        </div>
                        <div class="mb-3">
                            <label for="signupEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="signupEmail" aria-describedby="emailHelp" name="signupEmail" required>
                            <div id="emailHelp" class="form-text">We will never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="signupPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signupPassword" name = "signupPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for"cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name = "cpassword" required>
                        </div>

                        <button type="submit" class="btn btn-success" >Signup</button>
                        <input type="hidden" id="source" name="source" value = "'.$_SERVER['REQUEST_URI'].'">
                </form>
      </div>
    </div>
  </div>
</div>'

?>


<?php





