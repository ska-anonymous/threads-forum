<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">Signup for an iDiscuss Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/partials/_handle_signup.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Username</label>
                        <input type="text" name="signupEmail" class="form-control" id="signupEmail" aria-describedby="emailHelp" required>
                        <!-- <input type="email" name="signupEmail" class="form-control" id="signupEmail" aria-describedby="emailHelp" required> -->
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" name="signupPassword" id="signupPassword" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupcPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="signupcPassword" id="signupcPassword" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-signup">Sign Up</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </form>
        </div>
    </div>
</div>