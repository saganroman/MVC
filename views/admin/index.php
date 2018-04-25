<?php echo '
<div class="container" id="container">
    <div class="row">
        <div class="col-md-4 offset-4">
            <span class="alert-success" id="successMessage"></span>
            <h2 class="form-signin-heading">Please sign in</h2>
            <form class="form-signin">

                <label for="inputName" class="sr-only">User name</label>
                <input type="text" id="inputName" class="form-control" placeholder="User name" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

                <button class="btn btn-lg btn-primary btn-block" type="button" id="signinButton">Sign in</button>
                <br>
                <span class="alert-danger" id="errorMessage"></span>
            </form>
        </div>

    </div>

</div>
    ';