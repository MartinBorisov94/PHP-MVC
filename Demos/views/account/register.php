
<main class="container">
    <form class="form-horizontal col-md-6 col-md-offset-3" action="/demos/account/register" method="post">
        <fieldset>
            <legend>Sing Up</legend>
            <div class="form-group">
                <label for="username" class="col-lg-2 control-label">User Name</label>
                <div class="col-lg-10">
                    <input class="form-control" id="username" name="username" placeholder="User Name" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                </div>
            </div>
            <div class="form-group">
                <label for="confirmPassword" class="col-lg-2 control-label">Confirm Password</label>
                <div class="col-lg-10">
                    <input class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" type="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </div>
        </fieldset>
    </form>
</main>