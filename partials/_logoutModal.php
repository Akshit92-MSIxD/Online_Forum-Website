<?php


// modal triggered through logout button!!!

echo'<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Are you sure you want to logout???</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/online_forum/partials/_handle-logoutModal.php" method="post">
                    <button type="submit" class="btn btn-success">Logout</button>
                    <input type="hidden" id="source" name="source" value = "'.$_SERVER['REQUEST_URI'].'">
                </form>
            </div>

        </div>
    </div>
</div>';

?>