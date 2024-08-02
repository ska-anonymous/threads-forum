<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login to iDiscuss</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/partials/_handle_login.php" method="POST">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Username</label>
                        <input type="text" name="loginEmail" id="loginEmail" class="form-control" aria-describedby="emailHelp" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" name="loginPassword" id="loginPassword" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-login">Login</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </form>
        </div>
    </div>
</div>