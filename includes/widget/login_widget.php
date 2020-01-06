<div class="well">
    <h4>Login</h4>
    <p class="error-msg-login-widget text-danger"></p>
    <form action="./includes/login.php" id="login-form" method="POST">                   
        <div class="form-group">
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
        </div>
        <div class="input-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
            <span class="input-group-btn">
                <button class="btn btn-primary" id="login-btn" type="submit" name="login">Submit</button>
            </span>
        </div>
        <div class="form-group" style="padding-top: 8px; padding-left: 3px;">
            <a href="./../../registration.php">Create an account</a>
        </div>
        </form>
</div>